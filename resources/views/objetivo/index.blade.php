@extends('adminlte::page')

@section('title', 'TutoLine')

@section('content_header')
<h1><b>Objetivos</b></h1>
@stop

@section('content')
<a href="objetivos/create" class="btn btn-secondary">Asignar Objetivo</a>

<table class="table table-dark table-striper mt-4">
    <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Estado</th>
            <th scope="col">Puntaje</th>
            <th scope="col">Alumno</th>
            <th scope="col">Tutor</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($objetivos as $elemento)
        <tr>
            <td>{{$elemento->nombre_objetivo}}</td>
            <td>{{$elemento->descripcion_objetivo}}</td>
            <td>{{$elemento->estado_objetivo}}</td>
            <td>{{isset($elemento->puntaje)?$elemento->puntaje:0}}</td>
            <td>
                @foreach ($alumnos as $alumno)
                @if($elemento->alumno_id_alumno == $alumno->id_alumno)
                {{$alumno->nombre_alumno}} {{$alumno->apellido_alumno}}
                @endif
                @endforeach
            </td>
            <td>
                @foreach ($tutors as $tutor)
                @if($elemento->tutor_id_tutor == $tutor->id_tutor)
                {{$tutor->nombre_tutor}} {{$tutor->apellido_tutor}}
                @endif
                @endforeach
            </td>
            <td>
                <form action="{{ route('objetivos.destroy',$elemento->id_objetivo )}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="/objetivos/{{$elemento->id_objetivo}}/edit" class="btn btn-info">Editar</a>
                    <button type="submit" class="btn btn-danger">Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop