<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';

    protected $fillable = [
        'nombre', 'apellido', 'email', 'telefono', 'rol', 'fecha_registro',
    ];
    protected $primaryKey = 'id_usuario';
     // Desactivar los timestamps
     public $timestamps = false;
}
