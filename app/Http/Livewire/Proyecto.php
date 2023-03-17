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
    public $salida_accion = "";
    public $lista_proyectos = [];
    protected $regla_proyecto = [
        'detalle'=>'required'
    ];
    public function limpiar_form_proyecto(){
        $this->detalle = "";
        $this->id_proyecto = "";
        $this->tipo = "";
    }
    public function listar_proyectos(){
        $modelo_datos = new proyectos();
        $this->lista_proyectos = $modelo_datos->consultar_proyectos_por_usuario(Auth::id());
    }
    public function agregar_usuario_a_proyecto($id_u, $id_proyecto,$id_tipo){
        $rel_usuario_proyecto =new user_has_proyecto();
        if ($rel_usuario_proyecto->registrar_relacion_usuario_proyecto_tipoU($id_u,$id_proyecto,$id_tipo) != "NOK"){
            return "ok";
        }
        return "nok";
    }
    public function quitar_salida_accion(){
        $this->salida_accion ="";
    }
    public function editar($proyecto_id,$detalle){
        $this->detalle = $detalle;
        $this->id_proyecto = $proyecto_id;
        $this->emit('gestion_usuario',['proyecto_id'=>$proyecto_id]);
    }
    public function eliminar ($proyecto_id, $detalle){
        $obj = new proyectos();
        $salida = $obj->quitar_proyecto($proyecto_id,Auth::id());
        if ($salida != "ok") {
            $this->salida_accion = "No es posible eliminar el objeto";
            return;
        }
        $this->salida_accion = "Se elimino el proyecto " . $detalle;
    }
    public function registrar_proyecto(){
        $this->validate($this->regla_proyecto);
        $Objproyecto = new proyectos();
        $respuesta = $Objproyecto->registrar_proyecto($this->id_proyecto,$this->detalle);
        if ($respuesta != ""){
            if ($this->agregar_usuario_a_proyecto(Auth::id(),$respuesta->id,1) == "ok"){
                //modificar la salida
                 $this->salida  = "Se agrego el proyecto " . $this->detalle;
                //limpiar formulario
                $this->limpiar_form_proyecto();
               $this->emit('gestion_usuario',['proyecto_id'=>'']);
                return;
            }
        }
        $this->salida = "Error de registro";
    }
    public function render()

    {

        $this->listar_proyectos();
        return view('livewire.proyecto',['salida'=>$this->salida,'lista_proyectos'=>$this->lista_proyectos,'salida_accion'=>$this->salida_accion]);
    }
}
