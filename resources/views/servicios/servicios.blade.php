@extends('layouts.app')

@section('content')
<!-- Se agregó un margen superior para separar la sección de servicios del header -->

<div class="container py-12">
    <h1 class="text-center mb-8 text-4xl font-semibold text-green-700">Servicios de AGRISPHERE</h1>
    <p class="text-center text-lg mb-10 text-gray-600">Ofrecemos soluciones tecnológicas avanzadas para la agricultura moderna</p>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
        @foreach([
            ['imagen' => 'servicioN1.jpeg', 'titulo' => 'Monitoreo individual del Cultivo', 'descripcion' => 'Aplicación de fotografía digital espectral para un cubrimiento detallado, análisis de densidades, alertas sanitarias y mapeo de precisión.'],
            ['imagen' => 'servicio2.jpeg', 'titulo' => 'Análisis Bromatológico Digital', 'descripcion' => 'Evaluación precisa del estado nutricional de los cultivos, permitiendo la toma de decisiones informadas para mejorar la salud y el rendimiento de las plantas.'],
            ['imagen' => 'servicio3.jpeg', 'titulo' => 'Análisis del Estado Fenológico de los Cultivos', 'descripcion' => 'Seguimiento detallado al desarrollo del cultivo, asegurando una gestión más eficiente y un crecimiento saludable a lo largo de todo su ciclo.'],
            ['imagen' => 'servicio5.jpeg', 'titulo' => 'Aspersiones Inteligentes', 'descripcion' => 'Zonificación de malezas, identificación y mapeo de áreas afectadas, vuelos autónomos y gestión en tiempo real de la labor cultural.'],
            ['imagen' => 'servicio7.jpeg', 'titulo' => 'Diseño de Sistemas de Riego y de Drenaje', 'descripcion' => 'Aforo de aguas, obras civiles y alternativas sostenibles para garantizar el suministro adecuado y eficiente de agua en las áreas de cultivo.'],
            ['imagen' => 'servicio6.jpeg', 'titulo' => 'Diseño de Sistemas Rotacionales de Ganado', 'descripcion' => 'División del territorio, altimetrías, calidad de las pasturas, manejo de aguas, sales minerales y estrategia de fertilización.']
        ] as $servicio)
        <div class="bg-white shadow-xl rounded-lg overflow-hidden hover:shadow-2xl transition duration-300">
            <div class="p-8 flex flex-col items-center">
                <div class="w-40 h-40 md:w-48 md:h-48 lg:w-56 lg:h-56 mb-6">
                    <img src="{{ asset('storage/' . $servicio['imagen']) }}" alt="{{ $servicio['titulo'] }}" class="w-full h-full object-cover rounded-lg shadow-lg hover:scale-110 transition-transform duration-300">
                </div>
                <h3 class="text-2xl font-semibold text-green-700 mb-3 text-center">{{ $servicio['titulo'] }}</h3>
                <p class="text-gray-700 text-center leading-relaxed mb-4">
                    {{ $servicio['descripcion'] }}
                </p>
                <a href="{{ route('solicitudes.create', ['servicio' => $servicio['titulo']]) }}" class="text-green-700 font-semibold hover:text-green-500 transition">Más detalles</a>

            </div>
        </div>
        @endforeach
    </div>
</div>


@endsection
