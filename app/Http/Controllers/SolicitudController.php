<?php
namespace App\Http\Controllers;
use App\Mail\CorreoSolicitud;
use App\Models\Solicitud;
use App\Models\Testimonio;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class SolicitudController extends Controller
{


    /**
     * Display a listing of the resource.
     */

     public function adminIndex(Request $request)
     {
         if ($request->isMethod('post')) {
             if ($request->input('email') === 'alberto@gmail.com' && $request->input('password') === '123alberto@') {
                 session(['admin_auth' => true]);
                 return redirect()->route('admin.solicitudes');
             } else {
                 return redirect()->route('admin.login')->with('error', 'Credenciales incorrectas.');
             }
         }

         if (!session('admin_auth')) {
             return redirect()->route('admin.login')->with('error', 'Debes iniciar sesión.');
         }

         // Obtener solicitudes y testimonios
         $solicitudes = Solicitud::latest()->get();
         $testimonios = Testimonio::latest()->get(); // Agregar esta línea

         return view('solicitudes.index', compact('solicitudes', 'testimonios')); // Pasar testimonios a la vista
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
