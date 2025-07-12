<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArchivoSolicitud extends Model
{
 protected $table = 'archivos_solicitudes'; // ✅ nombre correcto

    protected $fillable = [
        'solicitud_id',
        'ruta'
    ];

public function solicitud()
{
    return $this->belongsTo(Solicitud::class);
}


}
