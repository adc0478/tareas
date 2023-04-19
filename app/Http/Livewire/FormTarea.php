<?php

namespace App\Http\Livewire;
use Exception;
use App\Models\tareas;
use App\Models\user_has_proyecto;
use App\Models\user_has_tarea;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class FormTarea extends Component
{
public $usuarios =[];
public $detalle;
public $user_id ="";
public $proyecto_id;
public $tarea_id;
public $tiempo_proyectado;
public $tiempo_inicio;
public $tiempo_fin;
public $id_relacion_tareaUsuario = "";
protected $rule_registro = [
    'tiempo_proyectado' => "required|numeric",
    'detalle' => "required",
    'proyecto_id' => "required",
    'user_id' => "required"
];
    protected $listeners = ['gestion_usuario'=>'set_idProyecto', 'editar_tarea'=>'levantar_tarea'];
    public function set_idProyecto($id){
        $this->proyecto_id = $id['proyecto_id'];
    }
    public function registrar_tarea(){
        $this->validate($this->rule_registro);
        DB::beginTransaction();
        try {
            $respuesta = tareas::registrar($this->detalle,$this->tiempo_proyectado,$this->proyecto_id,$this->tarea_id);
            $respuesta2 = user_has_tarea::registrar($this->user_id,$respuesta->id,$this->id_relacion_tareaUsuario);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
        if (!isset($respuesta->id)){
           $this->emit('mensaje_error',['mensaje'=>'Error al cargar la tarea','erro'=>$e]);
            return;
        }
        if (!isset($respuesta2->id)){
           $this->emit('mensaje_error',['mensaje'=>'Error al cargar el usuario de la tarea','error'=>$e]);
            return;
        }
           $this->emit('listar_tareas',$this->proyecto_id);
           $this->emit('mensaje_emitido','Se cargo la tarea');
           $this->limpiar_form_tarea();
    }
    public function limpiar_form_tarea(){
        $this->tarea_id ="";
        $this->detalle ="";
        $this->user_id ="";
        $this->tiempo_proyectado ="";
        $this->id_relacion_tareaUsuario = "";
    }
    public function quitar_tarea(){

    }
    public function levantar_tarea($datos){
        $modelo = new tareas();
        $respuesta = $modelo->obtener_una_tarea($datos['tarea_id']);
        $this->detalle = $respuesta[0]->descripcion;
        $this->user_id = $respuesta[0]->user_id;
        $this->tiempo_proyectado = $respuesta[0]->tiempo_proyectado;
        $this->tarea_id = $respuesta[0]->tarea_id;
        $this->id_relacion_tareaUsuario = $respuesta[0]->relacion_id;
    }

    public function render()
    {
        $this->usuarios = user_has_proyecto::obtener_todos_los_usuarios_proyecto($this->proyecto_id);
        return view('livewire.form-tarea');
    }
}
