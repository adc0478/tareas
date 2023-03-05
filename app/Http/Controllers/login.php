<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class login extends Controller
{
    public function ver_form_login(){
        if (Auth::check()){
            return redirect()->route('home');
        }
        return view('login');
    }

    public function ingresar_login($request){
        if (Auth::attempt(['email'=>$request['mail'],'password'=>$request['pass']],true)){
            return true;
        }else{
            return false;
        }

    }

    public function ver_form_registro(){
        return view('registro');
    }
    public function registrar_usuario($request){
        //verificar si el usuario ya esta dado de alta
        if  (isset(User::consultar_usuario($request['mail'])[0]->id)){
            return false;
        }
        //registrar nuevo usuario y redirigir al home
        $model = new User();
        $model->email = $request['mail'];
        $model->password = hash::make($request['pass']);
        $model->name = $request['nombre'];
        $model->save();
        return true;
    }
    public function cerrar_sesion(request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect()->route('login');
    }
}
