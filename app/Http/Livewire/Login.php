<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Controllers\login as log;
class Login extends Component
{
    public $mail;
    public $pass;
    public $salida = "";
    protected $rules = [
        'mail'=>'required|email',
        'pass'=>'required'
    ];
    public function logear (){
        $this->validate();
        $control_login = new log();
        $retorno = $control_login->ingresar_login(['mail'=>$this->mail,'pass'=>$this->pass]);
        if ($retorno){
           return redirect()->route('home');
        }
        $this->salida = "Error de usuario o password";
    }
    public function render()
    {
        return view('livewire.login',['salida'=>$this->salida]);
    }
}
