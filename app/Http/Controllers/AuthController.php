<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

        // Bloquear correo reservado
        if ($request->email === 'alberto@gmail.com') {
            return back()->with('error', 'No puedes usar este correo.');
        }

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
}
