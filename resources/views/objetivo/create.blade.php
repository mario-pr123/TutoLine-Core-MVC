@extends('adminlte::page')

@section('title', 'TutoLine')

@section('content_header')
<h2>Nuevo Objetivo</h2>
@stop

@section('content')
<form action="/objetivos" method="POST">
<script src="{{asset('js/tarea.js')}}"></script>
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Nombre</label>
        <input id="nombre_objetivo" name="nombre_objetivo" type="text" maxlength="50" class="form-control" textindex="1" required>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Descripcion</label>
        <input id="descripcion_objetivo" name="descripcion_objetivo" type="text" class="form-control" textindex="2" required>
    </div>
    <div class="mb-3" hidden>
        <label for="" class="form-label">Estado</label>
        <input id="estado_objetivo" name="estado_objetivo" type="text" class="form-control" textindex="3" value="Por completar" required>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Tutor</label>
        <select class="form-control" aria-label="Default select example" id="tutor_id_tutor" name="tutor_id_tutor" onchange="selectTutor({{count($tutors)}})">
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
                        {{$alumno->nombre_alumno}} {{ $alumno->apellido_alumno }}
                    </option>
            
                @endforeach
                @endforeach
                </select>
    </div>
    <a href="/objetivos" class="btn btn-secondary" tabindex="5">Cancelar</a>
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