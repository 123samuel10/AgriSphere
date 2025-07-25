<?php
namespace App\Http\Controllers;
use App\Mail\CorreoSolicitud;
use App\Models\ArchivoSolicitud;
use App\Models\Solicitud;
use App\Models\Testimonio;
use App\Models\User;
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
        // Aquí cambias:
        return redirect()->route('usuario.solicitudes');
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
public function subirArchivo(Request $request, Solicitud $solicitud)
{
    $request->validate([
       'archivo' => 'required|file|mimes:pdf,jpg,jpeg,png|max:15360'],
       [
        'archivo.required' => 'Debes seleccionar un archivo.',
        'archivo.file' => 'El archivo debe ser válido.',
        'archivo.mimes' => 'El archivo debe ser de tipo: PDF, JPG, JPEG o PNG.',
        'archivo.max' => 'El archivo no debe superar los 15 MB.',

    ]);

    $archivo = $request->file('archivo')->store('archivos_solicitudes', 'public');

    ArchivoSolicitud::create([
        'solicitud_id' => $solicitud->id,
        'ruta' => $archivo,
    ]);

    return back()->with('success', 'Archivo subido correctamente.');
}



    public function verArchivo(ArchivoSolicitud $archivoSolicitud)
    {
        if (!$archivoSolicitud->ruta) {
            abort(404);
        }

        return response()->file(storage_path('app/public/' . $archivoSolicitud->ruta));
    }
public function eliminarArchivo(ArchivoSolicitud $archivoSolicitud)
{
    // Ruta física absoluta al archivo
    $ruta = public_path('storage/' . $archivoSolicitud->ruta);

    // Si el archivo existe, lo borra
    if (file_exists($ruta)) {
        unlink($ruta);
    }

    // Borra el registro de la base de datos
    $archivoSolicitud->delete();

    return back()->with('success', 'Archivo eliminado correctamente.');
}

public function verUsuarios()
{
    if (session('user_email') !== 'alberto@gmail.com') {
        return redirect()->route('panel')->with('error', 'No tienes permisos.');
    }

    $usuarios = User::all();

return view('usuarios.usuariosRegistrados', compact('usuarios'));


}

}
