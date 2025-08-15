@extends('layouts.app')

@section('content')

<div class="container py-12">

    <!-- Clientes -->
    <section class="bg-white py-5 mb-4 rounded shadow-lg animate__animated animate__fadeInUp">
        <div class="container">
            <h2 class="text-success fw-bold">Nuestros Clientes</h2>
            <p class="mt-3 text-muted">
                Aquí presentamos algunos de nuestros clientes y los proyectos en los que estamos colaborando:
            </p>

            <table class="table table-bordered table-hover">
                <thead class="table-success">
                    <tr>
                        <th>Cliente</th>
                        <th>Proyecto</th>
                        <th>Fecha de Finalización</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Agrícola y Pecuaria del Río SA</td>
                        <td>Monitoreo exposición foliar digital para construcción de curvas de productividad y afinamiento de campaña nutricional</td>
                        <td>Enero 2024</td>
                    </tr>
                    <tr>
                        <td>Agroindustrial MIA SA</td>
                        <td>Seguimiento foliar digital para industrialización de explotaciones de guadua, reconocimiento aéreo</td>
                        <td>Noviembre 2023 - Abril 2024</td>
                    </tr>
                    <tr>
                        <td>Ricardo y Cia SAS</td>
                        <td>Monitoreo de exposición foliar digital, monitoreo multispectral, alinderamiento satelital, reconocimiento aéreo</td>
                        <td>En ejecución</td>
                    </tr>
                    <tr>
                        <td>Carlos Aragón</td>
                        <td>Validación estado nutricional para afinamiento campaña nutricional, reconocimiento aéreo</td>
                        <td>En ejecución</td>
                    </tr>
                    <tr>
                        <td>David Moreno</td>
                        <td>Validación estado nutricional para afinamiento campaña nutricional</td>
                        <td>En ejecución</td>
                    </tr>
                    <tr>
                        <td>AgroInsumos SAS</td>
                        <td>Seguimiento multispectral para fenotipado de nuevas variedades, reconocimiento aéreo</td>
                        <td>En ejecución</td>
                    </tr>
                    <tr>
                        <td>SADEP Ltda</td>
                        <td>Seguimiento foliar digital para calibración del algoritmo Agriwebs</td>
                        <td>Agosto 2024</td>
                    </tr>
                    <tr>
                        <td>Marino Botero</td>
                        <td>Altimetría, estados fenológicos, rutas de aspersión aérea, reconocimiento aéreo</td>
                        <td>Junio 2024</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    </div>
@endsection
{{-- @extends('layouts.app')

@section('content')

<div class="container py-12">

    <!-- Sección Clientes -->
    <section class="bg-gradient-to-br from-green-50 to-white py-12 mb-12 rounded-3xl shadow-xl animate__animated animate__fadeInUp">
        <div class="container mx-auto px-6">
            <h2 class="text-green-800 text-4xl font-extrabold mb-4 text-center">Nuestros Clientes</h2>
            <p class="text-gray-600 mb-10 text-center max-w-2xl mx-auto">
                Conoce algunos de nuestros aliados estratégicos y los proyectos innovadores que impulsamos juntos:
            </p>

            <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                <!-- Card Cliente -->
                @php
                    $clientes = [
                        [
                            'nombre' => 'Agrícola y Pecuaria del Río SA',
                            'proyecto' => 'Monitoreo exposición foliar digital para curvas de productividad y afinamiento de campaña nutricional.',
                            'fecha' => 'Enero 2024',
                        ],
                        [
                            'nombre' => 'Agroindustrial MIA SA',
                            'proyecto' => 'Seguimiento foliar digital para industrialización de explotaciones de guadua, reconocimiento aéreo.',
                            'fecha' => 'Nov 2023 - Abr 2024',
                        ],
                        [
                            'nombre' => 'Ricardo y Cia SAS',
                            'proyecto' => 'Monitoreo foliar digital, multispectral, alinderamiento satelital y reconocimiento aéreo.',
                            'fecha' => 'En ejecución',
                        ],
                        [
                            'nombre' => 'Carlos Aragón',
                            'proyecto' => 'Validación estado nutricional para afinamiento de campaña y reconocimiento aéreo.',
                            'fecha' => 'En ejecución',
                        ],
                        [
                            'nombre' => 'David Moreno',
                            'proyecto' => 'Validación estado nutricional para afinamiento campaña nutricional.',
                            'fecha' => 'En ejecución',
                        ],
                        [
                            'nombre' => 'AgroInsumos SAS',
                            'proyecto' => 'Seguimiento multispectral para fenotipado de nuevas variedades, reconocimiento aéreo.',
                            'fecha' => 'En ejecución',
                        ],
                        [
                            'nombre' => 'SADEP Ltda',
                            'proyecto' => 'Seguimiento foliar digital para calibración del algoritmo Agriwebs.',
                            'fecha' => 'Agosto 2024',
                        ],
                        [
                            'nombre' => 'Marino Botero',
                            'proyecto' => 'Altimetría, estados fenológicos, rutas de aspersión aérea, reconocimiento aéreo.',
                            'fecha' => 'Junio 2024',
                        ],
                    ];
                @endphp

                @foreach ($clientes as $cliente)
                    <div class="bg-white rounded-2xl shadow-md border border-green-100 p-6 hover:shadow-2xl transition duration-300 relative">
                        <div class="absolute -top-5 -right-5 bg-green-700 text-white rounded-full p-3 shadow-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                                 viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M9 17v-6a2 2 0 012-2h2a2 2 0 012 2v6m-4 0h.01M12 7h.01"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-green-800 mb-2">{{ $cliente['nombre'] }}</h3>
                        <p class="text-gray-600 mb-4">{{ $cliente['proyecto'] }}</p>
                        <span class="inline-block bg-green-100 text-green-800 text-xs px-3 py-1 rounded-full font-medium">
                            {{ $cliente['fecha'] }}
                        </span>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

</div>
@endsection --}}
