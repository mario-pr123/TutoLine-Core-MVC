<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Objetivo;
use App\Models\Tarea;
use App\Models\Alumno;
use App\Models\Tutor;
use App\Models\Categoria;
use App\Models\AlumnoTutor;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $alumnos = DB::table('alumnos')->get()->count();
        $tutor = DB::table('tutors')->get()->count();
        $tutoria = DB::table('alumno_tutors')->get()->count();
        $materia = DB::table('categorias')->get()->count();
        $tarea = DB::table('tareas')->get()->count();
        $objetivo = DB::table('objetivos')->get()->count();
        return view('home.index')->with('alumnos', $alumnos)
        ->with('tutors', $tutor)
        ->with('tutorias', $tutoria)
        ->with('materias', $materia)
        ->with('tareas', $tarea)
        ->with('objetivos', $objetivo);
    }

}
