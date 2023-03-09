<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class FormRelUsuarioProyecto extends Component
{
    public $id_proyecto;
    public $usuarios = [];
    public $usuarios_activos = [];
    protect $listeners = ['gestion_usuario'=>'set_idProyecto'];
    public function set_idProyecto($id){
       $this->id_proyecto = $id;
    }
    public function set_usuarios_disponibles(){
       $this->usuarios = User::listar_todosLos_usuarios();
    }
    public function ingresar_usuario($id){
        //ingresar o modificar el par usuario_id - proyecto_id

    }
    public function quitar_usuario($id){

    }
    public function render()
    {
        $this->set_usuarios_disponibles();
        return view('livewire.form-rel-usuario-proyecto',['lista_usuario'=>$this->usuarios,'usuarios_activos'=>$this->usuarios_activos]);
    }
}
