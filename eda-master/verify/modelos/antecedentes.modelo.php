<?php

require 'vendor/autoload.php'; //
$db = (new MongoDB\Client)->verify;

use Purekid\Mongodm\Model;

class ModeloAntecedentes extends Model {

    static $collection = "antecedentes";

    /** use specific config section **/
    public static $config = 'default';

    /*=============================================
    MOSTRAR USUARIOS
    =============================================*/

    static public function MdlMostrarAntecedentes($item, $valor){

        if($item != null){

            $params = array($item=>$valor);
            $antecedentes = ModeloAntecedentes::one($params);
           return $antecedentes;

        }else{

           $antecedentes = ModeloAntecedentes::find();

           return $antecedentes;
        }

    }


}