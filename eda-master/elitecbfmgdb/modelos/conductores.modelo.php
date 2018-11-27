<?php
date_default_timezone_set('America/Lima');
require 'conexion.php';
require 'vendor/autoload.php'; //

use Purekid\Mongodm\Model;


class ModeloConductor extends Model {

        static $collection = "conductores";

        /** use specific config section **/
        public static $config = 'default';


	/*=============================================
	MOSTRAR USUARIOS
	=============================================*/

	static public function mdlMostrarConductor($item, $valor){

		if($item != null){

            $params = ([
            			$item=>$valor
            			]);
            $conductores = ModeloConductor::one($params);

           return $conductores;

        }else{

           $conductores = ModeloConductor::all();

           return $conductores;
        }

	}

	/*=============================================
	MOSTRAR USUARIOS
	=============================================*/

	static public function mdlMostrarConductorProvincia($item, $valor, $provincia){


			$params = ([
        			$item=>$valor,
        			'id_provincia' => $provincia
        			]);
        	$conductores = ModeloConductor::one($params);

           return $conductores;

	}


/*=============================================
	MOSTRAR USUARIOS
	=============================================*/

	static public function mdlMostrarConductorHistorial($item, $valor){

		$sql ="SELECT T1.fecha_revision, T1.dni, T1.nombre, T2.placa, T3.descripcion, T4.observacion, T4.resultado	FROM
				historial T1 INNER JOIN vehiculos T2 INNER JOIN empresas T3	INNER JOIN antecedentes T4
					ON
						T1.id_vehiculo = T2.id
					AND
						T1.id_empresa = T3.id
					AND
						T1.id  = T4.id_historial
					ORDER BY
					T1.fecha_revision desc";

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("$sql");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}


		$stmt -> close();

		$stmt = null;


	}

	static public function mdlMostrarConductorhoy($item, $valor){


		$conductores = ModeloConductor::count(array($item => new MongoRegex("/$valor/")));


         return $conductores;

	}

	static public function mdlMostrarConductoresMes($item, $valor2){

		$conductores = ModeloConductor::count(array($item => new MongoRegex("/$valor2/")));


	   return $conductores;
	}


	/*=============================================
	RANGO FECHAS
	=============================================*/

	static public function mdlRangoFechasConductor($fechaInicial, $fechaFinal){
	//echo "<script> alert('".$tabla."');</script>";
		if($fechaInicial == null){

			$conductores = ModeloConductor::find();

		  	return $conductores;


		}else if($fechaInicial == $fechaFinal){

			$conductores = ModeloConductor::find(array("fecha" => array('$gt' => $fechaInicial)));

	  		return $conductores;

		}else{

			$conductores = ModeloConductor::find(array("fecha" => array('$gt' => $fechaInicial, '$lte' => $fechaFinal)));

	  		return $conductores;

		}

	}

	/*=============================================
	RANGO FECHAS
	=============================================*/

	static public function mdlRangoFechasConductorHistorial($fechaInicial, $fechaFinal){

		if($fechaInicial == null){

			@$stmt = Conexion::conectar()->prepare("SELECT T1.*, T2.*, T3.descripcion, T4.ant_penales, T4.ant_judicial, T4.ant_policial, T4.resultado FROM historial T1 INNER JOIN vehiculos T2 INNER JOIN empresas T3 INNER JOIN antecedentes T4 ON T1.id_vehiculo = T2.id AND T1.id_empresa = T3.id AND T1.id = T4.id_historial ORDER BY id ASC");

			$stmt -> execute();

			return $stmt -> fetchAll();


		}else if($fechaInicial == $fechaFinal){

			$stmt = Conexion::conectar()->prepare("SELECT T1.*, T2.*, T3.descripcion, T4.ant_penales, T4.ant_judicial, T4.ant_policial, T4.resultado FROM historial T1 INNER JOIN vehiculos T2 INNER JOIN empresas T3 INNER JOIN antecedentes T4 ON T1.id_vehiculo = T2.id AND T1.id_empresa = T3.id AND T1.id = T4.id_historial  WHERE fecha_revision like '%$fechaFinal%'");

			$stmt -> bindParam(":fecha", $fechaFinal, PDO::PARAM_STR);

			$stmt -> execute();


			return $stmt -> fetchAll();

		}else{

			$fechaFinal = new DateTime($fechaFinal);
			$fechaFinal->add(new DateInterval('P1D'));
			$fechaFinal2 = $fechaFinal->format('Y-m-d');

			//var_dump($fechaFinal2);
			//echo "$fechaInicial";


			try {
				$stmt=Conexion::conectar()->prepare("SELECT T1.*, T2.*, T3.descripcion, T4.ant_penales, T4.ant_judicial, T4.ant_policial, T4.resultado FROM historial T1 INNER JOIN vehiculos T2 INNER JOIN empresas T3 INNER JOIN antecedentes T4 ON T1.id_vehiculo = T2.id AND T1.id_empresa = T3.id AND T1.id = T4.id_historial  WHERE fecha_revision BETWEEN '$fechaInicial' AND '$fechaFinal2'");
			$stmt -> execute();
			} catch (Exception $e) {
				print_r($e);
			}
			//->prepare("SELECT * FROM $tabla WHERE fecha BETWEEN '$fechaInicial' AND '$fechaFinal2'");
			//$stmt -> execute();

			return $stmt -> fetchAll();

		}

	}

	/*=============================================
	RANGO FECHAS
	=============================================*/

	static public function mdlRangoFechasConductorProvincia($fechaInicial, $fechaFinal, $provincia){

		if($fechaInicial == $fechaFinal){

			$conductores = ModeloConductor::find(array("fecha" => array('$gt' => $fechaInicial),
													   "id_provincia"=>$provincia)
												);

	  		return $conductores;

		}else{

			$conductores = ModeloConductor::find(array("fecha" => array('$gt' => $fechaInicial,
																		'$lte' => $fechaFinal),
													   "id_provincia"=>$provincia)
												);

	  		return $conductores;

		}

	}


	static public function mdlMostrarunConductorHistorial($item, $valor, $idconductor){


		$sql = "SELECT
					T1.*, T2.*, T3.*, T4.*, T5.*
				FROM
				historial T1
				INNER JOIN vehiculos T2
				INNER JOIN empresas T3
				INNER JOIN antecedentes T4
				INNER JOIN blacklist T5
				ON
					T1.id_vehiculo = T2.id
				AND
					T1.id_empresa = T3.id
				AND
					T1.id  = T4.id_historial
				AND
				T1.id  = T5.id_historial
				WHERE
					dni = $idconductor";

		if($item != null){

			$stmt = Conexion::conectar()->prepare("$sql");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("$sql");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	static public function mdlMostrarSoatConductorvencido(){


			$mes = date('m');
			$mesletra = date('M');


		$conductores = ModeloConductor::find(array('fecha_fin_soat' => new MongoRegex("/$mesletra-2018/"),
												   'fecha_fin_soat' => new MongoRegex("/$mes/2018/"),
													'resultado' => new MongoRegex("/APTO/")
												));


         return $conductores;

	}


}