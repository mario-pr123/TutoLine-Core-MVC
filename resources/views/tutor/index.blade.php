@extends('adminlte::page')

@section('title', 'TutoLine')

@section('content_header')
<h1><b>Tutores</b></h1>
@stop

@section('content')
<a href="tutors/create" class="btn btn-secondary">Registrar Tutor</a>

<table class="table table-dark table-striper mt-4">
    <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Email</th>
            <th scope="col">Telefono</th>
            <th scope="col">Materia</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tutors as $elemento)
        <tr>
            <td>{{$elemento->nombre_tutor}} {{$elemento->apellido_tutor}}</td>
            <td>{{$elemento->email_tutor}}</td>
            <td>{{$elemento->telefono_tutor}}</td>
            <td>
                @foreach ($categorias as $categoria)
                @if($elemento->categorias_id_categoria == $categoria->id_categoria)
                {{$categoria->nombre_categoria}}
                @endif
                @endforeach
                @foreach ($categorias as $categoria)
                @if($elemento->categorias_id_categoria == $categoria->id_categoria)
                {{$categoria->dificultad}}
                @endif
                @endforeach
            </td>
            <td>
                <form action="{{ route('tutors.destroy',$elemento->id_tutor )}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="/tutors/{{$elemento->id_tutor}}/edit" class="btn btn-info">Editar</a>
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