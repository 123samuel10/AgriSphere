@extends('layouts.app')

@section('title', 'Panel de Solicitudes')

@section('content')
<div class="container py-12">
    <h2 class="text-center text-2xl font-semibold mb-6">Solicitudes Recibidas</h2>

    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow-lg rounded-lg p-6 overflow-x-auto">
        <table class="min-w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-green-700 text-white">
                    <th class="border border-gray-300 px-4 py-2">Nombre</th>
                    <th class="border border-gray-300 px-4 py-2">Email</th>
                    <th class="border border-gray-300 px-4 py-2">Teléfono</th>
                    <th class="border border-gray-300 px-4 py-2">Servicio</th>
                    <th class="border border-gray-300 px-4 py-2">Mensaje</th>
                    <th class="border border-gray-300 px-4 py-2">Fecha</th>
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
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
