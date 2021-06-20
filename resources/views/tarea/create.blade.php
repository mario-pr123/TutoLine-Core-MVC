@extends('adminlte::page')

@section('title', 'TutoLine')

@section('content_header')
<h2>Nueva Tarea</h2>
@stop

@section('content')
<script src="{{asset('js/tarea.js')}}"></script>
<form action="/tareas" method="POST">
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Nombre</label>
        <input id="nombre_tarea" name="nombre_tarea" type="text" maxlength="50" class="form-control" textindex="1" required>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Descripcion</label>
        <input id="descripcion_tarea" name="descripcion_tarea" type="text" class="form-control" textindex="2" required>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Fecha entrega (Mínimo 6 días desde la fecha actual)</label>
        <input id="fecha_entrega" name="fecha_entrega" type="date" class="form-control" textindex="4" required>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Comentarios</label>
        <input id="comentarios_tarea" name="comentarios_tarea" type="text" class="form-control" textindex="4" required>
    </div>
    <div class="mb-3">    
        <label for="" class="form-label">Tutor</label>
        <select class="form-control" aria-label="Default select example" id="tutor_id_tutor" name="tutor_id_tutor" required onchange="selectTutor({{count($tutors)}})">
            <option value="" selected disabled hidden>
                Seleccione...
            </option>
            @foreach($tutors as $element)
            <option value="{{ $element->id_tutor }}">{{ $element->nombre_tutor }} {{ $element->apellido_tutor }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
    <label for="" class="form-label">Alumno</label>
            <select class="form-control" aria-label="Default select example" id="alumno_id_alumno" name="alumno_id_alumno">
            <option value="-1" selected disabled hidden>
                Seleccione...
            </option>
                @foreach($tutors as $elemento)
                @foreach($elemento->alumnos as $alumno)               
                    <option id="{{$elemento->id_tutor}}-{{$alumno->id_alumno}}" class="option1" value="{{$alumno->id_alumno}}">
                        {{$alumno->nombre_alumno}}  {{ $alumno->apellido_alumno }}
                    </option>
            
                @endforeach
                @endforeach
                </select>
    </div>
    @if(isset($error))
    <div class="mb-3">
        <span class="alert alert-danger">{{$error}}</span>
    </div>
    @endif
    <a href="/tareas" class="btn btn-secondary" tabindex="5">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<style>
    .option1{
        display: none;
    }
</style>
@stop

@section('js')
@stop