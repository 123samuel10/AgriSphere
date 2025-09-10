<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MisionController;
use App\Http\Controllers\PaginaController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\TestimonioController;
use App\Http\Controllers\UsuarioSolicitudController;
use Illuminate\Support\Facades\Route;


// ===================== PÁGINAS PRINCIPALES =====================

Route::get('/', [TestimonioController::class, 'home'])->name('home');

Route::get('/servicios', function () {
    return view('servicios.servicios');
})->name('servicios');

Route::get('/ventajas', function () {
    return view('ventajas.ventajas');
})->name('ventajas');

Route::get('/objetivos', function () {
    return view('objetivos.objetivos');
})->name('objetivos');

Route::get('/clientes', function () {
    return view('clientes.clientes');
})->name('clientes');


// ===================== SOLICITUDES =====================

// Crear solicitud
Route::get('/solicitudes/crear', [SolicitudController::class, 'create'])->name('solicitudes.create');
Route::post('/solicitudes', [SolicitudController::class, 'store'])->name('solicitudes.store');

// Panel de administración de solicitudes
Route::get('/panel', [SolicitudController::class, 'panel'])->name('panel');
Route::delete('/solicitudes/{solicitud}', [SolicitudController::class, 'destroy'])->name('solicitudes.eliminar');
// Subir archivo a una solicitud (admin)
Route::post('/solicitudes/{solicitud}/subir-archivo', [SolicitudController::class, 'subirArchivo'])
    ->name('solicitudes.subirArchivo');

// Ver archivo
Route::get('/archivo/{archivoSolicitud}', [SolicitudController::class, 'verArchivo'])
    ->name('verArchivo');

// Eliminar archivo
Route::delete('/archivos/{archivoSolicitud}', [SolicitudController::class, 'eliminarArchivo'])
    ->name('solicitudes.eliminarArchivo');

// =========== Si tienes esta función de enviar PDF, mantenla; si no, bórrala ===========
Route::get('/solicitudes/{id}/enviar-pdf', [SolicitudController::class, 'enviarPdf'])->name('solicitudes.enviarPdf');


// ===================== TESTIMONIOS =====================

Route::get('/testimonios', [TestimonioController::class, 'index'])->name('testimonios.index');
Route::get('/testimonios/crear', [TestimonioController::class, 'create'])->name('testimonios.create');
Route::post('/testimonios', [TestimonioController::class, 'store'])->name('testimonios.store');
Route::delete('/testimonios/{testimonio}', [TestimonioController::class, 'destroy'])->name('testimonios.destroy');


// ===================== AUTENTICACIÓN =====================

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// ===================== USUARIO NORMAL =====================

Route::get('/usuario/solicitudes', [UsuarioSolicitudController::class, 'index'])->name('usuario.solicitudes');
Route::get('/usuario/archivo/{archivoSolicitud}', [UsuarioSolicitudController::class, 'verArchivo'])->name('usuario.verArchivo');


Route::get('/usuarios', [SolicitudController::class, 'verUsuarios'])->name('usuarios.lista');


//..................... recuperar contraseña........................................
// Mostrar formulario para pedir correo
Route::get('/recuperar-contrasena', [AuthController::class, 'mostrarFormularioRecuperar'])->name('password.request');

// Enviar correo con código
Route::post('/recuperar-contrasena', [AuthController::class, 'enviarCodigoRecuperacion'])->name('password.send');

// Mostrar formulario para cambiar contraseña
Route::get('/restablecer-contrasena', [AuthController::class, 'mostrarFormularioRestablecer'])->name('password.reset');

// Guardar nueva contraseña
Route::post('/restablecer-contrasena', [AuthController::class, 'guardarNuevaContrasena'])->name('password.update');





Route::get('/2fa/verify', [AuthController::class, 'show2faForm'])->name('2fa.verify.form');
Route::post('/2fa/verify', [AuthController::class, 'verify2fa'])->name('2fa.verify');
