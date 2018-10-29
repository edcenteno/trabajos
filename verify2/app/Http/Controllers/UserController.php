<?php

namespace App\Http\Controllers;
use App\User;
use App\Company;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;

        if ($buscar==''){
            $companies = User::join('companies','users.id','=','companies.id')
            ->join('roles','users.idrol','=','roles.id')
            ->select('companies.id','companies.ruc','companies.razon_social',
            'companies.condicion','companies.nombre_comercial','companies.tipo',
            'companies.fecha_inscripcion', 'companies.fecha_inscripcion',
            'users.usuario','users.password', 'users.condicion','users.idrol',
            'roles.nombre as rol')
            ->orderBy('companies.id', 'desc')->paginate(3);
        }
        else{
            $companies = User::join('companies','users.id','=','companies.id')
            ->join('roles','users.idrol','=','roles.id')
            ->select('companies.id','companies.nombre','companies.tipo_documento',
            'companies.num_documento','companies.direccion','companies.telefono',
            'companies.email','users.usuario','users.password',
            'users.condicion','users.idrol','roles.nombre as rol')
            ->where('companies.'.$criterio, 'like', '%'. $buscar . '%')
            ->orderBy('companies.id', 'desc')->paginate(3);
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
        if (!$request->ajax()) return redirect('/');

        try{
            DB::beginTransaction();
            $persona = new Persona();
            $persona->nombre = $request->nombre;
            $persona->tipo_documento = $request->tipo_documento;
            $persona->num_documento = $request->num_documento;
            $persona->direccion = $request->direccion;
            $persona->telefono = $request->telefono;
            $persona->email = $request->email;
            $persona->save();

            $user = new User();
            $user->usuario = $request->usuario;
            $user->password = bcrypt( $request->password);
            $user->condicion = '1';
            $user->idrol = $request->idrol;

            $user->id = $persona->id;

            $user->save();

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
