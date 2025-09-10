<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{    // Mostrar formulario de registro
    public function showRegister()
    {
        return view('auth.register');
    }

    // Guardar nuevo usuario
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);



        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        session([
            'user_auth' => true,
            'user_email' => $user->email,
            'user_id' => $user->id
        ]);

        return redirect()->route('panel')->with('success', 'Cuenta creada correctamente.');
    }

    // Mostrar formulario de inicio de sesión
    public function showLogin()
    {
        return view('auth.login');
    }

    // Autenticar usuario
  public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if ($user && Hash::check($request->password, $user->password)) {
        // ✅ Generar código de 6 dígitos
        $code = rand(100000, 999999);

        DB::table('two_factor_codes')->updateOrInsert(
            ['user_id' => $user->id],
            [
                'code' => $code,
                'expires_at' => now()->addMinutes(5),
                'updated_at' => now(),
                'created_at' => now(),
            ]
        );

        // ✅ Enviar correo con el código
        Mail::raw("Tu código de verificación es: $code", function ($message) use ($user) {
            $message->to($user->email)->subject('Código de verificación 2FA');
        });

        // 👇 AQUÍ metes esa parte
        session([
            '2fa:user_id' => $user->id,
            '2fa:user_email' => $user->email, // para no perderlo después
        ]);

        return redirect()->route('2fa.verify.form')->with('success', 'Te enviamos un código de verificación a tu correo.');
    }

    return back()->with('error', 'Credenciales incorrectas.');
}



// Mostrar formulario para introducir el código
public function show2faForm()
{
    return view('auth.verify-2fa');
}

// Verificar código
public function verify2fa(Request $request)
{
    $request->validate([
        'code' => 'required|digits:6',
    ]);

    $userId = session('2fa:user_id');
    $userEmail = session('2fa:user_email'); // 👈

    if (!$userId) {
        return redirect()->route('login')->with('error', 'Sesión inválida.');
    }

    $registro = DB::table('two_factor_codes')
        ->where('user_id', $userId)
        ->where('code', $request->code)
        ->where('expires_at', '>', now())
        ->first();

    if (!$registro) {
        return back()->with('error', 'Código inválido o expirado.');
    }

    // ✅ SI EN TU APP USAS Auth::user()/auth()->id() PARA MOSTRAR ARCHIVOS:
    Auth::loginUsingId($userId);

    // ✅ Restablece las mismas claves de sesión que tenías antes del 2FA
    session()->forget(['2fa:user_id', '2fa:user_email']);
    session([
        'user_auth'  => true,
        'user_id'    => $userId,
        'user_email' => $userEmail, // 👈 vuelve a ponerla
    ]);

    // higiene de sesión + evita fijación
    session()->regenerate();

    // (opcional pero recomendado) borra el código usado
    DB::table('two_factor_codes')->where('user_id', $userId)->delete();

    return redirect()->route('panel')->with('success', 'Autenticación completada.');
}













    // Cerrar sesión
    public function logout()
    {
        session()->flush();
        return redirect()->route('login')->with('success', 'Sesión cerrada.');
    }



    // TODO LO DE RECUPERAR CONTRASEÑA :
     // Mostrar formulario para introducir el correo
    public function mostrarFormularioRecuperar()
    {
        return view('auth.recuperar');
    }

    // Procesar envío de código
    public function enviarCodigoRecuperacion(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $codigo = Str::random(6);

        DB::table('password_resets')->updateOrInsert(
            ['email' => $request->email],
            ['token' => $codigo, 'created_at' => now()]
        );

        // Puedes personalizar este correo
        Mail::raw("Tu código de recuperación es: $codigo", function ($message) use ($request) {
            $message->to($request->email)
                ->subject('Código para restablecer tu contraseña');
        });

        return redirect()->route('password.reset')->with('success', 'Te enviamos un código a tu correo.');
    }

    // Mostrar formulario para introducir código y nueva contraseña
    public function mostrarFormularioRestablecer()
    {
        return view('auth.restablecer');
    }

    // Guardar la nueva contraseña
    public function guardarNuevaContrasena(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'token' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $registro = DB::table('password_resets')
            ->where('email', $request->email)
            ->where('token', $request->token)
            ->first();

        if (!$registro) {
            return back()->with('error', 'Código incorrecto o expirado.');
        }

        User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where('email', $request->email)->delete();

        return redirect()->route('login')->with('success', 'Contraseña actualizada correctamente.');
    }
}
