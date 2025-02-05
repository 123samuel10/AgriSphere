<!-- resources/views/partials/footer.blade.php -->
<footer class="bg-gradient-to-r from-green-800 to-green-600 text-white py-12 mt-12">
    <div class="container mx-auto flex flex-col md:flex-row justify-between items-center px-6">

        <!-- Logo -->
        <div class="flex flex-col items-center md:items-start mb-8 md:mb-0">
            <img src="{{ asset('storage/icono agrishere.png') }}" alt="AgriSphere" class="h-16 mb-4 transition duration-300 transform hover:scale-110 hover:shadow-xl">
            <p class="text-sm italic text-gray-200">"Cultivando datos, cosechando un mejor futuro"</p>
        </div>

        <!-- Redes Sociales -->
        <div class="flex space-x-6 text-3xl mt-6 md:mt-0 justify-center md:justify-start">
            <a href="#" class="hover:text-green-300 transition transform hover:scale-125"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="hover:text-green-300 transition transform hover:scale-125"><i class="fab fa-x-twitter"></i></a>
            <a href="#" class="hover:text-green-300 transition transform hover:scale-125"><i class="fab fa-instagram"></i></a>
            <a href="#" class="hover:text-green-300 transition transform hover:scale-125"><i class="fab fa-linkedin-in"></i></a>
            <a href="#" class="hover:text-green-300 transition transform hover:scale-125"><i class="fab fa-youtube"></i></a>
        </div>

        <!-- Contacto -->
        <div class="text-center md:text-right mt-6 md:mt-0">
            <h3 class="text-xl font-semibold mb-2">Contacto</h3>
            <p class="text-sm">Email: albertojaramillos@hotmail.com</p>
            <p class="text-sm">Tel: +57 310 404 3241</p>
            <p class="text-sm">Armenia, Quindío</p>
        </div>
    </div>

    <div class="border-t border-green-300 mt-8 pt-4 text-center text-gray-400 text-sm">
        &copy; 2025 AgriSphere. Todos los derechos reservados.
    </div>
</footer>
