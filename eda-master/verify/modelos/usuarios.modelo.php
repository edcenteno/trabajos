<?php
namespace Modelos;
require 'vendor/autoload.php'; //

use Purekid\Mongodm\Model;

    class ModeloUsuarios extends Model {

        static $collection = "usuario_cabify";

        /** use specific config section **/
        public static $config = 'default';

    /*=============================================
    MOSTRAR USUARIOS
    =============================================*/

    static public function MdlMostrarUsuarios($item, $valor){

        if($item != null){

            $params = array($item=>$valor);
            $usuarioscabify = ModeloUsuarios::one($params);

           return $usuarioscabify;

        }else{

           $usuarioscabify = ModeloUsuarios::find(array('$or' => array(array("empresa" => 'cabify'), array("empresa" => 'easytaxi'))));

           return $usuarioscabify;
        }

    }

    /*=============================================
    REGISTRO DE USUARIO
    =============================================*/

    static public function mdlIngresarUsuario($datos){

        $usuarioscabify = new ModeloUsuarios([
                    'nombre' => $datos['nombre'],
                    'usuario' => $datos['usuario'],
                    'password' => $datos['password'],
                    'perfil' => $datos['perfil'],
                    'foto' => $datos['foto'],
                    'estado' => '0',
                    'ultimo_login' => '',
                    'fecha' => '',
                    'dni' => $datos['dni'],
                    'correo' => $datos['correo'],
                    'telefono' => $datos['telefono'],
                    'empresa' => $datos['empresa'],
                    'id_provincia' => $datos['id_provincia'],
                ]);

        $usuarioscabify->save();


        if($usuarioscabify->save()){

            return "ok";

        }else{

            return "error";

        }

    }

    /*=============================================
    EDITAR USUARIO
    =============================================*/

    static public function mdlEditarUsuario($datos){

        $usuarioscabify = ModeloUsuarios::one(['usuario'=>$datos['usuario'],]);
         $usuarioscabify->update([
                    'nombre' => $datos['nombre'],
                    'password' => $datos['password'],
                    'perfil' => $datos['perfil'],
                    'foto' => $datos['foto'],
                    'empresa' => $datos['empresa']
                    ]);

        $usuarioscabify->save();


    }

    /*=============================================
    ACTUALIZAR USUARIO
    =============================================*/

    static public function mdlActualizarUsuario($item1, $valor1, $item2, $valor2){

        $usuarioscabify = ModeloUsuarios::one([
            $item2=>$valor2
            ]);

        $fecha = $usuarioscabify->ultimo_login;

        $usuarioscabify->update([
            $item1=>$valor1
        ]);
        $usuarioscabify->save();

       // var_dump($usuarioscabify);


            return "ok";



    }

    /*=============================================
    BORRAR USUARIO
    =============================================*/

    static public function mdlBorrarUsuario($datos){

        $usuarioscabify = ModeloUsuarios::one(['usuario'=>$datos]);
        $usuarioscabify->delete();



            return "ok";




    }

}