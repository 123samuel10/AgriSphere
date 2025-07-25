@extends('layouts.app')

@section('title', 'Iniciar Sesión')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="w-full max-w-md bg-white shadow-xl rounded-lg p-8">
        <h2 class="text-center text-3xl font-bold text-green-700 mb-6">Iniciar Sesion</h2>

        <!-- Mostrar mensaje de error -->
        @if (session('error'))
            <div class="bg-red-500 text-white p-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('login.submit') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="email" class="block text-gray-700 font-semibold mb-2">Correo electrónico</label>
                <input type="email" name="email" id="email" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-600 focus:border-green-600 outline-none transition" required>
            </div>

            <div>
                <label for="password" class="block text-gray-700 font-semibold mb-2">Contraseña</label>
                <input type="password" name="password" id="password" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-600 focus:border-green-600 outline-none transition" required>
            </div>

                  <!-- Enlace de recuperación de contraseña -->
            <div class="text-right">
                <a href="{{ route('password.request') }}" class="text-sm text-green-700 font-semibold hover:underline">
                    ¿Olvidaste tu contraseña?
                </a>
            </div>

            <button type="submit" class="w-full bg-green-700 text-white py-3 rounded-lg font-semibold text-lg hover:bg-green-800 transition">
                Ingresar
            </button>
        </form>

        <p class="mt-4 text-center">
            ¿No tienes cuenta?
            <a href="{{ route('register') }}" class="text-green-700 font-semibold hover:underline">
                Registrarse
            </a>
        </p>
    </div>
</div>
@endsection
