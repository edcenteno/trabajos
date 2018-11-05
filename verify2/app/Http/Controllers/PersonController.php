<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonController extends Controller
{
     public function store(Request $request){
       if(!$request->ajax()) return redirect('/');
        $essalud = new \EsSalud\EsSalud();
        $mintra = new \MinTra\mintra();

        $result = $mintra->search($request->doc_value);

        if ($resul->success == TRUE ) {

            $persons = new Person();
            $persons ->doc_type = 1;
            $persons ->doc_value = $resul ->DNI;
            $persons ->name = $resul ->Nombres;
            $persons ->first_last_name = $resul ->ApellidoPaterno;
            $persons ->last_last_name = $resul ->ApellidoMaterno;
            $persons ->birthday = $resul ->FechaNacimiento;
            $persons ->phone = $request ->phone;
            $persons ->email = $request ->email;
            $persons ->condicion = '1';

            $persons -> save();

        }else if ($result->success == TRUE ) {
            $persons = new Person();
            $persons ->doc_type = 1;
            $persons ->doc_value = $result ->dni;
            $persons ->name = $result ->nombre;
            $persons ->first_last_name = $result ->paterno;
            $persons ->last_last_name = $result ->materno;
            $persons ->birthday = $result ->nacimiento;
            $persons ->phone = $request ->phone;
            $persons ->email = $request ->email;
            $persons ->condicion = '1';

            $persons -> save();
        }else{
            return response()->json(['No hay datos'], 404);
        }
    }

   /* public function update(Request $request){
       if(!$request->ajax()) return redirect('/');

        $persona = Person::findOrFail($request->id);
        $persons = new Person();
        $persons ->doc_type = 1;
        $persons ->doc_value = $resul ->DNI;
        $persons ->name = $resul ->Nombres;
        $persons ->first_last_name = $resul ->ApellidoPaterno;
        $persons ->last_last_name = $resul ->ApellidoMaterno;
        $persons ->birthday = $resul ->FechaNacimiento;
        $persons ->phone = $request ->phone;
        $persons ->email = $request ->email;
        $persons -> save();

    }*/
}
