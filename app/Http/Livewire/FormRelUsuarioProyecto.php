<?php

namespace App\Http\Livewire;
use Exception;
use App\Models\User;
use App\Models\user_has_proyecto;
use Livewire\Component;

class FormRelUsuarioProyecto extends Component
{
    public $id_proyecto;
    public $usuarios = [];
    public $usuarios_activos = [];
    public $info = "";
    protected $listeners = ['gestion_usuario'=>'set_idProyecto'];
    public function set_idProyecto($id){
       $this->id_proyecto = $id;
    }
    public function set_usuarios_disponibles(){
       $this->usuarios = User::listar_todosLos_usuarios();
       $this->usuarios_activos = user_has_proyecto::obtener_todos_los_usuarios_proyecto($this->id_proyecto);
    }
    public function ingresar_usuario($id_user){
        //ingresar o modificar el par usuario_id - proyecto_id

        $respuesta = user_has_proyecto::registrar_relacion_usuario_proyecto_tipoU($id_user,$this->id_proyecto['proyecto_id']);
         if ($respuesta != 'OK') {
            $this->info = "No se pudo asignar el usuario";
         }

    }
    public function quitar_usuario($id){
        try {
            user_has_proyecto::quitar_relacion_usuario_proyecto_tipoU($id);
            $this->emit('mensaje_emitido','Usuario desvinculado');
        } catch (Exception $e) {
            $this->emit('mensaje_error',['mensaje'=>'No fue posible eliminar el usuario, ya que tiene asignada una tarea','error'=>'']);
        }
    }

    public function render()
    {

        $this->set_usuarios_disponibles();
        return view('livewire.form-rel-usuario-proyecto',['lista_usuario'=>$this->usuarios,'usuarios_activos'=>$this->usuarios_activos,'info'=>$this->info]);
    }
}
