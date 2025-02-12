@extends('layouts.app')

@section('title', 'Solicitud de Información')

@section('content')
<div class="container py-12 flex justify-center items-center min-h-screen">
    <div class="bg-white shadow-xl rounded-lg p-10 w-full max-w-lg">
        <h2 class="text-center text-3xl font-bold mb-6 text-green-700">Déjanos tus datos</h2>
        <p class="text-center text-gray-600 mb-4">Nos pondremos en contacto contigo lo antes posible.</p>

        <form action="{{ route('solicitudes.store') }}" method="POST" class="space-y-4" id="solicitud-form">
            @csrf
            <input type="hidden" name="servicio" value="{{ $servicio }}">

            <div>
                <label for="nombre" class="block text-gray-700 font-semibold">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="w-full p-3 border border-gray-300 rounded focus:ring-2 focus:ring-green-600" required>
                <p id="error-nombre" class="text-red-500 text-sm hidden">Este campo es obligatorio.</p>
            </div>

            <div>
                <label for="email" class="block text-gray-700 font-semibold">Email:</label>
                <input type="email" name="email" id="email" class="w-full p-3 border border-gray-300 rounded focus:ring-2 focus:ring-green-600" required>
                <p id="error-email" class="text-red-500 text-sm hidden">Ingresa un email válido.</p>
            </div>

            <div>
                <label for="telefono" class="block text-gray-700 font-semibold">Teléfono:</label>
                <input type="text" name="telefono" id="telefono" class="w-full p-3 border border-gray-300 rounded focus:ring-2 focus:ring-green-600" required>
                <p id="error-telefono" class="text-red-500 text-sm hidden">Ingresa un número válido.</p>
            </div>

            <div>
                <label for="mensaje" class="block text-gray-700 font-semibold">Mensaje:</label>
                <textarea name="mensaje" id="mensaje" class="w-full p-3 border border-gray-300 rounded focus:ring-2 focus:ring-green-600"></textarea>
            </div>

            <button type="submit" class="w-full bg-green-700 text-white py-3 rounded hover:bg-green-800 transition text-lg font-semibold">Enviar</button>
        </form>
    </div>
</div>

@if(session('success'))
<div id="successModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white p-6 rounded-lg shadow-lg text-center max-w-sm">
        <h2 class="text-2xl font-semibold text-green-700">¡Solicitud enviada con éxito!</h2>
        <p class="mt-2 text-gray-600">Nos pondremos en contacto contigo pronto.</p>
        <button id="closeModal" class="mt-4 bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800 transition">
            Aceptar
        </button>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('closeModal').addEventListener('click', function () {
            window.location.href = "{{ route('servicios') }}";
        });
    });
</script>
@endif

<script>
    document.getElementById('solicitud-form').addEventListener('submit', function(event) {
        let valid = true;

        const nombre = document.getElementById('nombre');
        const email = document.getElementById('email');
        const telefono = document.getElementById('telefono');

        if (nombre.value.trim() === '') {
            document.getElementById('error-nombre').classList.remove('hidden');
            valid = false;
        } else {
            document.getElementById('error-nombre').classList.add('hidden');
        }

        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email.value)) {
            document.getElementById('error-email').classList.remove('hidden');
            valid = false;
        } else {
            document.getElementById('error-email').classList.add('hidden');
        }

        const phonePattern = /^[0-9]{7,15}$/;
        if (!phonePattern.test(telefono.value)) {
            document.getElementById('error-telefono').classList.remove('hidden');
            valid = false;
        } else {
            document.getElementById('error-telefono').classList.add('hidden');
        }

        if (!valid) {
            event.preventDefault();
        }
    });
</script>
@endsection
