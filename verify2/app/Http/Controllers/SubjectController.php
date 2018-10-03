<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;

class SubjectController extends Controller{

  public function index(Request $request){
       if (!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;

        if ($buscar==''){
            $subjects = Subject::orderBy('name', 'asc')->paginate(10);
        }
        else{
            $subjects = Subject::where($criterio, 'like', '%'. $buscar . '%')->orderBy('name', 'asc')->paginate(10);
        }
        return [
            'pagination' => [
                'total'        => $subjects->total(),
                'current_page' => $subjects->currentPage(),
                'per_page'     => $subjects->perPage(),
                'last_page'    => $subjects->lastPage(),
                'from'         => $subjects->firstItem(),
                'to'           => $subjects->lastItem(),
            ],
            'subjects' => $subjects
        ];
        //return $subjects;
    }

    public function store(Request $request){
       if(!$request->ajax()) return redirect('/');
        $subjects = new Subject();
        $subjects ->doc_type = 1;
        $subjects ->doc_value = $request ->doc_value;
        /*$subjects ->descripcion = $request ->descripcion;*/
        $subjects ->condicion = '1';
        $subjects -> save();
    }


    public function update(Request $request){
       if(!$request->ajax()) return redirect('/');
        $subjects = Subject::findOrFail($request->id);
        $subjects ->doc_value = $request ->doc_value;
        /*$subjects ->descripcion = $request ->descripcion;*/
        $subjects ->condicion = '1';
        $subjects -> save();
    }

    public function desactivar(Request $request){
       if(!$request->ajax()) return redirect('/');
        $subjects = Subject::findOrFail($request->id);
        $subjects ->condicion = '0';
        $subjects -> save();
    }

    public function activar(Request $request){
       if(!$request->ajax()) return redirect('/');
        $subjects = Subject::findOrFail($request->id);
        $subjects ->condicion = '1';
        $subjects -> save();
    }

    public function inicio(Request $request){
       if(!$request->ajax()) return redirect('/');

        $essalud = new \EsSalud\EsSalud();
        $mintra = new \MinTra\mintra();
        $resul = $essalud->search($request->doc_value);
        $result = $mintra->search($request->doc_value);

        if ($resul->success == TRUE ) {

            $subjects = new Subject();
            $subjects ->doc_type = 1;
            $subjects ->doc_value = $resul ->DNI;
            $subjects ->name = $resul ->Nombres;
            $subjects ->first_last_name = $resul ->ApellidoPaterno;
            $subjects ->last_last_name = $resul ->ApellidoMaterno;
            $subjects ->birthday = $resul ->FechaNacimiento;
            $subjects ->condicion = '1';
            $subjects -> save();

        }else if ($result->success == TRUE ) {

            $subjects = new Subject();
            $subjects ->doc_type = 1;
            $subjects ->doc_value = $result ->dni;
            $subjects ->name = $result ->nombre;
            $subjects ->first_last_name = $result ->paterno;
            $subjects ->last_last_name = $result ->materno;
            $subjects ->birthday = $result ->nacimiento;
            $subjects ->condicion = '1';
            $subjects -> save();

        }else{
            return response()->json(['No hay datos'], 404);
        }


    }

}
