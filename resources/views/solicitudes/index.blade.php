@extends('layouts.app')

@section('title', 'Panel de Solicitudes y Testimonios')

@section('content')
<div class="container mx-auto px-4 py-12">

    <!-- Título Principal -->
    <h2 class="text-center text-4xl font-extrabold mb-12 text-green-800">
        Panel de Solicitudes
    </h2>

    <!-- Mensaje de Éxito -->
    @if(session('success'))
        <div class="bg-green-600 text-white p-4 rounded-lg mb-8 text-center font-semibold shadow">
            {{ session('success') }}
        </div>
    @endif

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
                        <td class="px-6 py-4">{{ $solicitud->created_at->format('d/m/Y H:i') }}</td>
             <td class="px-6 py-4 text-center">
    <div class="flex flex-wrap justify-center gap-2">

        <!-- Eliminar -->
        <button onclick="confirmarEliminacion('/solicitudes/{{ $solicitud->id }}')"
            class="flex items-center bg-red-600 hover:bg-red-700 text-white px-3 py-1.5 rounded transition text-sm">
            <i class="fas fa-trash mr-1"></i> Eliminar
        </button>

        <!-- Ver Archivos (nuevo) -->
        @foreach($solicitud->archivos as $archivo)
            <a href="{{ route('verArchivo', $archivo) }}" target="_blank"
                class="flex items-center bg-green-600 hover:bg-green-700 text-white px-3 py-1.5 rounded transition text-sm">
                <i class="fas fa-file mr-1"></i> Ver Archivo
            </a>
        @endforeach

        <!-- Subir Archivo (ahora para todos) -->
        <form action="{{ route('solicitudes.subirArchivo', $solicitud->id) }}"
              method="POST" enctype="multipart/form-data" class="flex items-center gap-2">
            @csrf
            <input type="file" name="archivo" class="text-sm" required>
            <button type="submit"
                class="flex items-center bg-purple-600 hover:bg-purple-700 text-white px-3 py-1.5 rounded transition text-sm">
                <i class="fas fa-upload mr-1"></i> Subir
            </button>
        </form>

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
                            <button onclick="confirmarEliminacion('/testimonios/{{ $testimonio->id }}')"
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

<!-- Modal Confirmación -->
<div id="modalConfirmacion" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
    <div class="bg-white p-8 rounded-lg shadow-xl text-center max-w-sm">
        <h3 class="text-xl font-bold mb-4 text-red-700">¿Estás seguro?</h3>
        <p class="mb-6 text-gray-700">Esta acción no se puede deshacer.</p>
        <form id="formEliminar" method="POST" class="flex justify-center gap-4">
            @csrf
            @method('DELETE')
            <button type="submit"
                class="bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded transition font-semibold">
                Eliminar
            </button>
            <button type="button" onclick="cerrarModal()"
                class="bg-gray-500 hover:bg-gray-700 text-white px-5 py-2 rounded transition font-semibold">
                Cancelar
            </button>
        </form>
    </div>
</div>

<script>
    function confirmarEliminacion(url) {
        document.getElementById('formEliminar').action = url;
        document.getElementById('modalConfirmacion').classList.remove('hidden');
    }
    function cerrarModal() {
        document.getElementById('modalConfirmacion').classList.add('hidden');
    }
</script>
@endsection
