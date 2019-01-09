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


}