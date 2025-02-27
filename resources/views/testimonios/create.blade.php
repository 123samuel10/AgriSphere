@extends('layouts.app')

@section('content')
<div class="container py-12">
    <h1 class="text-center mb-8 text-4xl font-semibold text-green-700">Agregar Testimonio</h1>

    <form action="{{ route('testimonios.store') }}" method="POST" enctype="multipart/form-data" class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Nombre</label>
            <input type="text" name="nombre" class="w-full border rounded-lg px-3 py-2 focus:outline-none" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Mensaje</label>
            <textarea name="mensaje" rows="4" class="w-full border rounded-lg px-3 py-2 focus:outline-none" required></textarea>
        </div>

        {{-- <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Imagen (opcional)</label>
            <input type="file" name="imagen" class="w-full border rounded-lg px-3 py-2 focus:outline-none">
        </div> --}}

        <button type="submit" class="bg-green-700 text-white px-6 py-2 rounded-lg hover:bg-green-600 transition">Guardar</button>
    </form>
</div>
@endsection
