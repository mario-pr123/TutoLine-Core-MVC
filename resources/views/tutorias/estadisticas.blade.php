@extends('adminlte::page')

@section('title', 'TutoLine')

@section('content_header')
<h1><b>Desempeño de los Alumnos</b></h1>
@stop

@section('content')
<h5>Seleccione un tutor</h5>
<form action="/estadisticas/veralumno" method="POST">
@csrf
<div>
  <select class="form-control w-25 " aria-label="Default select example" id="tutor_id_tutor" name="tutor_id_tutor">
    @foreach($tutor as $element)
    @if(isset($tutorS) && $tutorS->id_tutor==$element->id_tutor)
    <option value="{{ $element->id_tutor }}" selected>{{ $element->nombre_tutor }} {{ $element->apellido_tutor }}</option>
    @else
    <option value="{{ $element->id_tutor }}">{{ $element->nombre_tutor }} {{ $element->apellido_tutor }}</option>
    @endif
    @endforeach
  </select>
  <br> 
  <button type="submit" class="btn btn-secondary" tabindex="4">Ver Alumnos</button>
</div>
</form>


<table class="table table-dark table-striper mt-4">
  <thead>
    <tr>
      <th scope="col">Alumnos</th>
      <th scope="col">Deberes</th>
      <th scope="col">Objetivos</th>
      <th scope="col">Extra</th>
      <th scope="col">Total</th>
      <th scope="col">Porcentaje</th>
      <th scope="col">Desempeño</th>
    </tr>
  </thead>
  <tbody>
  @if(isset($combo))
  @foreach($combo as $alumno)
    <tr>
      <td>{{$alumno->nombre_alumno}} {{$alumno->apellido_alumno}}</td>
      <td>{{$alumno->nota_total}}</td>
      <td>{{$alumno->puntaje_total}}</td>
      <td>{{$alumno->extra_total}}</td>
      <td>{{$alumno->total}}</td>
      <td>{{$alumno->porcentaje}}%</td>
      <td>{{$alumno->porcentaje==100?'Excelencia Academica':$alumno->porcentaje>70?'Sobresaliente':'Bajo del Promedio'}}</td> 
    </tr>
    @endforeach
    @endif
  </tbody>
</table>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop