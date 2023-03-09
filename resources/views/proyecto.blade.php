@extends('template.planilla')
@section('titulo','Proyectos')
@section('contenido')
  @livewire('proyecto')
  @livewire('form-rel-usuario-proyecto')
@endsection
