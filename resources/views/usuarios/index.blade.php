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
        <div class="space-y-12">

            @foreach($solicitudes as $solicitud)
                <div class="bg-white shadow rounded-lg p-6">
                    <h3 class="text-2xl font-bold text-green-900 mb-4">
                        {{ $solicitud->servicio }}
                    </h3>
                    <p class="text-gray-600 mb-6">Fecha: {{ $solicitud->created_at->format('d/m/Y H:i') }}</p>

                    @if($solicitud->archivos->isNotEmpty())
                        <div class="flex flex-wrap gap-6">
                            @foreach($solicitud->archivos as $archivo)
                                <div class="relative w-64 h-40 border rounded-lg overflow-hidden shadow-md hover:shadow-lg transition">

                                    <a href="{{ route('usuario.verArchivo', $archivo->id) }}" target="_blank">
                                        @if(Str::endsWith($archivo->ruta, ['.jpg', '.jpeg', '.png']))
                                            <img src="{{ asset('storage/' . $archivo->ruta) }}"
                                                 alt="Archivo"
                                                 class="w-full h-full object-cover">
                                        @else
                                            <div class="flex items-center justify-center w-full h-full bg-gray-200">
                                                <i class="fas fa-file-pdf text-5xl text-red-600"></i>
                                            </div>
                                        @endif
                                    </a>

                                    <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white text-center py-1 text-sm font-semibold">
                                        Archivo #{{ $loop->iteration }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500">No hay archivos disponibles.</p>
                    @endif
                </div>
            @endforeach

        </div>
    @endif
</div>
@endsection
