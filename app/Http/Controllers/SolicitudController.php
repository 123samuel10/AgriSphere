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


    public function index()
    {

    }
    public function adminIndex()
{
    $solicitudes = Solicitud::latest()->get();
    return view('solicitudes.index', compact('solicitudes'));
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

        return redirect()->back()->with('success', '¡Gracias por tu interés! Nos pondremos en contacto contigo pronto.');
    }
    /**
     * Display the specified resource.
     */
    public function show(Solicitud $solicitud)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Solicitud $solicitud)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Solicitud $solicitud)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Solicitud $solicitud)
    {
        //
    }
}
