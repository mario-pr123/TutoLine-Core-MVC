@extends('adminlte::page')

@section('title', 'TutoLine')

@section('content_header')
<h2>Asignar Tutoría</h2>
@stop

@section('content')
<form action="/tutorias" method="POST">
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Tutor</label>
        <select class="form-control" aria-label="Default select example" id="tutor_id_tutor" name="tutor_id_tutor">
            @foreach($tutors as $element)
            <option value="{{ $element->id_tutor }}">{{ $element->nombre_tutor }} {{ $element->apellido_tutor }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Alumno</label>
        <select class="form-control" aria-label="Default select example" id="alumno_id_alumno" name="alumno_id_alumno">
            @foreach($alumnos as $elements)
            <option value="{{ $elements->id_alumno }}">{{ $elements->nombre_alumno }} {{ $elements->apellido_alumno }}</option>
            @endforeach
        </select>
    </div>
    @if(isset($error))
    <div class="mb-3">
        <span class="alert alert-danger">{{$error}}</span>
    </div>
    @endif
    <a href="/tutorias" class="btn btn-secondary" tabindex="5">Cancelar</a>
    <button type="submit" class="btn btn-dark" tabindex="4">Guardar</button>
</form>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop