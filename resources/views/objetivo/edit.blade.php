@extends('adminlte::page')

@section('title', 'TutoLine')

@section('content_header')
<h2>Editar Objetivo</h2>
@stop

@section('content')
<form action="/objetivos/{{$objetivo->id_objetivo}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">Nombre</label>
        <input id="nombre_objetivo" name="nombre_objetivo" type="text" maxlength="50" class="form-control" value="{{$objetivo->nombre_objetivo}}" textindex="1" required>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Descripcion</label>
        <input id="descripcion_objetivo" name="descripcion_objetivo" type="text" class="form-control" value="{{$objetivo->descripcion_objetivo}}" textindex="2" required>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Estado</label>
        <select id="estado_objetivo" name="estado_objetivo" class="form-control" aria-label="Default select example">
            <option value="0">
                Por completar   
            </option>
            <option value="20">
                Completado  
            </option>
        </select>
    </div>
    <a href="/objetivos" class="btn btn-secondary" tabindex="5">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop