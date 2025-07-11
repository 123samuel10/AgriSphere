<?php
namespace App\Http\Controllers;
use App\Mail\CorreoSolicitud;
use App\Models\Solicitud;
use App\Models\Testimonio;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SolicitudController extends Controller
{


   public function panel()
    {
        if (!session('user_auth')) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión.');
        }

        if (session('user_email') === 'alberto@gmail.com') {
            $solicitudes = Solicitud::latest()->get();
            $testimonios = Testimonio::latest()->get();
            return view('solicitudes.index', compact('solicitudes', 'testimonios'));
        } else {
            return view('solicitudes.hola');
        }
    }

    public function create(Request $request)
    {
        return view('solicitudes.create', ['servicio' => $request->query('servicio', '')]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'email' => 'required|email',
            'telefono' => 'required',
            'servicio' => 'required',
        ]);

        Solicitud::create($request->all());

        Mail::to('agrishere@gmail.com')->send(new CorreoSolicitud($request->all()));

        return redirect()->back()->with('success', 'Solicitud enviada correctamente');
    }

    public function destroy(Solicitud $solicitud)
    {
        $solicitud->delete();
        return redirect()->route('panel')->with('success', 'Solicitud eliminada correctamente.');
    }




}
