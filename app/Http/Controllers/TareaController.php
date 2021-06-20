<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;
use App\Models\Alumno;
use App\Models\AlumnoTutor;
use App\Models\Tutor;
use DateTime;

class TareaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $alumno = Alumno::all();
        $tutor = Tutor::all();
        $elementos = Tarea::all();
        return view('tarea.index')->with('tareas', $elementos)->with('alumnos', $alumno)->with('tutors', $tutor);
    }

    public function create()
    {
        $combo = new AlumnoTutor();
        $combo1 = Tutor::all();
        foreach ($combo1 as $tutor) {
            $tutor->alumnos = $combo->where('tutor_id_tutor', $tutor->id_tutor)
                ->join('alumnos', 'alumnos.id_alumno', 'alumno_tutors.alumno_id_alumno')
                ->get();
        }
        return view('tarea.create')->with('tutors', $combo1);
    }

    public function store(Request $request)
    {
        $elemento = new Tarea();
        $elemento->nombre_tarea = $request->get('nombre_tarea');
        $elemento->descripcion_tarea = $request->get('descripcion_tarea');
        $elemento->fecha_entrega = $request->get('fecha_entrega');
        $elemento->calificacion_tarea = $request->get('calificacion_tarea');
        $elemento->comentarios_tarea = $request->get('comentarios_tarea');
        $elemento->entregable_tarea = $request->get('entregable_tarea');
        $elemento->alumno_id_alumno = $request->get('alumno_id_alumno');
        $elemento->tutor_id_tutor = $request->get('tutor_id_tutor');
        $elemento->save();
        return redirect('/tareas');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $elemento = Tarea::find($id);
        $combo = Alumno::all();
        $combo1 = Tutor::all();
        return view('tarea.edit')->with('tarea', $elemento)->with('alumnos', $combo)->with('tutors', $combo1);
    }

    public function update(Request $request, $id)
    {
        $elemento = Tarea::find($id);
        $elemento->nombre_tarea = $request->get('nombre_tarea');
        $elemento->descripcion_tarea = $request->get('descripcion_tarea');
        $elemento->fecha_entrega = $request->get('fecha_entrega');
        $elemento->fecha_tarea_entregada = $request->get('fecha_tarea_entregada');
        $elemento->comentarios_tarea = $request->get('comentarios_tarea');
        $elemento->entregable_tarea = $request->get('entregable_tarea');
        $date1 = new DateTime($request->get('fecha_tarea_entregada'));
        $date2 = new DateTime($request->get('fecha_entrega'));
        $extra=0;
        if ($date1 < $date2) {
            $interval = $date1->diff($date2);
            $extra = $interval->d;
            if ($extra > 6) {
                $extra = 6;
            }
        }
        $elemento->puntaje_extra=$extra;
        $elemento->save();
        return redirect('/tareas');
    }
    public function edit2($id)
    {
        $elemento = Tarea::find($id);
        return view('tarea.edit2')->with('tarea', $elemento);
    }

    public function update2(Request $request, $id)
    {
        $elemento = Tarea::find($id);
        $elemento->calificacion_tarea = $request->get('calificacion_tarea');
        $elemento->save();
        return redirect('/tareas');
    }

    public function destroy($id)
    {
        $elemento = Tarea::find($id);
        $elemento->delete();
        return redirect('/tareas');
    }
}
