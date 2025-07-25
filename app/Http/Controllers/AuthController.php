<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
            session([
                'user_auth' => true,
                'user_email' => $user->email,
                'user_id' => $user->id
            ]);
            return redirect()->route('panel');
        }

        return back()->with('error', 'Credenciales incorrectas.');
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
