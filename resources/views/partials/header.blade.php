<header class="bg-gradient-to-r from-green-800 to-green-600 text-white py-5 shadow-2xl fixed top-0 left-0 w-full z-50">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <div class="container mx-auto flex justify-between items-center px-6">
        <!-- Logo y slogan -->
        <div class="flex flex-col">
            <a href="/" class="text-4xl font-bold text-white hover:text-green-300 transition duration-300">
                AgriSphere
            </a>
            <p class="text-sm italic text-gray-200 mt-1">
                “Cultivamos datos para cosechar un futuro sostenible”
            </p>
        </div>

        <!-- Menú Desktop -->
        <div class="hidden md:flex flex-1 justify-center items-center space-x-10">
            <nav class="flex space-x-6 text-lg font-semibold justify-center">
                <a href="/" class="nav-link transition duration-300 hover:text-green-300 hover:underline">Inicio</a>
                <a href="/servicios" class="nav-link transition duration-300 hover:text-green-300 hover:underline">Servicios</a>
                <a href="/ventajas" class="nav-link transition duration-300 hover:text-green-300 hover:underline">Ventajas</a>
                <a href="/objetivos" class="nav-link transition duration-300 hover:text-green-300 hover:underline">Objetivos</a>
                <a href="/clientes" class="nav-link transition duration-300 hover:text-green-300 hover:underline">Clientes</a>
            </nav>
        </div>

        <!-- Usuario autenticado o Botón Iniciar Sesión -->
        <div class="hidden md:flex items-center space-x-4">
            @if(session('user_auth'))
                @php
                    $nombre = \App\Models\User::find(session('user_id'))->name;
                @endphp
                <div class="flex items-center space-x-2">
                    <i class="fas fa-user-circle text-white text-xl"></i>
                    <span class="font-medium">{{ $nombre }}</span>
                </div>

                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit"
                        class="bg-green-700 hover:bg-green-900 px-3 py-1 rounded-full text-sm font-semibold transition duration-300">
                        Cerrar sesión
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}"
                    class="bg-white text-green-800 font-bold px-4 py-2 rounded-full shadow hover:bg-green-100 transition duration-300">
                    Iniciar Sesión
                </a>
            @endif
        </div>

        <!-- Botón menú móvil -->
        <button id="menu-toggle" class="text-3xl focus:outline-none md:hidden">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <!-- Menú móvil -->
    <nav id="mobile-menu"
        class="hidden bg-green-900 text-white text-center py-5 space-y-4 absolute top-full left-0 w-full shadow-lg md:hidden">
        <a href="/" class="mobile-link block transition duration-300 hover:text-green-300">Inicio</a>
        <a href="/servicios" class="mobile-link block transition duration-300 hover:text-green-300">Servicios</a>
        <a href="/ventajas" class="mobile-link block transition duration-300 hover:text-green-300">Ventajas</a>
        <a href="/objetivos" class="mobile-link block transition duration-300 hover:text-green-300">Objetivos</a>
        <a href="/clientes" class="mobile-link block transition duration-300 hover:text-green-300">Clientes</a>

        @if(session('user_auth'))
            <hr class="border-green-700 my-2">
            <div class="text-center text-sm">
                Sesión iniciada como <strong>{{ $nombre }}</strong>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit"
                        class="block w-full mt-2 bg-green-700 hover:bg-green-900 px-4 py-2 rounded-full text-sm font-semibold transition duration-300">
                        Cerrar sesión
                    </button>
                </form>
            </div>
        @else
            <a href="{{ route('login') }}"
                class="block bg-white text-green-800 font-bold mx-auto px-4 py-2 rounded-full shadow hover:bg-green-100 transition duration-300 w-40">
                Iniciar Sesión
            </a>
        @endif
    </nav>

    <!-- Script menú móvil -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const menuToggle = document.getElementById("menu-toggle");
            const mobileMenu = document.getElementById("mobile-menu");
            const mobileLinks = document.querySelectorAll(".mobile-link");

            menuToggle.addEventListener("click", function () {
                mobileMenu.classList.toggle("hidden");
            });

            mobileLinks.forEach(link => {
                link.addEventListener("click", function () {
                    mobileMenu.classList.add("hidden");
                });
            });

            const desktopLinks = document.querySelectorAll('.nav-link');
            desktopLinks.forEach(link => {
                if (link.href === window.location.href) {
                    link.classList.add('border-b-2', 'border-green-300', 'text-green-300');
                }
            });
        });
    </script>
</header>
