@extends('adminlte::page')

@section('title', 'TutoLine')

@section('content_header')
    <h2>Nuevo Alumno</h2>
@stop

@section('content')
    <form action="/alumnos" method="POST">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Nombre</label>
            <input id="nombre" name="nombre" type="text"  maxlength="50" class="form-control" textindex="1" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Apellido</label>
            <input id="apellido" name="apellido" type="text"  maxlength="50" class="form-control" textindex="2" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Fecha Nacimiento</label>
            <input id="fecha_nacimiento_alumno" name="fecha_nacimiento_alumno" type="date" class="form-control" textindex="3" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Email</label>
            <input id="email" name="email" type="text" maxlength="50" class="form-control" textindex="3" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Telefono</label>
            <input id="telefono" name="telefono" type="number" class="form-control" textindex="4" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Password</label>
            <input id="password" name="password" type="password" maxlength="25" class="form-control" textindex="4" required>
        </div>
        <a href="/alumnos" class="btn btn-secondary" tabindex="5">Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
