<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use App\Categoria;


class CategoriaController extends Controller{

    public function index(Request $request){
       if (!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;

        if ($buscar==''){
            $categorias = Categoria::orderBy('nombre', 'asc')->paginate(10);
        }
        else{
            $categorias = Categoria::where($criterio, 'like', '%'. $buscar . '%')->orderBy('nombre', 'asc')->paginate(10);
        }
        return [
            'pagination' => [
                'total'        => $categorias->total(),
                'current_page' => $categorias->currentPage(),
                'per_page'     => $categorias->perPage(),
                'last_page'    => $categorias->lastPage(),
                'from'         => $categorias->firstItem(),
                'to'           => $categorias->lastItem(),
            ],
            'categorias' => $categorias
        ];
        //return $categorias;
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

    public function inicio(){
       /*if(!$request->ajax()) return redirect('/');*/

    $essalud = new \EsSalud\EsSalud();
    $resul = $essalud->search('0661502');
    //dd($resul);
    if ($resul['success'] == TRUE || strlen('066502') >= 7 ) {
        # trae data
    } else {
        # mensaje de error en json
        return response()->json(['No hay datos'], 404);
    }

//dd($essalud->search('06261502')->Nombres);
    }



}
