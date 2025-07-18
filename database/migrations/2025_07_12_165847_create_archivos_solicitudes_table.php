<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
   Schema::create('archivos_solicitudes', function (Blueprint $table) {
    $table->id();
    $table->foreignId('solicitud_id')->constrained('solicitudes')->onDelete('cascade');
    $table->string('ruta');
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archivos_solicitudes');
    }
};
