<?php

namespace App\Http\Controllers;

use App\Models\Testimonio;
use Illuminate\Http\Request;

class TestimonioController extends Controller
{
    public function home()
    {
        $testimonios = Testimonio::latest()->get(); // Ahora toma todos los testimonios
        return view('home.home', compact('testimonios'));
    }

    // public function index()
    // {
    //     $testimonios = Testimonio::all();
    //     return view('testimonios.index', compact('testimonios'));
    // }

    public function create()
    {
        return view('testimonios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'mensaje' => 'required|string',
            'imagen' => 'nullable|image|max:2048',
        ]);

        $testimonio = new Testimonio();
        $testimonio->nombre = $request->nombre;
        $testimonio->mensaje = $request->mensaje;

        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('testimonios', 'public');
            $testimonio->imagen = $path;
        }

        $testimonio->save();

        return redirect('/')->with('success', 'Testimonio agregado correctamente.');


    }

    public function destroy(Testimonio $testimonio)
{
    // Eliminar la imagen asociada si existe
    // if ($testimonio->imagen) {
    //     \Storage::delete('public/' . $testimonio->imagen);
    // }

    // Eliminar el testimonio
    $testimonio->delete();

    return redirect()->route('admin.solicitudes')->with('success', 'Testimonio eliminado correctamente.');
}

}
