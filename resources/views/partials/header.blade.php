<header class="bg-gradient-to-r from-green-800 to-green-600 text-white py-5 shadow-2xl fixed top-0 left-0 w-full z-50">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <div class="container mx-auto flex justify-between items-center px-6">
        <!-- Logo y slogan -->
        <div class="text-left flex items-center space-x-3">
            <a href="/" class="text-4xl font-bold text-white hover:text-green-300 transition duration-300">AgriSphere</a>
            <p class="text-sm italic text-gray-200 mt-2 hidden md:block">"Cultivando datos, cosechando un mejor futuro"</p>
        </div>

        <!-- Menú Desktop -->
        <nav class="hidden md:flex space-x-6 text-lg font-semibold">
            <a href="/" class="nav-link transition duration-300 hover:text-green-300 hover:underline">Inicio</a>
            <a href="/servicios" class="nav-link transition duration-300 hover:text-green-300 hover:underline">Servicios</a>
            <a href="/ventajas" class="nav-link transition duration-300 hover:text-green-300 hover:underline">Ventajas</a>
            <a href="/objetivos" class="nav-link transition duration-300 hover:text-green-300 hover:underline">Objetivos</a>
            <a href="/clientes" class="nav-link transition duration-300 hover:text-green-300 hover:underline">Clientes</a>
        </nav>

        <!-- Botón menú móvil -->
        <button id="menu-toggle" class="md:hidden text-3xl focus:outline-none">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <!-- Menú móvil -->
    <nav id="mobile-menu" class="hidden bg-green-900 text-white text-center py-5 space-y-4 absolute top-full left-0 w-full shadow-lg">
        <a href="/" class="block transition duration-300 hover:text-green-300">Inicio</a>
        <a href="/servicios" class="block transition duration-300 hover:text-green-300">Servicios</a>
        <a href="/ventajas" class="block transition duration-300 hover:text-green-300">Ventajas</a>
        <a href="/objetivos" class="block transition duration-300 hover:text-green-300">Objetivos</a>
        <a href="/clientes" class="block transition duration-300 hover:text-green-300">Clientes</a>
    </nav>

    <!-- Script para menú móvil -->
    <script>
        document.getElementById('menu-toggle').addEventListener('click', function () {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });

        // Agregar clase activa para resaltar la sección actual
        const links = document.querySelectorAll('.nav-link');
        links.forEach(link => {
            if (link.href === window.location.href) {
                link.classList.add('border-b-2', 'border-green-300', 'text-green-300');
            }
        });
    </script>
</header>
