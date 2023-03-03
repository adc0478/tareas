<?php

namespace App\Http\Livewire;

use Illuminate\Support\facades\Auth;
use App\Models\proyectos;
use App\Models\user_has_proyecto;
use Livewire\Component;

class Proyecto extends Component


{
    public $id_proyecto;
    public $detalle;
    public $tipo;
    public $salida = "";
    protected $regla_proyecto = [
        'detalle'=>'required'
    ];
    public function limpiar_form_proyecto(){
        $this->detalle = "";
        $this->id_proyecto = "";
        $this->tipo = "";
    }
    public function listar_proyectos(){

    }
    public function agregar_usuario_a_proyecto($id_u, $id_proyecto,$id_tipo){
        $rel_usuario_proyecto =new user_has_proyecto();
        if ($rel_usuario_proyecto->registrar_relacion_usuario_proyecto_tipoU($id_u,$id_proyecto,$id_tipo) != "NOK"){
            return "ok";
        }
        return "nok";
    }
    public function registrar_proyecto(){
        $this->validate($this->regla_proyecto);
        $Objproyecto = new proyectos();
        $respuesta = $Objproyecto->registrar_proyecto($this->id_proyecto,$this->detalle);
        if ($respuesta != ""){
            if ($this->agregar_usuario_a_proyecto(Auth::id(),$respuesta->id,1) == "ok"){
                //modificar la salida
                 $this->salida  = "Se agrego el proyecto " . $this->detalle;
                //actualizar lista
                $this->listar_proyectos();
                //limpiar formulario
                $this->limpiar_form_proyecto();
                return;
            }
        }
        $this->salida = "Error de registro";
    }
    public function render()
    {
        return view('livewire.proyecto',['salida'=>$this->salida]);
    }
}
