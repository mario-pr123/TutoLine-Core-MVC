<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlumnoTutor;
use App\Models\Alumno;
use App\Models\Objetivo;
use App\Models\Tutor;
use Illuminate\Support\Facades\DB;

class TutoriasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $elementos = AlumnoTutor::join('tutors', 'tutors.id_tutor', 'alumno_tutors.tutor_id_tutor')
            ->join('alumnos', 'alumnos.id_alumno', 'alumno_tutors.alumno_id_alumno')
            ->select([
                DB::raw("concat(tutors.nombre_tutor,' ',tutors.apellido_tutor) as namesTutor"), //SQL
                DB::raw('group_concat(concat(alumnos.nombre_alumno," ",alumnos.apellido_alumno) SEPARATOR ", ") as names')
            ])->groupBy('tutors.id_tutor')
            ->get();
        return view('tutorias.index')->with('alumno_tutor', $elementos);
    }

    public function create()
    {
        $combo = Alumno::all();
        $combo1 = Tutor::all();
        $elementos = AlumnoTutor::all();
        return view('tutorias.create')->with('alumnos', $combo)->with('tutors', $combo1)->with('tutorias', $elementos)->with('error', null);
    }

    public function store(Request $request)
    {

        $elementos = AlumnoTutor::all();
        $elemento = new AlumnoTutor();
        $contador = $elemento->where('tutor_id_tutor', $request->get('tutor_id_tutor'))
            ->where('alumno_id_alumno', $request->get('alumno_id_alumno'))->count();
        if ($contador > 0) {
            $combo = Alumno::all();
            $combo1 = Tutor::all();
            return view('tutorias.create')->with('alumnos', $combo)->with('tutors', $combo1)->with('tutorias', $elementos)
                ->with('error', "Tutoria ya asignada");
        }
        $elemento->alumno_id_alumno = $request->get('alumno_id_alumno');
        $elemento->tutor_id_tutor = $request->get('tutor_id_tutor');
        $elemento->save();
        return redirect('/tutorias')->with('tutorias', $elementos);
    }
    public function show($id)
    {
        //
    }
    public function destroy($id)
    {
        $elemento = AlumnoTutor::find($id);
        $elemento->delete();
        return redirect('/tutorias');
    }
    public function estadisticas()
    {
        $tutor = Tutor::all();
        return view('tutorias.estadisticas')->with('tutor', $tutor)->with('tutorS', null)
            ->with('combo', null);
    }
    public function peores()
    {
        $tutor = Tutor::all();
        return view('tutorias.peores')->with('tutor', $tutor)->with('tutorS', null)
            ->with('combo', null);
    }
    public function verAlumnos(Request $request)
    {
        $tutor = Tutor::all();
        $tutorSelected = $tutor->where('id_tutor', $request->tutor_id_tutor)->first();
        $combo = new AlumnoTutor();
        $combo = $combo->where('alumno_tutors.tutor_id_tutor', $request->tutor_id_tutor)
            ->join('alumnos', 'alumnos.id_alumno', 'alumno_tutors.alumno_id_alumno')
            ->leftJoin('tareas', function ($join) { //union de dos tablas con dos columnas
                $join->on('tareas.alumno_id_alumno', '=', 'alumno_tutors.alumno_id_alumno');
                $join->on('tareas.tutor_id_tutor', '=', 'alumno_tutors.tutor_id_tutor');
            })
            ->groupBy('alumno_tutors.alumno_id_alumno')
            ->select([
                'alumnos.nombre_alumno', 'alumnos.apellido_alumno', DB::raw("sum(tareas.calificacion_tarea) as nota_total"),
                DB::raw("sum(tareas.puntaje_extra) as extra_total"), DB::raw("count(*) as tarea_total"), 'alumno_tutors.alumno_id_alumno'
            ])
            ->get();
        foreach ($combo as $alumno) {
            $alumno->puntaje_total = Objetivo::where('alumno_id_alumno', $alumno->alumno_id_alumno)
                ->where('tutor_id_tutor', $request->tutor_id_tutor)->sum('puntaje');
            $alumno->objetivo_total = Objetivo::where('alumno_id_alumno', $alumno->alumno_id_alumno)
                ->where('tutor_id_tutor', $request->tutor_id_tutor)->count();
            $alumno->total = $alumno->nota_total + $alumno->puntaje_total + $alumno->extra_total;
            $alumno->total_excelencia = ($alumno->tarea_total * 10) + ($alumno->tarea_total * 6) + ($alumno->objetivo_total * 20);
            $alumno->porcentaje = round(($alumno->total / $alumno->total_excelencia) * 100, 2);
        }
        return view('tutorias.estadisticas')->with('tutor', $tutor)->with('tutorS', $tutorSelected)
            ->with('combo', $combo);
    }
    public function verPeoresAlumnos(Request $request)
    {
        $tutor = Tutor::all();
        $tutorSelected = $tutor->where('id_tutor', $request->tutor_id_tutor)->first();
        $combo = new AlumnoTutor();
        $combo = $combo->where('alumno_tutors.tutor_id_tutor', $request->tutor_id_tutor)
            ->join('alumnos', 'alumnos.id_alumno', 'alumno_tutors.alumno_id_alumno')
            ->leftJoin('tareas', function ($join) { //union de dos tablas con dos columnas
                $join->on('tareas.alumno_id_alumno', '=', 'alumno_tutors.alumno_id_alumno');
                $join->on('tareas.tutor_id_tutor', '=', 'alumno_tutors.tutor_id_tutor');
            })
            ->groupBy('alumno_tutors.alumno_id_alumno')
            ->select([
                'alumnos.nombre_alumno', 'alumnos.apellido_alumno', DB::raw("sum(tareas.calificacion_tarea) as nota_total"),
                DB::raw("sum(tareas.puntaje_extra) as extra_total"), DB::raw("count(*) as tarea_total"), 'alumno_tutors.alumno_id_alumno'
            ])
            ->get();
        foreach ($combo as $alumno) {
            $alumno->puntaje_total = Objetivo::where('alumno_id_alumno', $alumno->alumno_id_alumno)
                ->where('tutor_id_tutor', $request->tutor_id_tutor)->sum('puntaje');
            $alumno->objetivo_total = Objetivo::where('alumno_id_alumno', $alumno->alumno_id_alumno)
                ->where('tutor_id_tutor', $request->tutor_id_tutor)->count();
            $alumno->total = $alumno->nota_total + $alumno->puntaje_total + $alumno->extra_total;
            $alumno->total_excelencia = ($alumno->tarea_total * 10) + ($alumno->tarea_total * 6) + ($alumno->objetivo_total * 20);
            $alumno->porcentaje = round(($alumno->total / $alumno->total_excelencia) * 100, 2);
        }
        // return response()->json($combo->porcentaje);
        $combo = json_decode(json_encode($combo), true);
        usort($combo,function($a, $b)
        {
            return $a["porcentaje"] <=> $b["porcentaje"];
        });
        $index=0;
        foreach ($combo as $alumno) {
            if($alumno['porcentaje'] >60){
                unset($combo[$index]);              
            }
            $index++;
        }
        return view('tutorias.peores')->with('tutor', $tutor)->with('tutorS', $tutorSelected)
            ->with('combo', $combo);
    }
}
