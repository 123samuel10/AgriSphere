<!-- resources/views/partials/footer.blade.php -->
<footer class="bg-gradient-to-r from-green-800 to-green-600 text-white py-12 mt-12">
    <div class="container mx-auto flex flex-col md:flex-row justify-between items-center px-6">

   <!-- Logo -->
<div class="flex flex-col items-center md:items-start mb-8 md:mb-0">
    <img src="{{ asset('storage/LOGO.jpeg') }}"
         alt="AgriSphere"
         class="h-40 md:h-48 mb-4 transition duration-300 transform hover:scale-110 hover:shadow-xl">

    <p class="text-sm italic text-gray-200">
        "Cultivando datos, cosechando un mejor futuro"
    </p>
</div>


        <!-- Redes Sociales -->
        <div class="flex space-x-6 text-3xl mt-6 md:mt-0 justify-center md:justify-start">
  <a href="https://www.instagram.com/agrisphere_2025?igsh=bzJ5d3Y2Y2hrMWFn" class="hover:text-green-300 transition transform hover:scale-125"><i class="fab fa-instagram"></i></a>
             <a href="https://x.com/agrisphere2025" class="hover:text-green-300 transition transform hover:scale-125"><i class="fab fa-x-twitter"></i></a>
            <a href="https://www.linkedin.com/in/alberto-jaramillo-406342365/" class="hover:text-green-300 transition transform hover:scale-125"><i class="fab fa-linkedin-in"></i></a>
            <a href="https://www.youtube.com/@agrisphere-f9c/videos" class="hover:text-green-300 transition transform hover:scale-125"><i class="fab fa-youtube"></i></a>
        </div>

        <!-- Contacto -->
        <div class="text-center md:text-right mt-6 md:mt-0">
            <h3 class="text-xl font-semibold mb-2">Contacto</h3>
            <p class="text-sm">Email: agrishere@gmail.com</p>
            <p class="text-sm">Tel: +57 310 404 3241</p>
            <p class="text-sm">Armenia, Quindío</p>
        </div>
    </div>


    <div class="text-center">
        <p class="text-sm">© 2025 AgriSphere - Todos los derechos reservados</p>
        {{-- <a href="{{ route('login') }}" class="text-green-500 hover:text-green-700">Iniciar sesión</a> --}}
    </div>
</footer>
