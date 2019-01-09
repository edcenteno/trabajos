<?php

require 'vendor/autoload.php'; //
$db = (new MongoDB\Client)->verify;

use Purekid\Mongodm\Model;

class ModeloRoles extends Model {

    static $collection = "roles";

    /** use specific config section **/
    public static $config = 'default';

    /*=============================================
    MOSTRAR USUARIOS
    =============================================*/

    static public function MdlMostrarRoles($item, $valor){

        if($item != null){

            $params = array($item=>$valor);
            $roles = ModeloRoles::one($params);
           return $roles;

        }else{

           $roles = ModeloRoles::find();

           return $roles;
        }

    }


}