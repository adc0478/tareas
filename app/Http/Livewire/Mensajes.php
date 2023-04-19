<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Mensajes extends Component
{
public $salida_mensaje;
public $salida_error;
public $error;
protected $listeners = ['mensaje_emitido'=>'cargar_mensaje','mensaje_error'=>'cargar_error'];

  public function cargar_error($dato){
        $this->salida_error = $dato['mensaje'];
        $this->error = $dato['error'];
    }
    public function cargar_mensaje($mensaje){
        $this->salida_mensaje = $mensaje;
    }
    public function quitar_salida_mje(){
        $this->salida_mensaje ="";
    }
    public function quitar_salida_error(){
        $this->salida_error ="";
    }
    public function render()
    {
        return view('livewire.mensajes');
    }
}
