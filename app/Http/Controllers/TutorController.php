<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tutor;
use App\Models\Categoria;

class TutorController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $categoria= Categoria::all();
        $elementos = Tutor::all();
        return view('tutor.index')->with('tutors', $elementos)->with('categorias', $categoria);
    }

    public function create()
    {
        $combo = Categoria::all();
        return view('tutor.create')->with('categorias',$combo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $elemento = new Tutor();
        $elemento->nombre_tutor = $request->get('nombre_tutor');
        $elemento->apellido_tutor = $request->get('apellido_tutor');
        $elemento->fecha_nacimiento_tutor = $request->get('fecha_nacimiento_tutor');
        $elemento->email_tutor = $request->get('email_tutor');
        $elemento->password_tutor = $request->get('password_tutor');
        $elemento->telefono_tutor = $request->get('telefono_tutor');
        $elemento->formacion_academica = $request->get('formacion_academica');
        $elemento->categorias_id_categoria = $request->get('categorias_id_categoria');
        $elemento->save();
        return redirect('/tutors');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $elemento = Tutor::find($id);
        $combo = Categoria::all();
        return view('tutor.edit')->with('tutor',$elemento)->with('categorias',$combo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $elemento = Tutor::find($id);
        $elemento->nombre_tutor = $request->get('nombre_tutor');
        $elemento->apellido_tutor = $request->get('apellido_tutor');
        $elemento->fecha_nacimiento_tutor = $request->get('fecha_nacimiento_tutor');
        $elemento->email_tutor = $request->get('email_tutor');
        $elemento->password_tutor = $request->get('password_tutor');
        $elemento->telefono_tutor = $request->get('telefono_tutor');
        $elemento->formacion_academica = $request->get('formacion_academica');
        $elemento->categorias_id_categoria = $request->get('categorias_id_categoria');
        $elemento->save();
        return redirect('/tutors');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $elemento = Tutor::find($id);
        $elemento->delete();
        return redirect('/tutors');
    }
}
