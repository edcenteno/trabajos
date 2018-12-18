<?php

require 'vendor/autoload.php'; //
$db = (new MongoDB\Client)->verify;
use Purekid\Mongodm\Model;

class ModeloClientes extends Model {

    static $collection = "clientes";

    /** use specific config section **/
    public static $config = 'default';

    /*=============================================
    MOSTRAR USUARIOS
    =============================================*/

    static public function MdlMostrarClientes($item, $valor){

        if($item != null){

            $params = array($item=>$valor);
            $clientes = ModeloClientes::one($params);
           return $clientes;

        }else{

           $clientes = ModeloClientes::find();

           return $clientes;
        }

    }


}