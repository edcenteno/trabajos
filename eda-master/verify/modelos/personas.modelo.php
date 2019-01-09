<?php

require 'vendor/autoload.php'; //
$db = (new MongoDB\Client)->verify;

use Purekid\Mongodm\Model;

class ModeloPersonas extends Model {

    static $collection = "personas";

    /** use specific config section **/
    public static $config = 'default';

    /*=============================================
    MOSTRAR USUARIOS
    =============================================*/

    static public function MdlMostrarPersonas($item, $valor){

        if($item != null){

            $params = array($item=>$valor);
            $personas = ModeloPersonas::one($params);
           return $personas;

        }else{

           $personas = ModeloPersonas::find();

           return $personas;
        }

    }

    /*=============================================
    MOSTRAR Personas caja superior
    =============================================*/

    static public function mdlMostrarPersonashoy($item, $valor, $ruc){

        if ($ruc !='20557675052') {
           $personas = ModeloPersonas::count(['empresa'=>$ruc,
                                               $item => new MongoRegex("/$valor/")
                                                ]);
        } else {
            $personas = ModeloPersonas::count(array($item => new MongoRegex("/$valor/")));
        }




         return $personas;

    }

    static public function mdlMostrarPersonasMes($item, $valor2, $ruc){

        if ($ruc !='20557675052') {
           $personas = ModeloPersonas::count(['empresa'=>$ruc,
                                               $item => new MongoRegex("/$valor2/")
                                                ]);
        } else {
            $personas = ModeloPersonas::count(array($item => new MongoRegex("/$valor2/")));
        }


       return $personas;
    }


}