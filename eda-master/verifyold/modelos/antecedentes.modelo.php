<?php
date_default_timezone_set('America/Lima');
require 'vendor/autoload.php';


use Purekid\Mongodm\Model;

class ModeloAntecedentes extends Model {

    public static $collection = "antecedentes";

    /** use specific config section **/
    public static $config = 'default';

    /*=============================================
    MOSTRAR USUARIOS
    =============================================*/

     public function mdlMostrarAntecedentes($item, $valor){

        if($item != null){

            $params = ([
                        $item=>$valor
                        ]);
            $conductores = $this->one($params);

           return $conductores;

        }else{

           $conductores = $this->all();

           return $conductores;
        }

    }





}