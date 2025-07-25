@extends('layouts.app')

@section('title', 'Recuperar Contraseña')

@section('content')
<div class="min-h-[60vh] flex items-center justify-center bg-gray-100 py-8">
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-xl">
        <h2 class="text-center text-2xl font-bold mb-6 text-green-700">Recuperar Contraseña</h2>

        @if (session('error'))
            <div class="bg-red-500 text-white p-3 rounded mb-4">{{ session('error') }}</div>
        @endif

        @if (session('success'))
            <div class="bg-green-500 text-white p-3 rounded mb-4">{{ session('success') }}</div>
        @endif

        <form action="{{ route('password.send') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="email" class="block text-gray-700 mb-1">Correo electrónico</label>
                <input type="email" name="email" id="email" class="w-full border border-gray-300 p-3 rounded focus:ring-2 focus:ring-green-600 focus:border-green-600 outline-none transition" required>
            </div>

            <button type="submit" class="w-full bg-green-700 text-white py-3 rounded-lg font-semibold hover:bg-green-800 transition">
                Enviar Código
            </button>
        </form>
    </div>
</div>
@endsection
