<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tareas extends Model
{
    protected $fillable = ['descripcion','tiempo_proyectado','proyecto_id'];
    static function registrar($detalle,$tiempo,$proyecto_id,$id=""){
        $respuesta = tareas::UpdateOrCreate(['id'=>$id],['descripcion'=>$detalle,'tiempo_proyectado'=>$tiempo,'proyecto_id'=>$proyecto_id]);
        return $respuesta;
    }
    static function listar_tareas ($proyecto_id){
        $respuesta = tareas::select(
            'tareas.descripcion As descripcion',
            'tareas.id As id',
            'proyecto_id As proyecto_id',
            'tarea_user_id',
            'email')
           ->where('proyecto_id',$proyecto_id)
           ->LeftJoin('user_has_tareas','user_has_tareas.tarea_id','tareas.id')
           ->LeftJoin('users','users.id','user_has_tareas.tarea_user_id')
           ->get();
        return $respuesta;
    }
    static function listar_tareas_pendientes ($proyecto_id){
        $respuesta = tareas::select(
            'tareas.descripcion As descripcion',
            'tareas.id As id',
            'proyecto_id As proyecto_id',
            'tiempos.accu AS accu')
           ->where('proyecto_id',$proyecto_id)
           ->Leftjoin ('tiempos','tiempos.tarea_id','tareas.id')
           ->where('tiempos.accu','0')
           ->get();
        return $respuesta;
    }
    public function obtener_una_tarea($tarea_id){
        $respuesta = tareas::select ('tareas.id AS tarea_id',
                            'tareas.descripcion As descripcion',
                            'tareas.tiempo_proyectado As tiempo_proyectado',
                            'user_has_tareas.id As relacion_id',
                            'user_has_tareas.tarea_user_id As user_id')
                            ->where('tareas.id',$tarea_id)
                            ->join ('user_has_tareas','user_has_tareas.tarea_id','tareas.id')
                            ->get();
        return $respuesta;
    }
    public function eliminar_tarea($id){
        $modelo = new tareas();
        $modelo->where('id',$id)->delete();
    }
    use HasFactory;
}
