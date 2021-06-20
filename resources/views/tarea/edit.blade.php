@extends('adminlte::page')

@section('title', 'TutoLine')

@section('content_header')
<h2>Editar Tarea</h2>
@stop

@section('content')
<form action="/tareas/{{$tarea->id_tarea}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">Nombre</label>
        <input id="nombre_tarea" name="nombre_tarea" type="text" maxlength="50" class="form-control" value="{{$tarea->nombre_tarea}}" textindex="1" required>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Descripcion</label>
        <input id="descripcion_tarea" name="descripcion_tarea" type="text" class="form-control" value="{{$tarea->descripcion_tarea}}" textindex="2" required>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Fecha entrega</label>
        <input id="fecha_entrega" name="fecha_entrega" type="date" class="form-control" value="{{$tarea->fecha_entrega}}" textindex="4" required>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Fecha de entrega del trabajo</label>
        <input id="fecha_tarea_entregada" name="fecha_tarea_entregada" type="date" class="form-control" value="{{$tarea->fecha_tarea_entregada}}" textindex="4" required>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Comentarios</label>
        <input id="comentarios_tarea" name="comentarios_tarea" type="text" class="form-control" value="{{$tarea->comentarios_tarea}}" textindex="4" required>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Entrega</label>
        <input id="entregable_tarea" name="entregable_tarea" type="text" class="form-control" value="{{$tarea->entregable_tarea}}" textindex="4" required>
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