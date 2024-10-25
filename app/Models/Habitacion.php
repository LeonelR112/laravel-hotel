<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    protected $primaryKey = 'id_hab';
    protected $table = "habitaciones";
    public $timestamps = false; // Desactiva los timestamps
}
