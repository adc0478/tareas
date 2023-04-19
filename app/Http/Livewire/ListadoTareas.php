<?php

namespace App\Http\Livewire;
use Exception;
use App\Models\tareas;
use App\Models\tiempos;
use Livewire\Component;

class ListadoTareas extends Component
{
    public $lista = array();
    protected $listeners = ['listar_tareas'=>'listar'];

    public function contador($idTarea, $idProyecto){
        try {
            $modelo = new tiempos();
            $modelo->registrar($idTarea);
            $this->listar($idProyecto);
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function listar($id_proyecto){
        $lista = tareas::listar_tareas($id_proyecto);
        $lista_pendientes = tareas::listar_tareas_pendientes($id_proyecto);
        unset($this->lista);
        $this->lista = array();
        foreach ($lista as $fila) {
              $accu = $this->buscar_pendiente($lista_pendientes,$fila['id']);
              $this->lista[] = [
                'id'=>$fila['id'],
                'descripcion'=>$fila['descripcion'],
                'proyecto_id'=>$fila['proyecto_id'],
                'email'=>$fila['email'],
                'accu'=>$accu
              ] ;
        }
    }
    public function buscar_pendiente($pendientes,$id){
            foreach ($pendientes as $filaP){
                if ($filaP['id'] == $id) {
                   return  true;
                }
            }
            return false;
    }
    public function eliminar($id, $proyecto_id){
        $modelo = new tareas();
        try {
           $modelo->eliminar_tarea($id);
            $this->listar($proyecto_id);
            $this->emit('mensaje_emitido','Se elimino la tarea id ' .$id);
        } catch (Exception $e) {
            $this->emit('mensaje_error',['mensaje'=>'Error al eliminar la tarea id '.$id, 'error'=>$e]);
         }
    }
    public function editar($idTarea, $idproyecto){
         $this->emit('editar_tarea',['tarea_id'=>$idTarea,'proyecto_id'=>$idproyecto]);
    }
    public function render()
    {
        return view('livewire.listado-tareas');
    }
}
