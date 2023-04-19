@extends('template.planilla')
@section('titulo','Proyectos')
@section('contenido')
  @livewire('mensajes')
  @livewire('proyecto')
  <div class="menu_izq">
    @livewire('form-rel-usuario-proyecto')
  </div>
  <div class="menu_right">
      @livewire('form-tarea')
  </div>
  <div class="lista_tarea">
      @livewire('listado-tareas')
  </div>
@endsection
