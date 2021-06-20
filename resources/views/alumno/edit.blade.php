@extends('adminlte::page')

@section('title', 'TutoLine')

@section('content_header')
    <h2>Editar Alumno</h2>
@stop

@section('content')
    <form action="/alumnos/{{$alumno->id_alumno}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Nombre</label>
            <input id="nombre" name="nombre" type="text" maxlength="50" class="form-control" value="{{$alumno->nombre_alumno}}" textindex="1" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Apellido</label>
            <input id="apellido" name="apellido" type="text" maxlength="50" class="form-control"  value="{{$alumno->apellido_alumno}}" textindex="2" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Fecha Nacimiento</label>
            <input id="fecha_nacimiento_alumno" name="fecha_nacimiento_alumno" type="date" class="form-control" value="{{$alumno->fecha_nacimiento_alumno}}" textindex="3" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Email</label>
            <input id="email" name="email" type="email" maxlength="50" class="form-control"  value="{{$alumno->email_alumno}}" textindex="3" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Telefono</label>
            <input id="telefono" name="telefono" type="number" maxlength="10" class="form-control"  value="{{$alumno->telefono_alumno}}" textindex="4" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Password</label>
            <input id="password" name="password" maxlength="25" type="password" class="form-control"  value="{{$alumno->password_alumno}}" textindex="4" required>
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
