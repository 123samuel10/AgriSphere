@extends('layouts.app')

@section('content')
<div class="container py-12">
    <h1 class="text-center mb-8 text-4xl font-semibold text-green-700">Testimonios de Clientes</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($testimonios as $testimonio)
        <div class="bg-white shadow-lg rounded-lg p-6 text-center">
            @if($testimonio->imagen)
            <img src="{{ asset('storage/'.$testimonio->imagen) }}" alt="Foto de {{ $testimonio->nombre }}" class="w-24 h-24 rounded-full mx-auto mb-4">
            @endif
            <h4 class="text-xl font-semibold text-green-700">{{ $testimonio->nombre }}</h4>
            <p class="text-gray-600 italic">"{{ $testimonio->mensaje }}"</p>
        </div>
        @endforeach
    </div>
</div>
@endsection
