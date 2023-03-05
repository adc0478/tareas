<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Controllers\login;
class Registro extends Component
{
    public $nombre;
    public $mail;
    public $pass;
    public $pass2;
    public $salida = "";
    protected $rules = [
        'mail'=>'required|email',
        'nombre'=>'required',
        'pass'=>'required|same:pass2',
    ];
    public function registro_user(){
        $this->validate();
        $registro = new login();
        $retorno = $registro->registrar_usuario(['mail'=>$this->mail,'pass'=>$this->pass,'nombre'=>$this->nombre]);
        if (!$retorno){
            $this->salida = "Usuario ya registrado";
        }else{
            return redirect()->route('login');
        }

    }
    public function render()
    {
        return view('livewire.registro',['salida'=>$this->salida]);
    }
}
