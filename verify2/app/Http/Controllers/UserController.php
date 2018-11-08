<?php

namespace App\Http\Controllers;
use App\User;
use App\Company;
use App\Rol;
use App\Jobs\ProcessRuc;
use App\Http\Requests\StoreCompany;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;


        if ($buscar==''){
            $companies = User::with('company')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        }
        else{
            $companies = User::with('company')->where($criterio, 'LIKE', '%' .$buscar. '%')
            ->orderBy('created_at', 'desc')->get();
            /*->paginate(10);*/
        }


        return [
            'pagination' => [
                'total'        => $companies->total(),
                'current_page' => $companies->currentPage(),
                'per_page'     => $companies->perPage(),
                'last_page'    => $companies->lastPage(),
                'from'         => $companies->firstItem(),
                'to'           => $companies->lastItem(),
            ],
            'companies' => $companies
        ];
    }

    public function store(Request $request)
    {
        /*if (!$request->ajax()) return redirect('/');*/

        try{
            //DB::beginTransaction();
            $company = new Company();
            $company->ruc =$request->ruc;
            $company->email =$request->email;
            $company->telefono =$request->telefono;
            $company->condicion = TRUE;
            $company -> save();
            ProcessRuc::dispatch($company);

            $user = new User();
            $user->usuario = $request->usuario;
            $user->password = bcrypt( $request->password);
            $user->condicion = TRUE;
            $user->company_id = $company->_id;
            $user->save();
            $rol = Rol::where('name','SuperAdministrador')->first();
            $user->roles()->associate($rol);

            $user->save();



            return response()->json([$user, $company]);
           // return response()->json($company);


            DB::commit();

        } catch (Exception $e){
            DB::rollBack();
        }



    }

    public function update(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        try{
            DB::beginTransaction();

            //Buscar primero el proveedor a modificar
            $user = User::findOrFail($request->id);

            $persona = Persona::findOrFail($user->id);

            $persona->nombre = $request->nombre;
            $persona->tipo_documento = $request->tipo_documento;
            $persona->num_documento = $request->num_documento;
            $persona->direccion = $request->direccion;
            $persona->telefono = $request->telefono;
            $persona->email = $request->email;
            $persona->save();


            $user->usuario = $request->usuario;
            $user->password = bcrypt( $request->password);
            $user->condicion = '1';
            $user->idrol = $request->idrol;
            $user->save();


            DB::commit();

        } catch (Exception $e){
            DB::rollBack();
        }

    }

    public function desactivar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $user = User::findOrFail($request->id);
        $user->condicion = '0';
        $user->save();
    }

    public function activar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $user = User::findOrFail($request->id);
        $user->condicion = '1';
        $user->save();
    }
}
