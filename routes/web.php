<?php

use App\Http\Controllers\MisionController;
use App\Http\Controllers\PaginaController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\VentajaController;
use App\Http\Controllers\VisionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


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


// Ruta protegida para administradores
// Route::middleware(['auth', 'can:admin'])->group(function () {
//     Route::get('/admin/solicitudes', [SolicitudController::class, 'adminIndex'])->name('admin.solicitudes');
// });

Route::get('/admin/solicitudes', [SolicitudController::class, 'adminIndex'])->name('admin.solicitudes');


