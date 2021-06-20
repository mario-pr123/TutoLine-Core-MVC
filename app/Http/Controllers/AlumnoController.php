<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;

class AlumnoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $elementos = Alumno::all();
        return view('alumno.index')->with('alumnos', $elementos);
    }

    public function create()
    {
        return view('alumno.create');
    }

    public function store(Request $request)
    {
        $elemento = new Alumno();
        $elemento->nombre_alumno = $request->get('nombre');
        $elemento->apellido_alumno = $request->get('apellido');
        $elemento->fecha_nacimiento_alumno = $request->get('fecha_nacimiento_alumno');
        $elemento->email_alumno = $request->get('email');
        $elemento->telefono_alumno = $request->get('telefono');
        $elemento->password_alumno = $request->get('password');
        $elemento->save();
        return redirect('/alumnos');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $elemento = Alumno::find($id);
        return view('alumno.edit')->with('alumno',$elemento);
    }


    public function update(Request $request, $id)
    {
        $elemento = Alumno::find($id);
        $elemento->nombre_alumno = $request->get('nombre');
        $elemento->apellido_alumno = $request->get('apellido');
        $elemento->fecha_nacimiento_alumno = $request->get('fecha_nacimiento_alumno');
        $elemento->email_alumno = $request->get('email');
        $elemento->telefono_alumno = $request->get('telefono');
        $elemento->password_alumno = $request->get('password');
        $elemento->save();
        return redirect('/alumnos');
    }


    public function destroy($id)
    {
        $elemento = Alumno::find($id);
        $elemento->delete();
        return redirect('/alumnos');
    }
}
