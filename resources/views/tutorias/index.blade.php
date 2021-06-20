@extends('adminlte::page')

@section('title', 'TutoLine')

@section('content_header')
<h1><b>Tutorías</b></h1>
@stop

@section('content')
<a href="tutorias/create" class="btn btn-secondary">Contratar Tutor</a>

<table class="table table-dark table-striper mt-4">
    <thead>
        <tr>
            <th scope="col">Tutor</th>
            <th scope="col">Alumno</th>
        </tr>
    </thead>
    <tbody>
        @foreach($alumno_tutor as $tutoria)
        <tr>
            <td>
                {{$tutoria->namesTutor}}
            </td>
            <td>
                {{$tutoria->names}}
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