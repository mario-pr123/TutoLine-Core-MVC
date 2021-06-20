@extends('adminlte::page')

@section('title', 'TutoLine')

@section('content_header')
<h2>Calificar Tarea</h2>
@stop

@section('content')
<form action="/tareas/{{$tarea->id_tarea}}/update2" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">Calificación</label>
        <input id="calificacion_tarea" name="calificacion_tarea" type="number" step="any" class="form-control" value="{{$tarea->calificacion_tarea}}" textindex="4" required>
    </div>
    <a href="/tareas" class="btn btn-secondary" tabindex="5">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop