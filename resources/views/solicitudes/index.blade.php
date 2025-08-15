@extends('layouts.app')

@section('title', 'Panel de Solicitudes y Testimonios')

@section('content')
<div class="container mx-auto px-4 py-12">
<a href="{{ route('usuarios.lista') }}"
    class="inline-block mb-8 bg-green-700 hover:bg-green-800 text-white px-4 py-2 rounded transition font-semibold">
    Ver Usuarios Registrados
</a>
    <!-- Título Principal -->
    <h2 class="text-center text-4xl font-extrabold mb-12 text-green-800">
        Panel de Solicitudes
    </h2>

    <!-- Mensaje de Éxito -->
    {{-- @if(session('success'))
        <div class="bg-green-600 text-white p-4 rounded-lg mb-8 text-center font-semibold shadow">
            {{ session('success') }}
        </div>
    @endif --}}

    <!-- Tabla de Solicitudes -->
    <div class="bg-white shadow rounded-lg overflow-x-auto mb-16">
        <table class="w-full border-collapse text-sm">
            <thead>
                <tr class="bg-green-900 text-white">
                    <th class="px-6 py-3 text-left">Nombre</th>
                    <th class="px-6 py-3 text-left">Email</th>
                    <th class="px-6 py-3 text-left">Teléfono</th>
                    <th class="px-6 py-3 text-left">Servicio</th>
                    <th class="px-6 py-3 text-left">Mensaje</th>
                    <th class="px-6 py-3 text-left">Fecha</th>
                    <th class="px-6 py-3 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($solicitudes as $solicitud)
                    <tr class="border-b hover:bg-gray-50 transition">
                        <td class="px-6 py-4">{{ $solicitud->nombre }}</td>
                        <td class="px-6 py-4">{{ $solicitud->email }}</td>
                        <td class="px-6 py-4">{{ $solicitud->telefono }}</td>
                        <td class="px-6 py-4">{{ $solicitud->servicio }}</td>
                        <td class="px-6 py-4 truncate max-w-xs">{{ $solicitud->mensaje }}</td>
                     <td class="px-6 py-4">
  {{ $solicitud->created_at->timezone('America/Bogota')->format('d/m/Y H:i') }}
</td>

                        <td class="px-6 py-4 text-center">
                            <div class="flex flex-col items-center gap-4">

                                <!-- Galería de Archivos -->

                                {{-- <div class="flex flex-wrap gap-4 justify-center">
                                    @foreach($solicitud->archivos as $archivo)
                                        <div class="relative w-32 h-32 border rounded-lg overflow-hidden shadow">
                                            <a href="{{ route('verArchivo', $archivo) }}" target="_blank">
                                                @if(Str::endsWith($archivo->ruta, ['.jpg', '.jpeg', '.png']))
                                                    <img src="{{ asset('storage/' . $archivo->ruta) }}" alt="Archivo"
                                                        class="w-full h-full object-cover">
                                                @else
                                                    <div class="flex items-center justify-center w-full h-full bg-gray-200">
                                                        <i class="fas fa-file-pdf text-4xl text-red-600"></i>
                                                    </div>
                                                @endif
                                            </a>
                                            <!-- Botón Eliminar -->
                                            <button type="button"
                                                onclick="abrirModalEliminar('{{ route('solicitudes.eliminarArchivo', $archivo) }}')"
                                                class="absolute top-1 right-1 bg-red-600 hover:bg-red-700 text-white text-xs px-2 py-1 rounded-full">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    @endforeach
                                </div> --}}
<div class="flex flex-wrap gap-6 justify-center">
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
            <a href="{{ route('verArchivo', $archivo) }}" target="_blank" class="block w-full h-full">

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

            <!-- Botón eliminar -->
            <button type="button"
                onclick="abrirModalEliminar('{{ route('solicitudes.eliminarArchivo', $archivo) }}')"
                class="absolute top-2 right-2 bg-red-600 hover:bg-red-700 text-white text-xs px-2 py-1 rounded-full shadow">
                <i class="fas fa-trash"></i>
            </button>
        </div>
    @endforeach
</div>

                                <!-- Botón Abrir Modal Subir -->
                              <!-- Botón Abrir Modal Subir -->
<button type="button"
    onclick="abrirModalSubir('{{ route('solicitudes.subirArchivo', $solicitud->id) }}')"
    class="flex items-center bg-green-700 hover:bg-green-800 text-white px-3 py-1.5 rounded transition text-sm shadow-md">
    <i class="fas fa-upload mr-1"></i> Subir
