@extends('adminlte::page')

@section('title', 'TutoLine')

@section('content_header')
<h1 class="text-center"><b>Dashboard</b></h1><br>
<div class="card w-100">
<div class="grid-container">
    <div class="grid-item">
        <div class="card text-white bg-dark mb-3" style="max-width: 25rem; min-height:10rem;">
            <div class="card-header"><b>Alumnos</b></div>
            <div class="card-body">
                <p class="card-al">{{$alumnos}}</p>
                <p class="card-text">Alumnos Registrados</p>
            </div>
        </div>
    </div>
    <div class="grid-item">
        <div class="card text-white bg-secondary mb-3" style="max-width: 25rem; min-height:10rem;">
            <div class="card-header"><b>Tutores</b></div>
            <div class="card-body">
                <h5 class="card-al">{{$tutors}}</h5>
                <p class="card-text">Tutores Registrados</p>
            </div>
        </div>
    </div>
    <div class="grid-item">
        <div class="card text-white bg-success mb-3" style="max-width: 25rem; min-height:10rem;">
            <div class="card-header"><b>Tutorías</b></div>
            <div class="card-body">
                <h5 class="card-al">{{$tutorias}}</h5>
                <p class="card-text">Tutorías Activas</p>
            </div>
        </div>
    </div>
    <div class="grid-item">
        <div class="card text-white bg-danger mb-3" style="max-width: 25rem; min-height:10rem;">
            <div class="card-header"><b>Materias</b></div>
            <div class="card-body">
                <h5 class="card-al">{{$materias}}</h5>
                <p class="card-text">Materias Creadas</p>
            </div>
        </div>
    </div>
    <div class="grid-item">

        <div class="card2" style="max-width: 25rem; min-height:10rem;">
            <div class="card-header"><b>Tareas</b></div>
            <div class="card-body">
                <h5 class="card-al">{{$tareas}}</h5>
                <p class="card-text">Tareas Enviadas</p>
            </div>
        </div>
    </div>
    <div class="grid-item">
        <div class="card text-white bg-info mb-3" style="max-width: 25rem; min-height:10rem;">
            <div class="card-header"><b>Objetivos</b></div>
            <div class="card-body">
                <h5 class="card-al">{{$objetivos}}</h5>
                <p class="card-text">Objetivos Asignados</p>
            </div>
        </div>
    </div>
</div>
</div>

@stop

@section('content')

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<style>
    .grid-container {
        display: grid;
        grid-template-columns: auto auto auto;
    }

    .grid-item {
        padding: 6px;
        font-size: 15px;
    
    }
    .card2{
        background-color: #ffc107;
        color:white;
        border-radius: .25rem;
    }
    .card-al{
        font-size: 25px;
        margin-bottom: 0rem;
    }

</style>
@stop

@section('js')
@stop