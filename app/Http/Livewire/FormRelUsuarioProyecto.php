<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\user_has_proyecto;
use Livewire\Component;

class FormRelUsuarioProyecto extends Component
{
    public $id_proyecto;
    public $usuarios = [];
    public $usuarios_activos = [];
    protected $listeners = ['gestion_usuario'=>'set_idProyecto'];
    public function set_idProyecto($id){
       $this->id_proyecto = $id;
    }
    public function set_usuarios_disponibles(){
       $this->usuarios = User::listar_todosLos_usuarios();
       $this->usuarios_activos = user_has_proyecto::obtener_todos_los_usuarios_proyecto($this->id_proyecto);
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
