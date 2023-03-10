<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_has_proyecto extends Model
{
    use HasFactory;
    protected $fillable =['user_id','proyecto_id','tipo_id'];
    public function registrar_relacion_usuario_proyecto_tipoU ($id_u = "",$id_proye = "", $id_tipoU = ""){
        if ($id_u != "" and $id_proye != "") {
            $salida = user_has_proyecto::UpdateOrCreate(['user_id' => $id_u,'proyecto_id' => $id_proye],['tipo_id' => $id_tipoU]);
            if (!empty($salida)){
                return 'OK';
            };
        }
        return 'NOK';
    }
    public function obtener_id_tipo_usuario ($proyecto_id,$usuario_id){
       $dato = user_has_proyecto::where('proyecto_id',$proyecto_id)
               -> where('user_id',$usuario_id)->get();
        if (isset($dato[0]->tipo_id)){
            return $dato[0]->tipo_id;
        }
        return 0;
    }
    static function obtener_todos_los_usuarios_proyecto($id_p){
        if ($id_p == "") {
            return [];
        }
        $datos = user_has_proyecto::select (
                    'user_has_proyectos.id as id',
                    'tipos_deUsuario.tipo as tipo',
                    'users.email as email',
                    'users.id as idU'
                )
                ->where('proyecto_id',$id_p)
                ->join('users','users.id',"=","user_has_proyectos.user_id")
                ->join('tipos_deUsuario','tipos_deUsuario.id','=','user_has_proyectos.tipo_id')
                ->join('proyectos','proyectos.id',"=",'user_has_proyectos.proyecto_id')->get();
         return $datos;
    }
}
