<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tiempos extends Model
{
    protected $fillable = ['accu'];
    public function registrar($idTarea){
       $registro = [];
       $modelo = new tiempos();
       //buscar si hay un registro que cumpla con idTarea y accu=""
        $registro = $modelo->where('tarea_id',$idTarea)
                           ->where('accu',0)->get();
        if (isset($registro[0]->id)) {
            $valor = $this->calcular($registro);
            $modelo->UpdateOrCreate(['id'=>$registro[0]->id],['accu'=>$valor]);
        }else{
            $modelo->tarea_id = $idTarea;
            $modelo->inicio = new DateTime();
            $modelo->save();
        }
    }
    public function calcular($registro){
       $ahora = new DateTime();
       $inicio = new datetime($registro[0]->inicio);
       $respuesta = date_diff($ahora,$inicio);
       return ($respuesta->days * 24 * 60) + ($respuesta->h * 60) + $respuesta->i;
    }
    use HasFactory;
}
