
@extends('layouts.app')

@section('title', 'Mis Solicitudes')

@section('content')

<div class="container mx-auto px-4 py-12">


    <h2 class="text-center text-4xl font-extrabold mb-12 text-green-800">
        Mis Solicitudes
    </h2>

    @if($solicitudes->isEmpty())
        <p class="text-center text-gray-600">No tienes solicitudes asignadas.</p>
    @else
        <div class="space-y-12">
            @foreach($solicitudes as $solicitud)
                <div class="bg-white shadow rounded-lg p-6">
                    <h3 class="text-2xl font-bold text-green-900 mb-2">
                        {{ $solicitud->servicio }}
                    </h3>
                    <p class="text-gray-600 mb-6">
                        Fecha: {{ $solicitud->created_at->timezone('America/Bogota')->format('d/m/Y H:i') }}
                    </p>

                    @if($solicitud->archivos->isNotEmpty())
                        <div class="flex flex-wrap gap-6">
                            @foreach($solicitud->archivos as $archivo)
                                @php
                                    $extension = strtolower(pathinfo($archivo->ruta, PATHINFO_EXTENSION));
                                    $tipo = match(true) {
                                        in_array($extension, ['jpg','jpeg','png','gif','bmp','svg','webp']) => 'imagen',
                                        in_array($extension, ['pdf']) => 'pdf',
                                        in_array($extension, ['doc','docx']) => 'word',
                                        in_array($extension, ['mp4','avi','mov','mkv','webm']) => 'video',
                                        in_array($extension, ['mp3','wav','ogg']) => 'audio',
                                        default => 'otro',
                                    };

                                    $colores = [
                                        'imagen' => 'bg-white text-gray-700',
                                        'pdf'    => 'bg-red-50 text-red-600',
                                        'word'   => 'bg-blue-50 text-blue-600',
                                        'video'  => 'bg-yellow-50 text-yellow-700',
                                        'audio'  => 'bg-green-50 text-green-700',
                                        'otro'   => 'bg-gray-100 text-gray-600',
                                    ];
                                @endphp

                                <div class="relative w-40 h-40 rounded-xl overflow-hidden shadow-lg group transform transition duration-300 hover:scale-105 hover:shadow-2xl">
                                    <a href="{{ route('usuario.verArchivo', $archivo->id) }}" target="_blank" class="block w-full h-full">

                                        @if($tipo === 'imagen')
                                            <img src="{{ asset('storage/' . $archivo->ruta) }}"
                                                 alt="Imagen"
                                                 class="w-full h-full object-cover">
                                        @else
                                            <div class="flex flex-col items-center justify-center w-full h-full p-4 {{ $colores[$tipo] }}">
                                                <i class="
                                                    @if($tipo === 'pdf') fas fa-file-pdf
                                                    @elseif($tipo === 'word') fas fa-file-word
                                                    @elseif($tipo === 'video') fas fa-file-video
                                                    @elseif($tipo === 'audio') fas fa-file-audio
                                                    @else fas fa-file
                                                    @endif
                                                    text-5xl mb-2"></i>
                                                <span class="text-sm font-semibold capitalize">{{ ucfirst($tipo) }}</span>
                                            </div>
                                        @endif

                                        <!-- Badge extensión -->
                                        <div class="absolute top-2 left-2 bg-black bg-opacity-70 text-white text-xs px-2 py-0.5 rounded-full uppercase">
                                            {{ $extension }}
                                        </div>
                                    </a>

                                    <!-- Badge número archivo -->
                                    <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-60 text-white text-center py-1 text-xs font-medium">
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


