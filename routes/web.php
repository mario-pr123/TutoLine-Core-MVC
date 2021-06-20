<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
//    return view('welcome');
});

Route::resource('alumnos','App\Http\Controllers\AlumnoController');
Route::resource('categorias','App\Http\Controllers\CategoriaController');
Route::resource('tutors','App\Http\Controllers\TutorController');
Route::resource('objetivos','App\Http\Controllers\ObjetivoController');
Route::get('tareas/{id_tarea}/edit2','App\Http\Controllers\TareaController@edit2');
Route::put('tareas/{id_tarea}/update2','App\Http\Controllers\TareaController@update2')->name('users.update2');
Route::resource('tareas','App\Http\Controllers\TareaController');
Route::resource('tutorias','App\Http\Controllers\TutoriasController');
Route::resource('home','App\Http\Controllers\HomeController');
Route::get('/estadisticas','App\Http\Controllers\TutoriasController@estadisticas');
Route::post('/estadisticas/veralumno','App\Http\Controllers\TutoriasController@verAlumnos');
Route::get('/peores','App\Http\Controllers\TutoriasController@peores');
Route::post('/peores/verPeoresAlumnos','App\Http\Controllers\TutoriasController@verPeoresAlumnos');


