<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proyectos extends Model
{
    use HasFactory;
    protected $fillable = ['detalle'];
    public function registrar_proyecto($id = "", $detalle = ""){

        $respuesta = proyectos::UpdateOrCreate(['id'=>$id],['detalle'=>$detalle]);
        return $respuesta;
    }
}
