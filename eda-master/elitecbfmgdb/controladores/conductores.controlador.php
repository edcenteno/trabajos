<?php

class ControladorConductor{


	/*=============================================
	REGISTRO DE USUARIO
	=============================================*/

	static public function ctrCrearConductor(){

		if(isset($_POST["nuevoDni"])){

			if(preg_match('/^[0-9]+$/', $_POST["nuevoDni"])){

				$tabla = "conductores";
				date_default_timezone_set('America/Lima');

				$fecha = date('Y-m-d');
				$hora = date('H:i:s');

				$fechaActual = $fecha.' '.$hora;

				$datos = array("dni" => $_POST["nuevoDni"],
							   "nombre" => $_POST["nuevoNombre"],
							   "apellido" => $_POST["nuevoApellido"],
							   "placa" => $_POST["nuevoPlaca"],
							   "fecha" => $fechaActual);

				$respuesta = ModeloConductor::mdlIngresarConductor($tabla, $datos);

				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡El usuario ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){

							window.location = "conductores";

						}

					});


					</script>';


				}


			}else{

				echo '<script>

					swal({

						type: "error",
						title: "¡El usuario no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){

							window.location = "usuarios";

						}

					});


				</script>';

			}


		}


	}

	/*=============================================
	MOSTRAR USUARIO
	=============================================*/

	static public function ctrMostrarConductor($item, $valor){

		$respuesta = ModeloConductor::mdlMostrarConductor($item, $valor);

		return $respuesta;
	}

	/*=============================================
	MOSTRAR USUARIO
	=============================================*/

	static public function ctrMostrarConductorProvincia($item, $valor, $provincia){

		//$tabla = "conductores";

		$respuesta = ModeloConductor::mdlMostrarConductorProvincia($item, $valor, $provincia);

		return $respuesta;
	}

	/*=============================================
	MOSTRAR USUARIO
	=============================================*/

	static public function ctrMostrarConductorHistorial($item, $valor){

		$respuesta = ModeloConductor::mdlMostrarConductorHistorial($item, $valor);

		return $respuesta;
	}

	/*=============================================
	MOSTRAR USUARIO
	=============================================*/

	static public function ctrMostrarConductoract($item, $valor){

		$tabla = "conductores_act";

		$respuesta = ModeloConductor::mdlMostrarConductoract($tabla, $item, $valor);

		return $respuesta;
	}


	/*=============================================
	DESCARGAR EXCEL
	=============================================*/

	public function ctrDescargarReporte(){

		  $fechaini=$_GET["fechaInicial"];
          $fechafin=$_GET["fechaFinal"];


         // echo $fechaini;
          //echo $fechafin;

		if(isset($_GET["reporte"])){

			$tablas = "conductores";


			if(isset($fechaini) && isset($fechafin)){
				$conductores = ModeloConductor::mdlRangoFechasConductor($tablas, $fechaini, $fechafin);


			}else{

				$item = null;
				$valor = null;

				$conductores = ModeloConductor::MdlMostrarConductor($tabla, $item, $valor);

			}


			/*=============================================
			CREAMOS EL ARCHIVO DE EXCEL
			=============================================*/

			$Name = $_GET["reporte"].'.xls';
 //echo "<script> alert('excel');</script>";
			header('Expires: 0');
			header('Cache-control: private');
			header("Content-type: application/vnd.ms-excel"); // Archivo de Excel
			header("Cache-Control: cache, must-revalidate");
			header('Content-Description: File Transfer');
			header('Last-Modified: '.date('D, d M Y H:i:s'));
			header("Pragma: public");
			header('Content-Disposition:; filename="'.$Name.'"');
			header("Content-Transfer-Encoding: binary");

			echo utf8_decode("<table border='0'>

					<tr>
					<td style='font-weight:bold; border:1px solid #eee;'>FECHA DE REGISTRO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>DNI</td>
					<td style='font-weight:bold; border:1px solid #eee;'>NOMBRE</td>
					<td style='font-weight:bold; border:1px solid #eee;'>APELLIDO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>PLACA</td>
					<td style='font-weight:bold; border:1px solid #eee;'>ANTECEDENTES PENALES</td>
					<td style='font-weight:bold; border:1px solid #eee;'>ANTECEDENTES JUDICIAL</td>
					<td style='font-weight:bold; border:1px solid #eee;'>ANTECEDENTES POLICIAL</td>
					<td style='font-weight:bold; border:1px solid #eee;'>RECORD CONDUCTOR</td>
					<td style='font-weight:bold; border:1px solid #eee;'>RESULTADO</td
					<td style='font-weight:bold; border:1px solid #eee;'>SOAT</td>
					<td style='font-weight:bold; border:1px solid #eee;'>FECHA DE INICIO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>FECHA DE FIN</td>
					<td style='font-weight:bold; border:1px solid #eee;'>OBSERVACION</td>
					<td style='font-weight:bold; border:1px solid #eee;'>EMPRESA</td>


					</tr>");

			foreach ($conductores as $row => $value){

				$cabify = $value["cabify"];
                $easytaxi = $value["easytaxi"];

                if ($cabify == '1' && $easytaxi == 1) {
                    $cabify= "Cabify <br> Easytaxi";
                }else if ($easytaxi == 1 && $cabify == 0) {
                    $cabify= "easytaxi";
                }else if ($easytaxi == 0 && $cabify == 1) {
                    $cabify = "cabify";
                }else if ($easytaxi == 0 && $cabify == 0) {
                    $cabify = "";
                }
			 echo utf8_decode("<tr>
			 			<td style='border:1px solid #eee;'>".$value["fecha"]."</td>
			 			<td style='border:1px solid #eee;'>".$value["dni"]."</td>
			 			<td style='border:1px solid #eee;'>".$value["nombre"]."</td>
			 			<td style='border:1px solid #eee;'>".$value["apellido"]."</td>
			 			<td style='border:1px solid #eee;'>".$value["placa"]."</td>
			 			<td style='border:1px solid #eee;'>".$value["ant_penales"]."</td>
			 			<td style='border:1px solid #eee;'>".$value["ant_judicial"]."</td>
			 			<td style='border:1px solid #eee;'>".$value["ant_policial"]."</td>
			 			<td style='border:1px solid #eee;'>".$value["record_cond"]."</td>
			 			<td style='border:1px solid #eee;'>".$value["resultado"]."</td>
			 			<td style='border:1px solid #eee;'>".$value["soat"]."</td>
			 			<td style='border:1px solid #eee;'>".$value["fecha_inicio_soat"]."</td>
			 			<td style='border:1px solid #eee;'>".$value["fecha_fin_soat"]."</td>
						<td style='border:1px solid #eee;'>".$value["observacion"]."</td>
						<td style='border:1px solid #eee;'>".$cabify."</td>


			 			</tr>");

			 	}

			echo "</table>";



	}



}

	/*=============================================
	RANGO FECHAS
	=============================================*/

	static public function ctrRangoFechasConductor($fechaInicial, $fechaFinal){

		$tabla = "conductores";

		$respuesta = ModeloConductor::mdlRangoFechasConductor($tabla, $fechaInicial, $fechaFinal);

		return $respuesta;

	}

	/*=============================================
	Historial
	=============================================*/
	public function ctrDescargarReporteHistorial(){

		  $fechaini=$_GET["fechaInicial"];
          $fechafin=$_GET["fechaFinal"];


         // echo $fechaini;
          //echo $fechafin;

		if(isset($_GET["reporte"])){

			//$tablas = "conductores";


			if(isset($fechaini) && isset($fechafin)){
				$conductores = ModeloConductor::mdlRangoFechasConductorHistorial($fechaini, $fechafin);
			//var_dump($conductores);


			}else{

				$item = null;
				$valor = null;

				$conductores = ModeloConductor::mdlMostrarConductorHistorial($item, $valor);


			}


			/*=============================================
			CREAMOS EL ARCHIVO DE EXCEL
			=============================================*/

			$Name = $_GET["reporte"].'.xls';
 			//echo "<script> alert('excel');</script>";
			header('Expires: 0');
			header('Cache-control: private');
			header("Content-type: application/vnd.ms-excel"); // Archivo de Excel
			header("Cache-Control: cache, must-revalidate");
			header('Content-Description: File Transfer');
			header('Last-Modified: '.date('D, d M Y H:i:s'));
			header("Pragma: public");
			header('Content-Disposition:; filename="'.$Name.'"');
			header("Content-Transfer-Encoding: binary");

			echo utf8_decode("<table border='0'>

					<tr>
					<td style='font-weight:bold; border:1px solid #eee;'>FECHA ACTUALIZADO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>DNI</td>
					<td style='font-weight:bold; border:1px solid #eee;'>NOMBRE</td>
					<td style='font-weight:bold; border:1px solid #eee;'>PLACA</td>
					<td style='font-weight:bold; border:1px solid #eee;'>ANTECEDENTES PENALES</td>
					<td style='font-weight:bold; border:1px solid #eee;'>ANTECEDENTES JUDICIAL</td>
					<td style='font-weight:bold; border:1px solid #eee;'>ANTECEDENTES POLICIAL</td>
					<td style='font-weight:bold; border:1px solid #eee;'>RECORD CONDUCTOR</td>
					<td style='font-weight:bold; border:1px solid #eee;'>RESULTADO</td
					<td style='font-weight:bold; border:1px solid #eee;'>SOAT</td>
					<td style='font-weight:bold; border:1px solid #eee;'>FECHA DE INICIO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>FECHA DE FIN</td>
					<td style='font-weight:bold; border:1px solid #eee;'>OBSERVACION</td>
					<td style='font-weight:bold; border:1px solid #eee;'>EMPRESA</td>


					</tr>");

			foreach ($conductores as $row => $value){


                    $cabify = "cabify";

			 echo utf8_decode("<tr>
			 			<td style='border:1px solid #eee;'>".$value["fecha"]."</td>
			 			<td style='border:1px solid #eee;'>".$value["dni"]."</td>
			 			<td style='border:1px solid #eee;'>".$value["nombre"]."</td>
			 			<td style='border:1px solid #eee;'>".$value["placa"]."</td>
			 			<td style='border:1px solid #eee;'>".$value["ant_penales"]."</td>
			 			<td style='border:1px solid #eee;'>".$value["ant_judicial"]."</td>
			 			<td style='border:1px solid #eee;'>".$value["ant_policial"]."</td>
			 			<td style='border:1px solid #eee;'>".$value["record_cond"]."</td>
			 			<td style='border:1px solid #eee;'>".$value["resultado"]."</td>
			 			<td style='border:1px solid #eee;'>".$value["soat"]."</td>
			 			<td style='border:1px solid #eee;'>".$value["fecha_inicio_soat"]."</td>
			 			<td style='border:1px solid #eee;'>".$value["fecha_fin_soat"]."</td>
						<td style='border:1px solid #eee;'>".$value["observacion"]."</td>
						<td style='border:1px solid #eee;'>".$cabify."</td>


			 			</tr>");

			 	}

			echo "</table>";



	}



}


	/*=============================================
	RANGO FECHAS
	=============================================*/

	static public function ctrRangoFechasConductorHistorial($fechaInicial, $fechaFinal){

		$tabla = "conductores";

		$respuesta = ModeloConductor::mdlRangoFechasConductorHistorial($fechaInicial, $fechaFinal);
		//var_dump($respuesta);
		return $respuesta;

	}




	/*=============================================
	Provincia
	=============================================*/
	public function ctrDescargarReporteProvincia(){

		  $fechaini=$_GET["fechaInicial"];
          $fechafin=$_GET["fechaFinal"];
          $provincia=$_GET["provincia"];


         // echo $fechaini;
          //echo $fechafin;

		if(isset($_GET["reporte"])){

			//$tablas = "conductores";


			if(isset($fechaini) && isset($fechafin)){
				$conductores = ModeloConductor::mdlRangoFechasConductorProvincia($fechaini, $fechafin, $provincia);
			//var_dump($conductores);


			}else{

				$item = null;
				$valor = null;

				$conductores = ModeloConductor::mdlMostrarConductorProvincia($item, $valor, $provincia);


			}


			/*=============================================
			CREAMOS EL ARCHIVO DE EXCEL
			=============================================*/

			$Name = $_GET["reporte"].'.xls';
 			//echo "<script> alert('excel');</script>";
			header('Expires: 0');
			header('Cache-control: private');
			header("Content-type: application/vnd.ms-excel"); // Archivo de Excel
			header("Cache-Control: cache, must-revalidate");
			header('Content-Description: File Transfer');
			header('Last-Modified: '.date('D, d M Y H:i:s'));
			header("Pragma: public");
			header('Content-Disposition:; filename="'.$Name.'"');
			header("Content-Transfer-Encoding: binary");

			echo utf8_decode("<table border='0'>

					<tr>
					<td style='font-weight:bold; border:1px solid #eee;'>FECHA DE REGISTRO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>PROVINCIA</td>
					<td style='font-weight:bold; border:1px solid #eee;'>DNI</td>
					<td style='font-weight:bold; border:1px solid #eee;'>NOMBRE</td>
					<td style='font-weight:bold; border:1px solid #eee;'>APELLIDO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>PLACA</td>
					<td style='font-weight:bold; border:1px solid #eee;'>ANTECEDENTES PENALES</td>
					<td style='font-weight:bold; border:1px solid #eee;'>ANTECEDENTES JUDICIAL</td>
					<td style='font-weight:bold; border:1px solid #eee;'>ANTECEDENTES POLICIAL</td>
					<td style='font-weight:bold; border:1px solid #eee;'>RECORD CONDUCTOR</td>
					<td style='font-weight:bold; border:1px solid #eee;'>RESULTADO</td
					<td style='font-weight:bold; border:1px solid #eee;'>SOAT</td>
					<td style='font-weight:bold; border:1px solid #eee;'>FECHA DE INICIO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>FECHA DE FIN</td>
					<td style='font-weight:bold; border:1px solid #eee;'>OBSERVACION</td>
					<td style='font-weight:bold; border:1px solid #eee;'>EMPRESA</td>


					</tr>");

			foreach ($conductores as $row => $value){

				$cabify = $value["cabify"];
                $easytaxi = $value["easytaxi"];

                if ($cabify == '1' && $easytaxi == 1) {
                    $cabify= "Cabify <br> Easytaxi";
                }else if ($easytaxi == 1 && $cabify == 0) {
                    $cabify= "easytaxi";
                }else if ($easytaxi == 0 && $cabify == 1) {
                    $cabify = "cabify";
                }else if ($easytaxi == 0 && $cabify == 0) {
                    $cabify = "";
                }

			 echo utf8_decode("<tr>
			 			<td style='border:1px solid #eee;'>".$value["fecha"]."</td>
			 			<td style='border:1px solid #eee;'>".$value["descripcion"]."</td>
			 			<td style='border:1px solid #eee;'>".$value["dni"]."</td>
			 			<td style='border:1px solid #eee;'>".$value["nombre"]."</td>
			 			<td style='border:1px solid #eee;'>".$value["apellido"]."</td>
			 			<td style='border:1px solid #eee;'>".$value["placa"]."</td>
			 			<td style='border:1px solid #eee;'>".$value["ant_penales"]."</td>
			 			<td style='border:1px solid #eee;'>".$value["ant_judicial"]."</td>
			 			<td style='border:1px solid #eee;'>".$value["ant_policial"]."</td>
			 			<td style='border:1px solid #eee;'>".$value["record_cond"]."</td>
			 			<td style='border:1px solid #eee;'>".$value["resultado"]."</td>
			 			<td style='border:1px solid #eee;'>".$value["soat"]."</td>
			 			<td style='border:1px solid #eee;'>".$value["fecha_inicio_soat"]."</td>
			 			<td style='border:1px solid #eee;'>".$value["fecha_fin_soat"]."</td>
						<td style='border:1px solid #eee;'>".$value["observacion"]."</td>
						<td style='border:1px solid #eee;'>".$cabify."</td>


			 			</tr>");

			 	}

			echo "</table>";



	}



}

	/*=============================================
	RANGO FECHAS
	=============================================*/

	static public function ctrRangoFechasConductorProvincia($fechaInicial, $fechaFinal, $provincia){


		$respuesta = ModeloConductor::mdlRangoFechasConductorProvincia($fechaInicial, $fechaFinal, $provincia);
		//var_dump($respuesta);
		return $respuesta;

	}


	/*=============================================
	MOSTRAR Conductores
	=============================================*/


	static public function ctrMostrarConductorMes($item2, $valor2){

		$tabla = "conductores";

		$respuesta = ModeloConductor::mdlMostrarConductoresMes($tabla, $item2, $valor2);

		return $respuesta;

	}

	static public function ctrMostrarConductorhoy($item, $valor){

	$tabla = "conductores";

	$respuesta = ModeloConductor::mdlMostrarConductorhoy($tabla, $item, $valor);

	return $respuesta;
	}
	/*=============================================
	MOSTRAR Conductores
	=============================================*/


	static public function ctrMostrarConductorMesCabify($item2, $valor2){

		$tabla = "conductores";

		$respuesta = ModeloConductor::mdlMostrarConductoresMesCabify($tabla, $item2, $valor2);

		return $respuesta;

	}

	static public function ctrMostrarConductorhoyCabify($item, $valor){

	$tabla = "conductores";


	$respuesta = ModeloConductor::mdlMostrarConductorhoyCabify($tabla, $item, $valor);

	return $respuesta;
	}

/*=============================================
	MOSTRAR Conductores act
	=============================================*/


	static public function ctrMostrarConductoractcbf($item2, $valor2){

		$tabla = "conductores";

		$respuesta = ModeloConductor::mdlMostrarConductoresactcbf($tabla, $item2, $valor2);

		return $respuesta;

	}

	static public function ctrMostrarConductoracteasy($item, $valor){

	$tabla = "conductores";


	$respuesta = ModeloConductor::mdlMostrarConductoracteasy($tabla, $item, $valor);

	return $respuesta;
	}

	/*=============================================
	MOSTRAR Conductores
	=============================================*/


	static public function ctrMostrarConductorMesCabifyact($item2, $valor2){

		$tabla = "conductores";

		$respuesta = ModeloConductor::mdlMostrarConductoresMesCabify($tabla, $item2, $valor2);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR Conductores
	=============================================*/


	static public function ctrMostrarConductormigradosmescbf($item2, $valor2){

		$tabla = "conductores";

		$respuesta = ModeloConductor::mdlMostrarConductoresmigradosmescbf($tabla, $item2, $valor2);

		return $respuesta;

	}
	/*=============================================
	MOSTRAR Conductores
	=============================================*/


	static public function ctrMostrarConductormigradosmesanteriorcbf($item2, $valor2){

		$tabla = "conductores";

		$respuesta = ModeloConductor::mdlMostrarConductoresmigradosmesanteriorcbf($tabla, $item2, $valor2);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR Conductores
	=============================================*/


	static public function ctrMostrarConductormigradosmeseasy($item2, $valor2){

		$tabla = "conductores";

		$respuesta = ModeloConductor::mdlMostrarConductoresmigradosmeseasy($tabla, $item2, $valor2);

		return $respuesta;

	}
	/*=============================================
	MOSTRAR Conductores
	=============================================*/


	static public function ctrMostrarConductormigradosmesanterioreasy($item2, $valor2){

		$tabla = "conductores";

		$respuesta = ModeloConductor::mdlMostrarConductoresmigradosmesanterioreasy($tabla, $item2, $valor2);

		return $respuesta;

	}
	static public function ctrMostrarConductorhoyCabifyact($item, $valor){

	$tabla = "conductores";

	$respuesta = ModeloConductor::mdlMostrarConductorhoyCabify($tabla, $item, $valor);

	return $respuesta;
	}

	/*=============================================
	MOSTRAR Conductores
	=============================================*/


	static public function ctrMostrarConductorMesEasyact($item2, $valor2){

		$tabla = "conductores";

		$respuesta = ModeloConductor::mdlMostrarConductoresMesEasyact($tabla, $item2, $valor2);

		return $respuesta;

	}

	static public function ctrMostrarConductorhoyeasyact($item, $valor){

	$tabla = "conductores";

	$respuesta = ModeloConductor::mdlMostrarConductorhoyEasyact($tabla, $item, $valor);

	return $respuesta;
	}

	/*=============================================
	MOSTRAR Conductores
	=============================================*/


	static public function ctrMostrarConductorMesEasy($item2, $valor2){

		$tabla = "conductores";

		$respuesta = ModeloConductor::mdlMostrarConductoresMesEasy($tabla, $item2, $valor2);

		return $respuesta;

	}

	static public function ctrMostrarConductorhoyEasy($item, $valor){

	$tabla = "conductores";

	$respuesta = ModeloConductor::mdlMostrarConductorhoyEasy($tabla, $item, $valor);

	return $respuesta;
	}

	/*=============================================
	MOSTRAR Conductores
	=============================================*/


	static public function ctrMostrarConductorMesact($item2, $valor2){

		$tabla = "conductores";

		$respuesta = ModeloConductor::mdlMostrarConductoresMesact($tabla, $item2, $valor2);

		return $respuesta;

	}

	static public function ctrMostrarConductorhoyact($item, $valor){

	$tabla = "conductores";

	$respuesta = ModeloConductor::mdlMostrarConductorhoyact($tabla, $item, $valor);

	return $respuesta;
	}

	/*=============================================
	MOSTRAR Conductores
	=============================================*/


	static public function ctrMostrarConductorMesactcbf($item2, $valor2){

		$tabla = "conductores";

		$respuesta = ModeloConductor::mdlMostrarConductoresMesactcbf($tabla, $item2, $valor2);

		return $respuesta;

	}

	/*static public function ctrMostrarConductorhoyactcbf($item, $valor){

	$tabla = "conductores";

	$respuesta = ModeloConductor::mdlMostrarConductorhoyactcbf($tabla, $item, $valor);

	return $respuesta;
	}*/




	/*=============================================
	MOSTRAR 1 Conductores
	=============================================*/


	static public function ctrMostrarunConductor($item2, $valor2, $idconductor){

		$tabla = "conductores";

		$respuesta = ModeloConductor::mdlMostrarunConductor($tabla, $item2, $valor2, $idconductor);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR 1 Conductores
	=============================================*/


	static public function ctrMostrarunConductorHistorial($item2, $valor2, $idconductor){


		$respuesta = ModeloConductor::mdlMostrarunConductorHistorial($item2, $valor2, $idconductor);

		return $respuesta;

	}

	static public function ctrMostrarSoatConductor($item, $valor){

		$tabla = "conductores";

		$respuesta = ModeloConductor::mdlMostrarSoatConductor($tabla, $item, $valor);

		return $respuesta;

	}

	static public function ctrMostrarConductorsoatvencido($item, $valor){

		$tabla = "conductores";

		$respuesta = ModeloConductor::mdlMostrarSoatConductorvencido($tabla, $item, $valor);

		return $respuesta;

	}


}



