<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_has_tarea extends Model
{
protected $fillable =[
  'tarea_user_id',
  'tarea_id'
];
    static function registrar($id_user,$id_tarea,$id = ""){
        $respuesta = user_has_tarea::UpdateOrCreate(['id'=>$id],['tarea_user_id'=>$id_user,'tarea_id'=>$id_tarea]);
        return $respuesta;
    }
    use HasFactory;
}
