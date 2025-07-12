@extends('layouts.app')

@section('title', 'Mis Solicitudes')

@section('content')
<div class="container mx-auto px-4 py-12">
    <h2 class="text-center text-4xl font-extrabold mb-8 text-green-800">
        Mis Solicitudes
    </h2>

    @if($solicitudes->isEmpty())
        <p class="text-center text-gray-600">No tienes solicitudes asignadas.</p>
    @else
        <div class="bg-white shadow rounded-lg overflow-x-auto">
            <table class="w-full border-collapse text-sm">
                <thead>
                    <tr class="bg-green-900 text-white">
                        <th class="px-6 py-3 text-left">Servicio</th>
                        <th class="px-6 py-3 text-left">Fecha</th>
                        <th class="px-6 py-3 text-left">Archivos</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($solicitudes as $solicitud)
                        <tr class="border-b hover:bg-gray-50 transition">
                            <td class="px-6 py-4">{{ $solicitud->servicio }}</td>
                            <td class="px-6 py-4">{{ $solicitud->created_at->format('d/m/Y H:i') }}</td>
                            <td class="px-6 py-4">
                                @if($solicitud->archivos->isNotEmpty())
                                    @foreach($solicitud->archivos as $archivo)
                                        <a href="{{ route('usuario.verArchivo', $archivo->id) }}"
                                           class="text-green-700 font-bold hover:underline"
                                           target="_blank">
                                           Ver Archivo #{{ $loop->iteration }}
                                        </a><br>
                                    @endforeach
                                @else
                                    <span class="text-gray-500">No disponible</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