</button>

                                   <!-- Botón Eliminar Solicitud COMPLETA -->
    <button type="button"
        onclick="abrirModalEliminar('{{ route('solicitudes.eliminar', $solicitud->id) }}')"
        class="flex items-center bg-red-700 hover:bg-red-800 text-white px-3 py-1.5 rounded transition text-sm">
        <i class="fas fa-trash mr-1"></i> Eliminar Solicitud
    </button>


                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Tabla de Testimonios -->
    <h2 class="text-center text-4xl font-extrabold mb-12 text-green-800">
        Testimonios
    </h2>

    <div class="bg-white shadow rounded-lg overflow-x-auto">
        <table class="w-full border-collapse text-sm">
            <thead>
                <tr class="bg-green-900 text-white">
                    <th class="px-6 py-3 text-left">Nombre</th>
                    <th class="px-6 py-3 text-left">Mensaje</th>
                    <th class="px-6 py-3 text-left">Fecha</th>
                    <th class="px-6 py-3 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($testimonios as $testimonio)
                    <tr class="border-b hover:bg-gray-50 transition">
                        <td class="px-6 py-4">{{ $testimonio->nombre }}</td>
                        <td class="px-6 py-4 truncate max-w-xs">{{ $testimonio->mensaje }}</td>
                        <td class="px-6 py-4">{{ $testimonio->created_at->format('d/m/Y H:i') }}</td>
                        <td class="px-6 py-4 text-center">
                            <button onclick="abrirModalEliminar('/testimonios/{{ $testimonio->id }}')"
                                class="flex items-center bg-red-600 hover:bg-red-700 text-white px-3 py-1.5 rounded transition text-sm">
                                <i class="fas fa-trash mr-1"></i> Eliminar
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

<!-- Modal Subir Archivo -->
<div id="modalSubir" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
    <div class="bg-white p-8 rounded-lg shadow-xl text-center max-w-md w-full">
        <h3 class="text-xl font-bold mb-4 text-green-700">Subir Archivo</h3>
        <form id="formSubir" method="POST" enctype="multipart/form-data" class="flex flex-col gap-4">
            @csrf
            <input type="file" name="archivo" required class="border p-2 rounded">
            <button type="submit"
                class="bg-green-700 hover:bg-green-800 text-white px-5 py-2 rounded transition font-semibold shadow">
                Subir
            </button>
            <button type="button" onclick="cerrarModalSubir()"
                class="bg-gray-600 hover:bg-gray-700 text-white px-5 py-2 rounded transition font-semibold shadow">
                Cancelar
            </button>
        </form>
    </div>
</div>


<!-- Modal Confirmación Eliminar -->
<div id="modalEliminar" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
    <div class="bg-white p-8 rounded-lg shadow-xl text-center max-w-sm w-full">
        <h3 class="text-xl font-bold mb-4 text-red-700">¿Estás seguro?</h3>
        <p class="mb-6 text-gray-700">Esta acción no se puede deshacer.</p>
        <form id="formEliminar" method="POST" class="flex justify-center gap-4">
            @csrf
            @method('DELETE')
            <button type="submit"
                class="bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded transition font-semibold">
                Eliminar
            </button>
            <button type="button" onclick="cerrarModalEliminar()"
                class="bg-gray-500 hover:bg-gray-700 text-white px-5 py-2 rounded transition font-semibold">
                Cancelar
            </button>
        </form>
    </div>
</div>





<!-- Modal Éxito -->
<div id="modalExito" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
    <div class="bg-green-700 text-white p-8 rounded-lg shadow-xl text-center max-w-md w-full">
        <h3 class="text-2xl font-bold mb-4">¡Éxito!</h3>
        <p id="mensajeExito" class="mb-6 text-lg"></p>
        <button onclick="cerrarModalExito()" class="bg-white text-green-800 px-5 py-2 rounded font-semibold hover:bg-gray-200 transition">Cerrar</button>
    </div>
</div>

<!-- Modal Error -->
<div id="modalError" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
    <div class="bg-red-700 text-white p-8 rounded-lg shadow-xl text-center max-w-md w-full">
        <h3 class="text-2xl font-bold mb-4">¡Error!</h3>
        <p id="mensajeError" class="mb-6 text-lg"></p>
        <button onclick="cerrarModalError()" class="bg-white text-red-800 px-5 py-2 rounded font-semibold hover:bg-gray-200 transition">Cerrar</button>
    </div>
</div>



<script>
    function abrirModalSubir(ruta) {
        const form = document.getElementById('formSubir');
        form.action = ruta; // Usa tu route() generado desde Blade
        document.getElementById('modalSubir').classList.remove('hidden');
    }

    function cerrarModalSubir() {
        document.getElementById('modalSubir').classList.add('hidden');
    }

    function abrirModalEliminar(ruta) {
        const form = document.getElementById('formEliminar');
        form.action = ruta; // Usa tu route() generado desde Blade
        document.getElementById('modalEliminar').classList.remove('hidden');
    }

    function cerrarModalEliminar() {
        document.getElementById('modalEliminar').classList.add('hidden');
    }


    //validacion  // Si Laravel trae sesión de success/error, ábrelo como modal
    @if(session('success'))
        window.onload = function() {
            abrirModalExito(`{{ session('success') }}`);
        }
    @endif

    @if($errors->any())
        window.onload = function() {
            abrirModalError(`{{ $errors->first() }}`);
        }
    @endif

    function abrirModalExito(mensaje) {
        document.getElementById('mensajeExito').innerText = mensaje;
        document.getElementById('modalExito').classList.remove('hidden');
    }

    function cerrarModalExito() {
        document.getElementById('modalExito').classList.add('hidden');
    }

    function abrirModalError(mensaje) {
        document.getElementById('mensajeError').innerText = mensaje;
        document.getElementById('modalError').classList.remove('hidden');
    }

    function cerrarModalError() {
        document.getElementById('modalError').classList.add('hidden');
    }
</script>
@endsection
