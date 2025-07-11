<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MisionController;
use App\Http\Controllers\PaginaController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\TestimonioController;
use App\Http\Controllers\UsuarioSolicitudController;
use App\Http\Controllers\VentajaController;
use App\Http\Controllers\VisionController;
use App\Models\Testimonio;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;


// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', function () {
    return view('home.home');  // Indicando la carpeta y el archivo
});

Route::get('/servicios', function () {
    return view('servicios.servicios');  // Si la vista 'servicios' está en la carpeta 'servicios'
});

Route::get('/ventajas', function () {
    return view('ventajas.ventajas');  // Si la vista 'ventajas' está en la carpeta 'ventajas'
});

Route::get('/objetivos', function () {
    return view('objetivos.objetivos');  // Si la vista 'ventajas' está en la carpeta 'ventajas'
});

Route::get('/clientes', function () {
    return view('clientes.clientes');  // Si la vista 'ventajas' está en la carpeta 'ventajas'
});
Route::get('/solicitudes/crear', [SolicitudController::class, 'create'])->name('solicitudes.create');
Route::post('/solicitudes', [SolicitudController::class, 'store'])->name('solicitudes.store');


Route::get('/servicios', function () {
    return view('servicios.servicios');
})->name('servicios');
//--------------------------------------------------------------------------------------------

// Muestra el formulario de login de administrador
// Route::get('/admin/login', [SolicitudController::class, 'showLogin'])->name('admin.login');

// Permite acceder al panel de solicitudes con GET
Route::get('/admin/solicitudes', [SolicitudController::class, 'adminIndex'])->name('admin.solicitudes');

// Procesa el formulario de login (si necesitas enviar credenciales por POST)
Route::post('/admin/solicitudes', [SolicitudController::class, 'adminIndex']);

 Route::delete('/solicitudes/{solicitud}', [SolicitudController::class, 'destroy'])
        ->name('solicitudes.destroy');


//----------------------------------------------------TESTIMONIOS


Route::get('/', [TestimonioController::class, 'home'])->name('home');

Route::get('/testimonios', [TestimonioController::class, 'index'])->name('testimonios.index');
Route::get('/testimonios/crear', [TestimonioController::class, 'create'])->name('testimonios.create');
Route::post('/testimonios', [TestimonioController::class, 'store'])->name('testimonios.store');
Route::delete('/testimonios/{testimonio}', [TestimonioController::class, 'destroy'])->name('testimonios.destroy');



// RUTAS DE AUTENTICACIÓN
// ✅ ÚNICAS rutas correctas de auth
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/panel', [SolicitudController::class, 'panel'])->name('panel');



//rutas para subir archivo
Route::get('/solicitudes/{id}/enviar-pdf', [SolicitudController::class, 'enviarPdf'])->name('solicitudes.enviarPdf');


Route::post('/solicitudes/{solicitud}/subir-archivo', [SolicitudController::class, 'subirArchivo'])
    ->name('solicitudes.subirArchivo');

Route::get('/solicitudes/{solicitud}/archivo', [SolicitudController::class, 'verArchivo'])
    ->name('solicitudes.verArchivo');


    //rutas para los archivos subirlo (admin)

    Route::post('/solicitudes/{solicitud}/archivo', [SolicitudController::class, 'subirArchivo'])->name('solicitudes.subirArchivo');
Route::get('/archivo/{archivoSolicitud}', [SolicitudController::class, 'verArchivo'])->name('verArchivo');

//rutas oara observar archivos (usuario)
Route::get('/usuario/solicitudes', [UsuarioSolicitudController::class, 'index'])->name('usuario.solicitudes');
Route::get('/usuario/archivo/{archivoSolicitud}', [UsuarioSolicitudController::class, 'verArchivo'])->name('usuario.verArchivo');
