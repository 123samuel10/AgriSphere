@extends('layouts.app')

@section('title', 'Restablecer Contraseña')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4 text-green-700">Restablecer Contraseña</h2>

    @if (session('error'))
        <div class="bg-red-500 text-white p-2 rounded mb-4">{{ session('error') }}</div>
    @endif
    @if (session('success'))
        <div class="bg-green-500 text-white p-2 rounded mb-4">{{ session('success') }}</div>
    @endif

    <form action="{{ route('password.update') }}" method="POST">
        @csrf

        <label for="email">Correo electrónico</label>
        <input type="email" name="email" class="w-full border p-2 mb-4" required>

        <label for="token">Código de recuperación</label>
        <input type="text" name="token" class="w-full border p-2 mb-4" required>

        <label for="password">Nueva contraseña</label>
        <input type="password" name="password" class="w-full border p-2 mb-4" required>

        <label for="password_confirmation">Confirmar nueva contraseña</label>
        <input type="password" name="password_confirmation" class="w-full border p-2 mb-4" required>

        <button type="submit" class="bg-green-700 text-white px-4 py-2 rounded">Guardar Nueva Contraseña</button>
    </form>
</div>
@endsection
