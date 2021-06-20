@extends('adminlte::page')

@section('title', 'TutoLine')

@section('content_header')
    <h1><b>Alumnos</b></h1>
@stop

@section('content')
    <a href="alumnos/create" class="btn btn-secondary">Registrar Alumno</a>

    <table class="table table-dark table-striper mt-4" style="border-radius: .25rem;">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Telefono</th>
                <th scope="col">Correo</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alumnos as $alumno)
            <tr>
                <td>{{$alumno->nombre_alumno}} {{$alumno->apellido_alumno}}</td>
                <td>{{$alumno->telefono_alumno}}</td>
                <td>{{$alumno->email_alumno}}</td>
                <td>
                    <form action="{{ route('alumnos.destroy',$alumno->id_alumno )}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="/alumnos/{{$alumno->id_alumno}}/edit" class="btn btn-info">Editar</a>
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
