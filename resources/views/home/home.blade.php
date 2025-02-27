@extends('layouts.app')

@section('content')
    <!-- Sección de Propuesta de Valor -->
    <section class="text-white py-20 rounded-lg shadow-lg mb-12 mt-32 bg-gray-100">
        <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-2 items-center gap-12">
            <!-- Imagen -->
            <div class="flex justify-center">
                <img src="{{ asset('storage/fondo1.jpeg') }}" alt="Imagen de agricultura" class="rounded-lg shadow-xl w-full max-w-md animate__animated animate__fadeInLeft">
            </div>
            <!-- Texto -->
            <div>
                <h2 class="text-4xl font-semibold text-green-600 animate__animated animate__fadeInRight">Propuesta de Valor</h2>
                <p class="mt-6 text-lg text-gray-700 animate__animated animate__fadeInRight animate__delay-1s">
                    Aplicamos tecnología avanzada de drones y análisis de datos para aumentar la productividad y eficiencia en la agricultura. Nuestros servicios permiten mejorar los rendimientos en un 10%, reducir costos en un 15% y lograr un ROI óptimo en los siguientes dos años.
                </p>
                <p class="mt-4 text-lg text-gray-700 animate__animated animate__fadeInRight animate__delay-2s">
                    Facilitamos una gestión precisa y sostenible del cultivo, enfrentando desafíos como el cambio climático y las plagas, y maximizando el potencial genético de los cultivos. Nuestras soluciones revolucionan la agricultura, impulsando el crecimiento y la competitividad en un mercado en expansión.
                </p>
                <a href="/servicios" class="mt-6 inline-block bg-green-500 hover:bg-green-400 px-8 py-3 text-white font-semibold rounded-lg shadow-md transition-transform transform hover:scale-105 animate__animated animate__zoomIn animate__delay-3s">
                    Descubre nuestros servicios
                </a>
            </div>
        </div>
    </section>

    <!-- Sección de estadísticas -->
    <section class="bg-green-700 text-white py-12 rounded-lg shadow-lg text-center mb-12">
        <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <h3 class="text-4xl font-bold">+10%</h3>
                <p class="text-lg mt-2">Mejora en rendimiento</p>
            </div>
            <div>
                <h3 class="text-4xl font-bold">-15%</h3>
                <p class="text-lg mt-2">Reducción de costos</p>
            </div>
            <div>
                <h3 class="text-4xl font-bold">2 años</h3>
                <p class="text-lg mt-2">Retorno de inversión</p>
            </div>
        </div>
    </section>

    <!-- Sección de Misión y Visión -->
    <section class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-12 mb-16">
        <!-- Misión -->
        <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-2xl transition-transform transform hover:scale-105">
            <h2 class="text-3xl font-semibold text-green-600">Nuestra Misión</h2>
            <p class="mt-4 text-gray-600">
                En AGRISPHERE, empoderamos a los agricultores con soluciones tecnológicas innovadoras que transforman la manera en que cultivan y administran la tierra. Aplicación tecnologias de drones y análisis de datos para optimizar el rendimiento de los cultivos, reducir costos y fomentar la sostenibilidad social, económica y ambiental.
            </p>
            <p class="text-gray-600 mt-3">
                Nuestro compromiso es crear un futuro donde la tecnología y la agricultura se integren perfectamente, garantizando la seguridad alimentaria y mejorando la calidad de vida de todos los actores.
            </p>
        </div>

        <!-- Visión -->
        <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-2xl transition-transform transform hover:scale-105">
            <h2 class="text-3xl font-semibold text-green-600">Nuestra Visión</h2>
            <p class="mt-4 text-gray-600">
                Queremos liderar la agricultura de precisión, estableciendo nuevos estándares en la aplicación de tecnologías avanzadas de drones y análisis de datos.
            </p>
            <p class="text-gray-600 mt-3">
                Nuestro objetivo es revolucionar la industria agrícola, por medio de la digitalización, brindando a los agricultores soluciones innovadoras que maximicen el rendimiento de sus cultivos y promuevan la sostenibilidad a largo plazo. Buscamos transformar la manera en que se cultiva y se administra la tierra para asegurar la seguridad alimentaria y el desarrollo sostenible de las futuras generaciones.
            </p>
        </div>
    </section>

    <!-- Sección de Testimonios -->
<!-- Sección de Testimonios -->
<!-- Sección de Testimonios -->
<section class="bg-gray-100 py-20 rounded-lg shadow-lg text-center mb-12">
    <div class="container mx-auto px-6">
        <h2 class="text-4xl font-bold text-green-700 mb-12 animate__animated animate__fadeInUp">
          La voz de nuestros clientes: <br> Experiencias que inspiran
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($testimonios as $testimonio)
            <div class="bg-white shadow-xl rounded-2xl p-8 text-center transform hover:scale-105 transition-all duration-300 animate__animated animate__fadeInUp">
                @if($testimonio->imagen)
                <img src="{{ asset('storage/'.$testimonio->imagen) }}" alt="Foto de {{ $testimonio->nombre }}"
                     class="w-24 h-24 rounded-full mx-auto mb-4 border-4 border-green-500 shadow-lg">
                @endif
                <h4 class="text-xl font-semibold text-green-700">{{ $testimonio->nombre }}</h4>
                <p class="text-gray-600 italic mt-3">"{{ $testimonio->mensaje }}"</p>
                <span class="block mt-4 text-sm font-semibold text-gray-500">{{ $testimonio->cargo ?? 'Cliente satisfecho' }}</span>
                <span class="block text-sm text-gray-400">{{ $testimonio->empresa ?? '' }}</span>
            </div>
            @endforeach
        </div>

        <a href="{{ route('testimonios.create') }}"
           class="mt-10 inline-block bg-green-500 hover:bg-green-400 px-8 py-3 text-white font-semibold rounded-lg shadow-md transition-transform transform hover:scale-110">
            Agregar Testimonio
        </a>
    </div>
</section>

@endsection
