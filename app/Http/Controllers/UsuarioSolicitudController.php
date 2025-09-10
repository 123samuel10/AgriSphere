<?php

namespace App\Http\Controllers;

use App\Models\ArchivoSolicitud;
use App\Models\Solicitud;
use Illuminate\Http\Request;

class UsuarioSolicitudController extends Controller
{
/**
     * Muestra las solicitudes del usuario autenticado.
     */
    public function index(Request $request)
    {
        if (!session('user_auth')) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión.');
        }

        $emailUsuario = session('user_email');

        // Busca las solicitudes del usuario + carga archivos relacionados
        $solicitudes = Solicitud::where('email', $emailUsuario)
            ->with('archivos') // 👈 IMPORTANTE
            ->latest()
            ->get();

        return view('usuarios.index', compact('solicitudes'));
    }
/**
 * Permite al usuario ver uno de sus archivos.
 */
    /**
     * Permite al usuario ver uno de sus archivos.
     */
 /**
     * Permite al usuario ver uno de sus archivos.
     */
    /**
     * Permite al usuario ver uno de sus archivos.
     */
    public function verArchivo(ArchivoSolicitud $archivoSolicitud)
    {
        $solicitud = $archivoSolicitud->solicitud;

        if (!$solicitud) {
            abort(404, 'Solicitud no encontrada.');
        }

        $emailUsuario = session('user_email');

        if ($solicitud->email !== $emailUsuario) {
            abort(403, 'No tienes permiso para ver este archivo.');
        }

        return response()->file(storage_path('app/public/' . $archivoSolicitud->ruta));
    }




}
