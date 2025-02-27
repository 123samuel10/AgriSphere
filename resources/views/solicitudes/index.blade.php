@extends('layouts.app')
@section('title', 'Panel de Solicitudes y Testimonios')
@section('content')
<div class="container mx-auto px-4 py-12">
    <h2 class="text-center text-4xl font-extrabold mb-8 text-green-800">Solicitudes Recibidas</h2>
    @if(session('success'))
        <div class="bg-green-600 text-white p-4 rounded-lg mb-6 text-center font-semibold shadow-md">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow-2xl rounded-lg p-6 overflow-x-auto mb-12">
        <table class="w-full border-collapse shadow-lg rounded-lg">
            <thead>
                <tr class="bg-green-900 text-white text-lg">
                    <th class="px-4 py-3">Nombre</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">Teléfono</th>
                    <th class="px-4 py-3">Servicio</th>
                    <th class="px-4 py-3">Mensaje</th>
                    <th class="px-4 py-3">Fecha</th>
                    <th class="px-4 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($solicitudes as $solicitud)
                    <tr class="text-center border-b border-gray-300 hover:bg-gray-200 transition-all">
                        <td class="px-4 py-4">{{ $solicitud->nombre }}</td>
                        <td class="px-4 py-4">{{ $solicitud->email }}</td>
                        <td class="px-4 py-4">{{ $solicitud->telefono }}</td>
                        <td class="px-4 py-4">{{ $solicitud->servicio }}</td>
                        <td class="px-4 py-4 truncate max-w-xs">{{ $solicitud->mensaje }}</td>
                        <td class="px-4 py-4">{{ $solicitud->created_at->format('d/m/Y H:i') }}</td>
                        <td class="px-4 py-4">
                            <button onclick="confirmarEliminacion('/solicitudes/{{ $solicitud->id }}')"
                                class="bg-red-500 text-white px-4 py-4 rounded-lg shadow-md hover:bg-red-700 transition">
                                <i class="fas fa-trash-alt"></i> Eliminar
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <h2 class="text-center text-4xl font-extrabold mb-8 text-green-800">Testimonios</h2>
    <div class="bg-white shadow-2xl rounded-lg p-6 overflow-x-auto">
        <table class="w-full border-collapse shadow-lg rounded-lg">
            <thead>
                <tr class="bg-green-900 text-white text-lg">
                    <th class="px-4 py-3">Nombre</th>
                    <th class="px-4 py-3">Mensaje</th>
                    <th class="px-4 py-3">Fecha</th>
                    <th class="px-4 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($testimonios as $testimonio)
                    <tr class="text-center border-b border-gray-300 hover:bg-gray-200 transition-all">
                        <td class="px-4 py-4">{{ $testimonio->nombre }}</td>
                        <td class="px-4 py-4 truncate max-w-xs">{{ $testimonio->mensaje }}</td>
                        <td class="px-4 py-4">{{ $testimonio->created_at->format('d/m/Y H:i') }}</td>
                        <td class="px-4 py-4">
                            <button onclick="confirmarEliminacion('/testimonios/{{ $testimonio->id }}')"
                                class="bg-red-500 text-white px-4 py-4 rounded-lg shadow-md hover:bg-red-700 transition">
                                <i class="fas fa-trash-alt"></i> Eliminar
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal de Confirmación -->
<div id="modalConfirmacion" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-2xl text-center max-w-sm">
        <h3 class="text-xl font-bold mb-4 text-red-600">¿Estás seguro?</h3>
        <p class="mb-4">Esta acción no se puede deshacer</p>
        <form id="formEliminar" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-red-800 transition">Eliminar</button>
            <button type="button" onclick="cerrarModal()" class="bg-gray-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-gray-700 transition ml-2">Cancelar</button>
        </form>
    </div>
</div>

<script>
    function confirmarEliminacion(url) {
        let form = document.getElementById('formEliminar');
        form.action = url;
        document.getElementById('modalConfirmacion').classList.remove('hidden');
    }

    function cerrarModal() {
        document.getElementById('modalConfirmacion').classList.add('hidden');
    }
</script>
@endsection
