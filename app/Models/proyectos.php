<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\user_has_proyecto;

class proyectos extends Model
{
    use HasFactory;
    protected $fillable = ['detalle'];
    public function registrar_proyecto($id = "", $detalle = ""){

        $respuesta = proyectos::UpdateOrCreate(['id'=>$id],['detalle'=>$detalle]);
        return $respuesta;
    }
    public function consultar_proyectos_por_usuario($id){
        $datos = user_has_proyecto::where('user_id',$id)
            ->join('proyectos','proyectos.id','=','user_has_proyectos.proyecto_id')
            ->get();
        return $datos;
    }
    public function quitar_proyecto($id_proyecto,$id_usuario){
        $obj = new user_has_proyecto();
        if ($obj->obtener_id_tipo_usuario($id_proyecto,$id_usuario) == 1){
            proyectos::destroy($id_proyecto);
            return "ok";
        }
        return "nok";
    }
}
