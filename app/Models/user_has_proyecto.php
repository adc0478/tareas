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
}