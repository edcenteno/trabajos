<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;

class CategoriaController extends Controller{

    public function index(Request $request){
       if(!$request->ajax()) return redirect('/');
        $categorias = Categoria::all();
        return $categorias;
    }

    public function store(Request $request){
       if(!$request->ajax()) return redirect('/');
        $categoria = new Categoria();
        $categoria ->nombre = $request ->nombre;
        $categoria ->descripcion = $request ->descripcion;
        $categoria ->condicion = '1';
        $categoria -> save();
    }


    public function update(Request $request){
       if(!$request->ajax()) return redirect('/');
        $categoria = Categoria::findOrFail($request->id);
        $categoria ->nombre = $request ->nombre;
        $categoria ->descripcion = $request ->descripcion;
        $categoria ->condicion = '1';
        $categoria -> save();
    }

    public function desactivar(Request $request){
       if(!$request->ajax()) return redirect('/');
        $categoria = Categoria::findOrFail($request->id);
        $categoria ->condicion = '0';
        $categoria -> save();
    }

    public function activar(Request $request){
       if(!$request->ajax()) return redirect('/');
        $categoria = Categoria::findOrFail($request->id);
        $categoria ->condicion = '1';
        $categoria -> save();
    }



}
