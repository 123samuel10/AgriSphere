<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;


class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     */



// Mostrar el panel de solicitudes solo si es Andrés
public function adminIndex(Request $request)
{
  // Verifica si el usuario es Andrés (correo: andres@gmail.com y contraseña: 123)
  if ($request->input('email') !== 'andres@gmail.com' || $request->input('password') !== '123') {
    return redirect('/admin/login')->with('error', 'Credenciales incorrectas');
}

// Si la validación es exitosa, muestra las solicitudes
$solicitudes = Solicitud::latest()->get();
return view('solicitudes.index', compact('solicitudes'));
}

// Mostrar el formulario de login
public function showLogin()
{
    return view('solicitudes.admin-login');

}

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('solicitudes.create', ['servicio' => $request->query('servicio', '')]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'email' => 'required|email',
            'telefono' => 'required',
            'servicio' => 'required',
        ]);

        Solicitud::create($request->all());

        return redirect()->back()->with('success', 'Solicitud enviada correctamente');

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Solicitud $solicitud)
    {
        $solicitud->delete();

        return redirect()->route('admin.solicitudes')->with('success', 'Solicitud eliminada correctamente.');
    }

}
