@extends('layouts.app')

@section('title', 'Verificación 2FA')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="w-full max-w-md bg-white shadow-xl rounded-lg p-8">
        <h2 class="text-center text-2xl font-bold text-green-700 mb-6">Verificación en dos pasos</h2>

        @if (session('error'))
            <div class="bg-red-500 text-white p-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        @if (session('success'))
            <div class="bg-green-500 text-white p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('2fa.verify') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="code" class="block text-gray-700 font-semibold mb-2">Código de verificación</label>
                <input type="text" name="code" id="code" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-600 focus:border-green-600 outline-none transition" required>
            </div>

            <button type="submit" class="w-full bg-green-700 text-white py-3 rounded-lg font-semibold text-lg hover:bg-green-800 transition">
                Verificar
            </button>
        </form>
    </div>
</div>
@endsection
