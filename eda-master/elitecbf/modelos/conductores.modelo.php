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

	/*=============================================
	MOSTRAR USUARIOS
	=============================================*/

	static public function mdlMostrarConductoract($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

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
		$mes=date('Y-m');
		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha like '$mes%'");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha like '$mes%'");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

		static public function mdlMostrarConductoresMes($tabla, $item2, $valor2){
			$fecha_actual = date("Y-m-d");
			$mes_anterior = date("Y-m",strtotime($fecha_actual."- 1 month"));
		if($item2 != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha like '$mes_anterior%'");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha like '$mes_anterior%'");

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
		$mes = date('Y-m');
		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE cabify = '1' and fecha like '$mes%'");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE cabify = '1' and fecha like '$mes%'");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

		static public function mdlMostrarConductoresMesCabify($tabla, $item2, $valor2){
			$mes = date('Y-m');
			$mesact = date("Y-m",strtotime($mes."- 1 month"));
		if($item2 != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE cabify = '1'");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE cabify = '1'");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
	}

		static public function mdlMostrarConductoresmigradosmescbf($tabla, $item2, $valor2){
			$mes = date('Y-m');

		if($item2 != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE migrarcabf = '1' and fechamigra like '$mes%'");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE migrarcabf = '1' and fechamigra like '$mes%'");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
	}

		static public function mdlMostrarConductoresmigradosmesanteriorcbf($tabla, $item2, $valor2){
			$mes = date('Y-m');
			$mesact = date("Y-m",strtotime($mes."- 1 month"));
		if($item2 != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE cabify = '1' and fechamigra like 'mesact%'");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE cabify = '1' and fechamigra like 'mesact%'");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*===========================================
	EASY
	============================================*/

	static public function mdlMostrarConductoresmigradosmeseasy($tabla, $item2, $valor2){
			$mes = date('Y-m');

		if($item2 != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE migrareasy = '1' and fechamigra like '$mes%'");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE migrareasy = '1' and fechamigra like '$mes%'");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
	}

		static public function mdlMostrarConductoresmigradosmesanterioreasy($tabla, $item2, $valor2){
			$mes = date('Y-m');
			$mesact = date("Y-m",strtotime($mes."- 1 month"));
		if($item2 != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE cabify = '1' and fechamigra like 'mesact%'");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE cabify = '1' and fechamigra like 'mesact%'");

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
		$mes = date('Y-m');
		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE easytaxi = '1' and fecha like '$mes%'");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE easytaxi = '1' and fecha like '$mes%'");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

		static public function mdlMostrarConductoresMesEasy($tabla, $item2, $valor2){

		if($item2 != null){

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

	/*=============================================
	ACT
	=============================================*/
	static public function mdlMostrarConductoresactcbf($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT SUM(act) FROM $tabla  WHERE act >0");
			//$stmt = Conexion::conectar()->prepare("SELECT SUM(act) as conta FROM conductores WHERE act >0 and cabify = 1");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT SUM(act) FROM $tabla WHERE act >0");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

		static public function mdlMostrarConductoracteasy($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT SUM(act) as conta FROM conductores WHERE act >0");
			//$stmt = Conexion::conectar()->prepare("SELECT SUM(act) as conta FROM conductores WHERE act >0 and easy = 1");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT SUM(act) as conta FROM conductores WHERE act >0");
			//$stmt = Conexion::conectar()->prepare("SELECT SUM(act) as conta FROM conductores WHERE act >0 and easy = 1");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

		static public function mdlMostrarConductoracteasymesanterior($tabla, $item2, $valor2){

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
	/*static public function mdlMostrarConductorhoyactcbf($tabla, $item, $valor){

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

	}*/

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

		static public function mdlMostrarSoatConductor($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where soat = 'VENCIDO' ORDER BY fecha_fin_soat desc limit 10");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where soat = 'VENCIDO' ORDER BY fecha desc limit 10");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

		static public function mdlMostrarSoatConductorvencido($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{
			$mes = date('m');
			$mesletra = date('M');
			$stmt = Conexion::conectar()->prepare("SELECT * FROM conductores WHERE fecha_fin_soat like '%mesletra-2018' or fecha_fin_soat like '%$mes/2018' and resultado = 'APTO' AND ant_penales = 'NEGATIVO' AND ant_judicial = 'NEGATIVO' AND ant_policial = 'NEGATIVO'");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}


}