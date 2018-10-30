<?php

namespace App\Http\Controllers;

use App\Company;
use App\Jobs\ProcessRuc;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCompany;

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

    public function store(StoreCompany $request){

       if(!$request->ajax()) return redirect('/');

            $company = new Company();
            $company->ruc =$request->ruc;
            $company->email =$request->email;
            $company->telefono =$request->telefono;
            $company -> save();
            ProcessRuc::dispatch($company);
            return response()->json($company);

    }

    public function desactivar(Request $request){
       if(!$request->ajax()) return redirect('/');
        $company = Company::findOrFail($request->id);
        $company ->condicion = '0';
        $company -> save();
    }

    public function activar(Request $request){
       if(!$request->ajax()) return redirect('/');
        $company = Company::findOrFail($request->id);
        $company ->condicion = '1';
        $company -> save();
    }
}