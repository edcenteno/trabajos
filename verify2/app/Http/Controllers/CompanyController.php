<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class CompanyController extends Controller
{
    public function index(Request $request){
      /* if (!$request->ajax()) return redirect('/');*/

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

       /*if(!$request->ajax()) return redirect('/');*/

        $company = new \Sunat\Sunat( true, true );

            $ruc = $request->ruc;

            $result = $company->search($ruc);
            dd($result);

            if( $result->success == true ){

                $company = new Company();
                $company->ruc =$search->result->ruc;
                $company->razon_social =$search->result->razon_social;
                $company->condicion =$search->result->condicion;
                $company->nombre_comercial =$search->result->nombre_comercial;
                $company->tipo =$search->result->tipo;
                $company->fecha_inscripcion =$search->result->fecha_inscripcion;
                $company->estado =$search->result->estado;
                $company->direccion =$search->result->direccion;             // Solo Empresas
                $company->sistema_emision =$search->result->sistema_emision;
                $company->actividad_exterior =$search->result->actividad_exterior;
                $company->oficio =$search->result->oficio;                // Solo Personas
                $company->actividad_economica =$search->result->actividad_economica;
                $company->sistema_contabilidad =$search->result->sistema_contabilidad;
                $company->emision_electronica =$search->result->emision_electronica;
                $company->ple =$search->result->ple;
                $company->emision_electronica =$search->result->emision_electronica;   // array
                $company->cantidad_trabajadores =$search->result->cantidad_trabajadores; // array
                $company->email =$request->email; // array
                $company->telefono =$request->telefono; // array


            }


        }
}