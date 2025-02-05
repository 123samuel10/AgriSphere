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
                        <td>AgroInsumos</td>
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
