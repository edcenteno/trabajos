<?php

date_default_timezone_set('America/Lima');

require_once "conexion.php";

class ModeloConductor{

	/*=============================================
	MOSTRAR USUARIOS
	=============================================*/

	static public function mdlMostrarConductor($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}


		$stmt -> close();

		$stmt = null;

	}

	static public function mdlMostrarConductorhoy($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha like '2018-08%'");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha like '2018-08%'");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

		static public function mdlMostrarConductoresMes($tabla, $item2, $valor2){

		if($item2 != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha like '2018-07%'");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha like '2018-07%'");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	CABIFY
	=============================================*/
	static public function mdlMostrarConductorhoyCabify($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE act_cbf = '1'");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE act_cbf = '1'");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

		static public function mdlMostrarConductoresMesCabify($tabla, $item2, $valor2){

		if($item2 != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE act_cbf = '1' and fecha like '2018-07%'");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE act_cbf = '1' and fecha like '2018-07%'");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	CABIFY
	=============================================*/
	static public function mdlMostrarConductorhoyEasyact($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE act_easy = '1'");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE act_easy = '1'");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

		static public function mdlMostrarConductoresMesEasyact($tabla, $item2, $valor2){

		if($item2 != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE act_easy = '1' and fecha like '2018-07%'");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE act_easy = '1' and fecha like '2018-07%'");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	EASY
	=============================================*/
	static public function mdlMostrarConductorhoyEasy($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE easytaxi = '1'");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE easytaxi = '1'");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

		static public function mdlMostrarConductoresMesEasy($tabla, $item2, $valor2){

		if($item2 != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE easytaxi = '1' and fecha like '2018-07%'");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE easytaxi = '1' and fecha like '2018-07%'");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	ACT
	=============================================*/
	static public function mdlMostrarConductorhoyact($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE act >0");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE act >0");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

		static public function mdlMostrarConductoresMesact($tabla, $item2, $valor2){

		if($item2 != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE act >0 and fecha_act like '2018-07%'");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE act >0 and fecha_act like '2018-07%'");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	ACT CBF
	=============================================*/
	static public function mdlMostrarConductorhoyactcbf($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE act_cbf >0");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE act_cbf >0");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

		static public function mdlMostrarConductoresMesactcbf($tabla, $item2, $valor2){

		if($item2 != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE act_cbf >0 and fecha_act like '2018-07%'");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE act_cbf >0 and fecha_act like '2018-07%'");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}




	/*=============================================
	REGISTRO DE USUARIO
	=============================================*/

	static public function mdlIngresarConductor($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(dni, nombre, apellido, placa, fecha) VALUES (:dni, :nombre, :apellido, :placa, :fecha)");

		$stmt->bindParam(":dni", $datos["dni"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
		$stmt->bindParam(":placa", $datos["placa"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);


		if($stmt->execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt->close();

		$stmt = null;

	}

	/*=============================================
	RANGO FECHAS
	=============================================*/

	static public function mdlRangoFechasConductor($tabla, $fechaInicial, $fechaFinal){
	//echo "<script> alert('".$tabla."');</script>";
		if($fechaInicial == null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id ASC");

			$stmt -> execute();

			return $stmt -> fetchAll();


		}else if($fechaInicial == $fechaFinal){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha like '%$fechaFinal%'");

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
				$stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha BETWEEN '$fechaInicial' AND '$fechaFinal2'");
			$stmt -> execute();
			} catch (Exception $e) {
				print_r($e);
			}
			//->prepare("SELECT * FROM $tabla WHERE fecha BETWEEN '$fechaInicial' AND '$fechaFinal2'");
			//$stmt -> execute();

			return $stmt -> fetchAll();

		}

	}

	static public function mdlMostrarunConductor($tabla, $item, $valor, $idconductor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where dni = $idconductor");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where dni = $idconductor");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

		static public function mdlMostrarSoatConductor($tabla, $item, $valor, $ano, $fecha_actual){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha_fin_soat BETWEEN '$ano' AND '$fecha_actual'");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha_fin_soat BETWEEN '$ano' AND '$fecha_actual'
");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}


}