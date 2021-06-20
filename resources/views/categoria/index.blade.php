@extends('adminlte::page')

@section('title', 'TutoLine')

@section('content_header')
    <h1><b>Materias/Categorías</b></h1>
@stop

@section('content')
    <a href="categorias/create" class="btn btn-secondary">Crear</a>

    <table class="table table-dark table-striper mt-4">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Dificultad</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $elemento)
            <tr>
                <td>{{$elemento->nombre_categoria}}</td>
                <td>{{$elemento->descripcion_categoria}}</td>
                <td>{{$elemento->dificultad}}</td>
                <td>
                    <form action="{{ route('categorias.destroy',$elemento->id_categoria )}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="/categorias/{{$elemento->id_categoria}}/edit" class="btn btn-info">Editar</a>
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
