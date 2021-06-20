@extends('adminlte::page')

@section('title', 'TutoLine')

@section('content_header')
    <h2>Editar Tutor</h2>
@stop

@section('content')
    <form action="/tutors/{{$tutor->id_tutor}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Nombre</label>
            <input id="nombre_tutor" name="nombre_tutor" type="text" maxlength="50" class="form-control" value="{{$tutor->nombre_tutor}}" textindex="1" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Apellido</label>
            <input id="apellido_tutor" name="apellido_tutor" type="text" maxlength="50" class="form-control"  value="{{$tutor->apellido_tutor}}" textindex="2" required> 
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Fecha Nacimiento</label>
            <input id="fecha_nacimiento_tutor" name="fecha_nacimiento_tutor" type="date" class="form-control"  value="{{$tutor->fecha_nacimiento_tutor}}" textindex="3" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Email</label>
            <input id="email_tutor" name="email_tutor" type="email" maxlength="50" class="form-control"  value="{{$tutor->email_tutor}}" textindex="4" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Password</label>
            <input id="password_tutor" name="password_tutor" type="password" maxlength="25" class="form-control"  value="{{$tutor->password_tutor}}" textindex="4" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Teléfono</label>
            <input id="telefono_tutor" name="telefono_tutor" type="number" maxlength="10" class="form-control"  value="{{$tutor->telefono_tutor}}" textindex="4">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Formación Académica</label>
            <input id="formacion_academica" name="formacion_academica" type="text" maxlength="2" class="form-control"  value="{{$tutor->formacion_academica}}" textindex="4" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Materia/Categoría</label>
            <select class="form-control" aria-label="Default select example"  id="categorias_id_categoria" name="categorias_id_categoria" value="{{$tutor->categorias_id_categoria}}">
                @foreach($categorias as $element)
                <option value="{{ $element->id_categoria }}" {!! (($tutor->categorias_id_categoria==$element->id_categoria) ? "selected=\"selected\"" : "") !!}>{{ $element->nombre_categoria }} ({{$element->dificultad}})</option>
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
