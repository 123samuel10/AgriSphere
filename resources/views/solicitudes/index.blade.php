@extends('layouts.app')

@section('title', 'Panel de Solicitudes')

@section('content')
<div class="container py-12">
    <h2 class="text-center text-3xl font-bold mb-6 text-green-700">Solicitudes Recibidas</h2>

    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-6 text-center font-semibold shadow-md">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow-xl rounded-lg p-6 overflow-x-auto">
        <table class="min-w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-green-800 text-white">
                    <th class="border border-gray-300 px-4 py-2">Nombre</th>
                    <th class="border border-gray-300 px-4 py-2">Email</th>
                    <th class="border border-gray-300 px-4 py-2">Teléfono</th>
                    <th class="border border-gray-300 px-4 py-2">Servicio</th>
                    <th class="border border-gray-300 px-4 py-2">Mensaje</th>
                    <th class="border border-gray-300 px-4 py-2">Fecha</th>
                    <th class="border border-gray-300 px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($solicitudes as $solicitud)
                    <tr class="text-center border border-gray-300 hover:bg-gray-100">
                        <td class="border border-gray-300 px-4 py-2">{{ $solicitud->nombre }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $solicitud->email }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $solicitud->telefono }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $solicitud->servicio }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $solicitud->mensaje }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $solicitud->created_at->format('d/m/Y H:i') }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <button onclick="confirmarEliminacion({{ $solicitud->id }})" class="bg-red-600 text-white px-4 py-2 rounded shadow-lg hover:bg-red-800 transition">
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
    <div class="bg-white p-6 rounded-lg shadow-xl text-center max-w-sm">
        <h3 class="text-xl font-bold mb-4 text-red-600">¿Estás seguro?</h3>
        <p class="mb-4">Esta acción no se puede deshacer.</p>
        <form id="formEliminar" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded shadow-lg hover:bg-red-800 transition">Eliminar</button>
            <button type="button" onclick="cerrarModal()" class="bg-gray-500 text-white px-4 py-2 rounded shadow-lg hover:bg-gray-700 transition ml-2">Cancelar</button>
        </form>
    </div>
</div>

<script>
    function confirmarEliminacion(id) {
        let form = document.getElementById('formEliminar');
        form.action = `/solicitudes/${id}`;
        document.getElementById('modalConfirmacion').classList.remove('hidden');
    }

    function cerrarModal() {
        document.getElementById('modalConfirmacion').classList.add('hidden');
    }
</script>
@endsection
