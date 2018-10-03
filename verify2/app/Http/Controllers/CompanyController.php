<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class CompanyController extends Controller
{
    public function index(Request $request){
       if (!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;

        if ($buscar==''){
            $companys = Company::orderBy('razon_social', 'asc')->paginate(10);
        }
        else{
            $companys = Company::where($criterio, 'like', '%'. $buscar . '%')->orderBy('razon_social', 'asc')->paginate(10);
        }
        return [
            'pagination' => [
                'total'        => $companys->total(),
                'current_page' => $companys->currentPage(),
                'per_page'     => $companys->perPage(),
                'last_page'    => $companys->lastPage(),
                'from'         => $companys->firstItem(),
                'to'           => $companys->lastItem(),
            ],
            'companys' => $companys
        ];
        //return $categorias;
    }

    public function store(Request $request){

       if(!$request->ajax()) return redirect('/');

        $company = new \Sunat\Sunat( true, true );
        $ruc = $request->ruc;

        $result = $company->search( $ruc );

        //dd($result);

        if($result->success == true ){

            $company = new Company();
            $company->ruc =$ruc;
            $company->razon_social =$result->result->razon_social;
            $company->condicion =$result->result->condicion;
            $company->nombre_comercial =$result->result->nombre_comercial;
            $company->tipo =$result->result->tipo;
            $company->fecha_inscripcion =$result->result->fecha_inscripcion;
            $company->estado =$result->result->estado;
            $company->direccion =$result->result->direccion;             // Solo Empresas
            $company->sistema_emision =$result->result->sistema_emision;
            $company->actividad_exterior =$result->result->actividad_exterior;
            $company->oficio =$result->result->oficio;                // Solo Personas
            $company->actividad_economica =$result->result->actividad_economica;
            $company->sistema_contabilidad =$result->result->sistema_contabilidad;
            $company->emision_electronica =$result->result->emision_electronica;
            $company->ple =$result->result->ple;
            $company->emision_electronica =$result->result->emision_electronica;
            $company->cantidad_trabajadores =$result->result->cantidad_trabajadores;
            $company->representantes_legales =$result->result->representantes_legales;
            $company->email =$request->email;
            $company->telefono =$request->telefono;
            $company -> save();
            return response()->json($company);

        }else{
            dd($result);
        }


    }
}