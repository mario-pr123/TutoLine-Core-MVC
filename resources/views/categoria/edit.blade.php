@extends('adminlte::page')

@section('title', 'TutoLine')

@section('content_header')
<h2>Editar Materia</h2>
@stop

@section('content')
<form action="/categorias/{{$categoria->id_categoria}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">Nombre</label>
        <input id="nombre_categoria" name="nombre_categoria" type="text" maxlength="50" class="form-control" value="{{$categoria->nombre_categoria}}" textindex="1" required>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Descripcion</label>
        <input id="descripcion_categoria" name="descripcion_categoria" type="text" maxlength="250" class="form-control" value="{{$categoria->descripcion_categoria}}" textindex="2" required>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Dificultad</label></br>
        <select class="form-control" aria-label="Default select example" id="dificultad" name="dificultad">
            <option selected>Seleccione</option>
            <option value="Principiante">Principiante</option>
            <option value="Medio">Medio</option>
            <option value="Avanzado">Avanzado</option>
        </select>
    </div>
    <a href="/categorias" class="btn btn-secondary" tabindex="5">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop