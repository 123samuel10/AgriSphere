@extends('layouts.app')

@section('title', 'Solicitud de Información')

@section('content')
<div class="container py-12">
    <h2 class="text-center text-2xl font-semibold mb-6">Déjanos tus datos y te contactaremos</h2>

    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('solicitudes.store') }}" method="POST" class="bg-white shadow-lg rounded-lg p-8">
        @csrf
        <input type="hidden" name="servicio" value="{{ $servicio }}">

        <div class="mb-4">
            <label for="nombre" class="block text-gray-700 font-semibold">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="w-full p-2 border border-gray-300 rounded" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-semibold">Email:</label>
            <input type="email" name="email" id="email" class="w-full p-2 border border-gray-300 rounded" required>
        </div>

        <div class="mb-4">
            <label for="telefono" class="block text-gray-700 font-semibold">Teléfono:</label>
            <input type="text" name="telefono" id="telefono" class="w-full p-2 border border-gray-300 rounded" required>
        </div>

        <div class="mb-4">
            <label for="mensaje" class="block text-gray-700 font-semibold">Mensaje:</label>
            <textarea name="mensaje" id="mensaje" class="w-full p-2 border border-gray-300 rounded"></textarea>
        </div>

        <button type="submit" class="bg-green-700 text-white py-2 px-4 rounded hover:bg-green-800 transition">Enviar</button>
    </form>
</div>
@endsection
