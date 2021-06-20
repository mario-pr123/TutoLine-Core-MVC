<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $elementos = Categoria::all();
        return view('categoria.index')->with('categorias', $elementos);
    }


    public function create()
    {
        return view('categoria.create');
    }


    public function store(Request $request)
    {
        $elemento = new Categoria();
        $elemento->nombre_categoria = $request->get('nombre_categoria');
        $elemento->descripcion_categoria = $request->get('descripcion_categoria');
        $elemento->dificultad = $request->get('dificultad');
        $elemento->save();
        return redirect('/categorias');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $elemento = Categoria::find($id);
        return view('categoria.edit')->with('categoria',$elemento);
    }


    public function update(Request $request, $id)
    {
        $elemento = Categoria::find($id);
        $elemento->nombre_categoria = $request->get('nombre_categoria');
        $elemento->descripcion_categoria = $request->get('descripcion_categoria');
        $elemento->dificultad = $request->get('dificultad');
        $elemento->save();
        return redirect('/categorias');
    }


    public function destroy($id)
    {
        $elemento = Categoria::find($id);
        $elemento->delete();
        return redirect('/categorias');
    }
}
