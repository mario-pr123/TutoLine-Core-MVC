<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Objetivo;
use App\Models\Alumno;
use App\Models\AlumnoTutor;
use App\Models\Tutor;

class ObjetivoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $alumno=Alumno::all();
        $tutor=Tutor::all();
        $elementos = Objetivo::all();
        return view('objetivo.index')->with('objetivos', $elementos)->with('alumnos', $alumno)->with('tutors', $tutor);
    }

    public function create()
    {
        $combo = new AlumnoTutor();
        $combo1 = Tutor::all();
        foreach($combo1 as $tutor){
            $tutor->alumnos=$combo->where('tutor_id_tutor',$tutor->id_tutor)
            ->join('alumnos','alumnos.id_alumno','alumno_tutors.alumno_id_alumno')
            ->get();
        }
        return view('objetivo.create')->with('tutors',$combo1);
    }

    public function store(Request $request)
    {
        $elemento = new Objetivo();
        $elemento->nombre_objetivo = $request->get('nombre_objetivo');
        $elemento->descripcion_objetivo = $request->get('descripcion_objetivo');
        $elemento->estado_objetivo = $request->get('estado_objetivo');
        $elemento->alumno_id_alumno = $request->get('alumno_id_alumno');
        $elemento->tutor_id_tutor = $request->get('tutor_id_tutor');
        $elemento->save();
        return redirect('/objetivos');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $elemento = Objetivo::find($id);
        $combo = Alumno::all();
        $combo1 = Tutor::all();
        return view('objetivo.edit')->with('objetivo',$elemento)->with('alumnos',$combo)->with('tutors',$combo1);
    }
    
    public function update(Request $request, $id)
    {
        $elemento = Objetivo::find($id);
        $elemento->nombre_objetivo = $request->get('nombre_objetivo');
        $elemento->descripcion_objetivo = $request->get('descripcion_objetivo');
        $elemento->estado_objetivo = 'Por Completar';
        $elemento->puntaje = 0;
        if($request->get('estado_objetivo')==20){
            $elemento->estado_objetivo = 'Completado';
            $elemento->puntaje = 20;
        }
        $elemento->save();
        return redirect('/objetivos');    
    }

    public function destroy($id)
    {
        $elemento = Objetivo::find($id);
        $elemento->delete();
        return redirect('/objetivos');
    }
}
