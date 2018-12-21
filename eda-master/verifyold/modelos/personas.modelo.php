<?php
date_default_timezone_set('America/Lima');
require 'vendor/autoload.php';


use Purekid\Mongodm\Model;

class ModeloPersonas extends Model {

	public static $collection = "individuosarhuinternacionalsac";

    /** use specific config section **/
    public static $config = 'default';

	public function setColection($default){
		//parent::__construct($default);
		$this->collection=$default;
	}
	/*=============================================
	MOSTRAR USUARIOS
	=============================================*/

	 public function mdlMostrarPersonas($item, $valor){

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





	/*=============================================
	RANGO FECHAS
	=============================================*/

	public function mdlRangoFechasConductor($fechaInicial, $fechaFinal){
	//echo "<script> alert('".$tabla."');</script>";
		if($fechaInicial == null){

			$conductores = ModeloPersonas::find();

		  	return $conductores;


		}else if($fechaInicial == $fechaFinal){

			$conductores = ModeloPersonas::find(array("fecha" => array('$gt' => $fechaInicial)));

	  		return $conductores;

		}else{

			$conductores = ModeloPersonas::find(array("fecha" => array('$gt' => $fechaInicial, '$lte' => $fechaFinal)));

	  		return $conductores;

		}

	}



}