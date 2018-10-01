<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;

class SubjectController extends Controller{

  public function index(Request $request){
       /*if (!$request->ajax()) return redirect('/');*/

        $buscar = $request->buscar;
        $criterio = $request->criterio;

        if ($buscar==''){
            $subject = Subject::orderBy('name', 'asc')->paginate(10);
        }
        else{
            $subject = Subject::where($criterio, 'like', '%'. $buscar . '%')->orderBy('name', 'asc')->paginate(10);
        }
        return [
            'pagination' => [
                'total'        => $subject->total(),
                'current_page' => $subject->currentPage(),
                'per_page'     => $subject->perPage(),
                'last_page'    => $subject->lastPage(),
                'from'         => $subject->firstItem(),
                'to'           => $subject->lastItem(),
            ],
            'subject' => $subject
        ];
        //return $subject;
    }

    public function store(Request $request){
       /*if(!$request->ajax()) return redirect('/');*/
        $subject = new Subject();
        $subject ->doc_type = 1;
        $subject ->doc_value = $request ->doc_value;
        /*$subject ->descripcion = $request ->descripcion;*/
        $subject ->condicion = '1';
        $subject -> save();
    }


    public function update(Request $request){
       /*if(!$request->ajax()) return redirect('/');*/
        $subject = Subject::findOrFail($request->id);
        $subject ->doc_value = $request ->doc_value;
        /*$subject ->descripcion = $request ->descripcion;*/
        $subject ->condicion = '1';
        $subject -> save();
    }

    public function desactivar(Request $request){
       /*if(!$request->ajax()) return redirect('/');*/
        $subject = Subject::findOrFail($request->id);
        $subject ->condicion = '0';
        $subject -> save();
    }

    public function activar(Request $request){
       /*if(!$request->ajax()) return redirect('/');*/
        $subject = Subject::findOrFail($request->id);
        $subject ->condicion = '1';
        $subject -> save();
    }

    public function inicio(Request $request){
       /*if(!$request->ajax()) return redirect('/');*/

        $essalud = new \EsSalud\EsSalud();
        $mintra = new \MinTra\mintra();
        //$resul = $essalud->search($request->doc_value);
        $result = $mintra->search($request->doc_value);
        //dd($result);
        //var_dump($result);
        if ($resul->success == TRUE ) {

           //var_dump($resul);
            $subject = new Subject();
            $subject ->doc_type = 1;
            $subject ->doc_value = $resul ->DNI;
            $subject ->name = $resul ->Nombres;
            $subject ->first_last_name = $resul ->ApellidoPaterno;
            $subject ->last_last_name = $resul ->ApellidoMaterno;
            $subject ->birthday = $resul ->FechaNacimiento;
            $subject ->condicion = '1';
            $subject -> save();

        }else if ($result->success == TRUE ) {
            $subject = new Subject();
            $subject ->doc_type = 1;
            $subject ->doc_value = $result ->dni;
            $subject ->name = $result ->nombre;
            $subject ->first_last_name = $result ->paterno;
            $subject ->last_last_name = $result ->materno;
            $subject ->birthday = $result ->nacimiento;
            $subject ->condicion = '1';
            $subject -> save();
        }else{
            return response()->json(['No hay datos'], 404);
        }

//dd($essalud->search('06261502')->Nombres);
    }

}
