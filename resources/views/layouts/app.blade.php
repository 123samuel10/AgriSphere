<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'AgriSphere - Innovación en Agricultura')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body class="bg-gray-100 text-gray-900 font-sans">

    <!-- Incluir el header -->
    @include('partials.header')

    <!-- Contenido principal -->
    <main class="mt-32 px-6 md:px-12">
        @yield('content')
    </main>

    <!-- Incluir el footer -->
    @include('partials.footer')


</body>
</html>
