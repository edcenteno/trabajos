<?php

require 'vendor/autoload.php'; //
$db = (new MongoDB\Client)->verify;

use Purekid\Mongodm\Model;

class ModeloItems extends Model {

    static $collection = "configuracion";

    /** use specific config section **/
    public static $config = 'default';

    /*=============================================
    MOSTRAR USUARIOS
    =============================================*/

    static public function MdlMostrarItems($item, $valor){

        if($item != null){

            $params = array($item=>$valor);
            $items = ModeloItems::one($params);
           return $items;

        }else{

           $items = ModeloItems::find();

           return $items;
        }

    }


}