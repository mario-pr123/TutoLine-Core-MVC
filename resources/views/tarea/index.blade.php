@extends('adminlte::page')

@section('title', 'TutoLine')

@section('content_header')
<h1><b>Tareas</b></h1>
@stop

@section('content')
<a href="tareas/create" class="btn btn-secondary">Enviar Tarea</a>

<table class="table table-dark table-striper mt-4">
    <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Fecha entrega</th>
            <th scope="col">Trabajo Entregado</th>
            <th scope="col">Calificación</th>
            <th scope="col">Extra</th>
            <th scope="col">Alumno</th>
            <th scope="col">Tutor</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tareas as $elemento)
        <tr>
            <td>{{$elemento->nombre_tarea}}</td>
            <td>{{$elemento->descripcion_tarea}}</td>
            <td>{{$elemento->fecha_entrega}}</td>
            <td>{{$elemento->entregable_tarea}}</td>
            <td>{{isset($elemento->calificacion_tarea)?$elemento->calificacion_tarea:0}}</td>
            <td>{{isset($elemento->puntaje_extra)?$elemento->puntaje_extra:0}}</td>
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
                <form action="{{ route('tareas.destroy',$elemento->id_tarea )}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="/tareas/{{$elemento->id_tarea}}/edit" class="btn btn-info">Editar</a>
                    <a href="/tareas/{{$elemento->id_tarea}}/edit2" class="btn btn-secondary">Calificar</a>
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