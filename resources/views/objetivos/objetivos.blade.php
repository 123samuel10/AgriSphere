@extends('layouts.app')

@section('content')
<div class="container py-12">
    <h1 class="text-center mb-8 text-4xl font-semibold text-green-700">Objetivos Generales</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        <!-- Objetivo 1 -->
        <div class="bg-white shadow-lg rounded-lg p-6 text-center hover:shadow-xl transition duration-300">
            <i class="fas fa-cloud-sun text-4xl mb-4 text-green-600"></i>
            <h4 class="text-xl font-semibold text-green-700 mb-2">Correlación de Datos</h4>
            <p class="text-gray-600">Buscar correlación entre datos de lluvia, radiación, temperatura y productividades obtenidas.</p>
        </div>

        <!-- Objetivo 2 -->
        <div class="bg-white shadow-lg rounded-lg p-6 text-center hover:shadow-xl transition duration-300">
            <i class="fas fa-sync-alt text-4xl mb-4 text-orange-600"></i>
            <h4 class="text-xl font-semibold text-green-700 mb-2">Rotación de Cultivos</h4>
            <p class="text-gray-600">Buscar correlación y productividad por hectárea.</p>
        </div>

        <!-- Objetivo 3 -->
        <div class="bg-white shadow-lg rounded-lg p-6 text-center hover:shadow-xl transition duration-300">
            <i class="fas fa-seedling text-4xl mb-4 text-green-500"></i>
            <h4 class="text-xl font-semibold text-green-700 mb-2">Producción de Semilla</h4>
            <p class="text-gray-600">Validar el pontencial genético de la producción de semillas propias y de terceros.</p>
        </div>

        <!-- Objetivo 4 -->
        <div class="bg-white shadow-lg rounded-lg p-6 text-center hover:shadow-xl transition duration-300">
            <i class="fas fa-clipboard-list text-4xl mb-4 text-red-600"></i>
            <h4 class="text-xl font-semibold text-green-700 mb-2">Garantizar Calidad</h4>
            <p class="text-gray-600">Garantizar calidades de lo producción según las condiciones del mercado</p>
        </div>

        <!-- Objetivo 5 -->
        <div class="bg-white shadow-lg rounded-lg p-6 text-center hover:shadow-xl transition duration-300">
            <i class="fas fa-tag text-4xl mb-4 text-cyan-600"></i>
            <h4 class="text-xl font-semibold text-green-700 mb-2">Competitividad en Costos</h4>
            <p class="text-gray-600">Ser competitivos en costos de semilla, fertilizantes, insumos y otros.</p>
        </div>

        <!-- Objetivo 6 -->
        <div class="bg-white shadow-lg rounded-lg p-6 text-center hover:shadow-xl transition duration-300">
            <i class="fas fa-chart-line text-4xl mb-4 text-purple-600"></i>
            <h4 class="text-xl font-semibold text-green-700 mb-2">Estandarización de Información</h4>
            <p class="text-gray-600">Estanadarizar la captura el almacenamiento y entendimiento de la información que permitía análisis periódicos comparativos.</p>
        </div>

        <!-- Objetivo 7 -->
        <div class="bg-white shadow-lg rounded-lg p-6 text-center hover:shadow-xl transition duration-300">
            <i class="fas fa-shield-alt text-4xl mb-4 text-gray-600"></i>
            <h4 class="text-xl font-semibold text-green-700 mb-2">Gestión del Riesgo</h4>
            <p class="text-gray-600">Gestionar los riegos inherentes a la actividad agrícola empresarial.</p>
        </div>

        <!-- Objetivo 8 -->
        <div class="bg-white shadow-lg rounded-lg p-6 text-center hover:shadow-xl transition duration-300">
            <i class="fas fa-exclamation-triangle text-4xl mb-4 text-yellow-600"></i>
            <h4 class="text-xl font-semibold text-green-700 mb-2">Cambio Climático</h4>
            <p class="text-gray-600">Gestionar los desafíos de cambio climático (lluvia excesiva o sequía excesiva), amenazas productivas, biológicas y físicas.</p>
        </div>

        <!-- Objetivo 9 -->
        <div class="bg-white shadow-lg rounded-lg p-6 text-center hover:shadow-xl transition duration-300">
            <i class="fas fa-cogs text-4xl mb-4 text-blue-600"></i>
            <h4 class="text-xl font-semibold text-green-700 mb-2">Procesos Productivos</h4>
            <p class="text-gray-600">Desarrollar procesos productivos digitalizados y estandarizados.</p>
        </div>

  <!-- Objetivo 10 -->
<div class="bg-white shadow-lg rounded-lg p-6 text-center hover:shadow-xl transition duration-300">
    <i class="fas fa-search text-4xl mb-4 text-indigo-600"></i>
    <h4 class="text-xl font-semibold text-green-700 mb-2">Análisis individuales por dosel</h4>
    <p class="text-gray-600">Seguir con información digital y precisión cada planta del cultivo.</p>
</div>

    </div>
</div>
@endsection
