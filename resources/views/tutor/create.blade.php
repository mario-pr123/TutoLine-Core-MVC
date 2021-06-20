@extends('adminlte::page')

@section('title', 'TutoLine')

@section('content_header')
    <h2>Nuevo Tutor</h2>
@stop

@section('content')
    <form action="/tutors" method="POST">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Nombre</label>
            <input id="nombre_tutor" name="nombre_tutor" type="text" maxlength="50" class="form-control" textindex="1" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Apellido</label>
            <input id="apellido_tutor" name="apellido_tutor" type="text" maxlength="50" class="form-control" textindex="2" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Fecha Nacimiento</label>
            <input id="fecha_nacimiento_tutor" name="fecha_nacimiento_tutor" type="date" class="form-control" textindex="3" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Email</label>
            <input id="email_tutor" name="email_tutor" type="email" maxlength="50" class="form-control" textindex="4" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Password</label>
            <input id="password_tutor" name="password_tutor" type="password" maxlength="25" class="form-control" textindex="4" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Teléfono</label>
            <input id="telefono_tutor" name="telefono_tutor" type="number"  maxlength="10" class="form-control" textindex="4" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Formación Académica</label>
            <input id="formacion_academica" name="formacion_academica" type="text"  class="form-control" textindex="4" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Materia/Categoría</label></br>
            <select class="form-control mb-3" aria-label=".form-control-lg example" id="categorias_id_categoria" name="categorias_id_categoria"> 
                @foreach($categorias as $element)
                <option value="{{ $element->id_categoria }}">{{ $element->nombre_categoria }} ({{$element->dificultad}})</option>
                @endforeach
            </select>
        </div>
        <a href="/tutors" class="btn btn-secondary" tabindex="5">Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
