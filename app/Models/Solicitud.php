<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
  // Indicar el nombre correcto de la tabla
  protected $table = 'solicitudes';

  protected $fillable = ['nombre', 'email', 'telefono', 'servicio', 'mensaje'];




    public function archivos()
    {
        return $this->hasMany(ArchivoSolicitud::class);
    }

}

