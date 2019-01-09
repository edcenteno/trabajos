<?php
session_start();
class ControladorPersonas{

	/*=============================================
	MOSTRAR USUARIO
	=============================================*/

	public function ctrMostrarPersonas($item = null, $valor=null){

		$respuesta = new ModeloPersonas();


		return $respuesta;
	}

	/*=============================================
	MOSTRAR USUARIO
	=============================================*/

	public function ctrMostrarPersonasProvincia(){

		 $provincia = $_SESSION["id_provincia"];

		$respuesta = ModeloPersonas::mdlMostrarPersonasProvincia($provincia);

		return $respuesta;
	}

	/*=============================================
	MOSTRAR USUARIO
	=============================================*/

	public function ctrMostrarPersonasHistorial($item, $valor){

		$respuesta = ModeloPersonas::mdlMostrarPersonasHistorial($item, $valor);

		return $respuesta;
	}

	/*=============================================
	MOSTRAR USUARIO
	=============================================*/

	public function ctrMostrarPersonasact($item, $valor){

		$tabla = "Personases_act";

		$respuesta = ModeloPersonas::mdlMostrarPersonasact($tabla, $item, $valor);

		return $respuesta;
	}


	/*=============================================
	DESCARGAR EXCEL
	=============================================*/

	public function ctrDescargarReporte(){

		  $fechaini=$_GET["fechaInicial"];
          $fechafin=$_GET["fechaFinal"];


		if(isset($_GET["reporte"])){

			$tablas = "Personases";


			if(isset($fechaini) && isset($fechafin)){
				$Personases = ModeloPersonas::mdlRangoFechasPersonas($fechaini, $fechafin);


			}else{

				$item = null;
				$valor = null;

				$Personases = ModeloPersonas::mdlMostrarPersonas($item, $valor);

			}


			/*=============================================
			CREAMOS EL ARCHIVO DE EXCEL
			=============================================*/

			$Name = $_GET["reporte"].'.xls';

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
					<td style='font-weight:bold; border:1px solid #eee;'>RECORD Personas</td>
					<td style='font-weight:bold; border:1px solid #eee;'>RESULTADO</td
					<td style='font-weight:bold; border:1px solid #eee;'>SOAT</td>
					<td style='font-weight:bold; border:1px solid #eee;'>FECHA DE INICIO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>FECHA DE FIN</td>
					<td style='font-weight:bold; border:1px solid #eee;'>OBSERVACION</td>
					<td style='font-weight:bold; border:1px solid #eee;'>EMPRESA</td>


					</tr>");

			foreach ($Personases as $row => $value){

				$cabify = $value->cabify;
                $easytaxi = $value->easytaxi;

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
			 			<td style='border:1px solid #eee;'>".$value->fecha."</td>
			 			<td style='border:1px solid #eee;'>".$value->dni."</td>
			 			<td style='border:1px solid #eee;'>".$value->nombre."</td>
			 			<td style='border:1px solid #eee;'>".$value->apellido."</td>
			 			<td style='border:1px solid #eee;'>".$value->placa."</td>
			 			<td style='border:1px solid #eee;'>".$value->ant_penales."</td>
			 			<td style='border:1px solid #eee;'>".$value->ant_judicial."</td>
			 			<td style='border:1px solid #eee;'>".$value->ant_policial."</td>
			 			<td style='border:1px solid #eee;'>".$value->record_cond."</td>
			 			<td style='border:1px solid #eee;'>".$value->resultado."</td>
			 			<td style='border:1px solid #eee;'>".$value->soat."</td>
			 			<td style='border:1px solid #eee;'>".$value->fecha_inicio_soat."</td>
			 			<td style='border:1px solid #eee;'>".$value->fecha_fin_soat."</td>
						<td style='border:1px solid #eee;'>".$value->observacion."</td>
						<td style='border:1px solid #eee;'>".$cabify."</td>


			 			</tr>");

			 	}

			echo "</table>";

	}



}

	/*=============================================
	RANGO FECHAS
	=============================================*/

	public function ctrRangoFechasPersonas($fechaInicial, $fechaFinal){

		$tabla = "Personases";

		$respuesta = ModeloPersonas::mdlRangoFechasPersonas($fechaInicial, $fechaFinal);

		return $respuesta;

	}

	/*=============================================
	Historial
	=============================================*/
	public function ctrDescargarReporteHistorial(){

		  @$fechaini=$_GET["fechaInicial"];
          @$fechafin=$_GET["fechaFinal"];

		if(isset($_GET["reporte"])){



			if(isset($fechaini) && isset($fechafin)){
				$Personases = ModeloPersonas::mdlRangoFechasPersonasHistorial($fechaini, $fechafin);
			}else{

				$Personases = ModeloPersonas::mdlMostrarPersonasHistorialexcel();


			}


			/*=============================================
			CREAMOS EL ARCHIVO DE EXCEL
			=============================================*/

			$Name = $_GET["reporte"].'.xls';

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
					<td style='font-weight:bold; border:1px solid #eee;'>RECORD Personas</td>
					<td style='font-weight:bold; border:1px solid #eee;'>RESULTADO</td
					<td style='font-weight:bold; border:1px solid #eee;'>SOAT</td>
					<td style='font-weight:bold; border:1px solid #eee;'>FECHA DE INICIO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>FECHA DE FIN</td>
					<td style='font-weight:bold; border:1px solid #eee;'>OBSERVACION</td>
					<td style='font-weight:bold; border:1px solid #eee;'>EMPRESA</td>


					</tr>");

			foreach ($Personases as $row => $value){


                    $cabify = "cabify";

			 echo utf8_decode("<tr>
			 			<td style='border:1px solid #eee;'>".$value["fecha_revision"]."</td>
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

	public function ctrRangoFechasPersonasHistorial($fechaInicial, $fechaFinal){

		$respuesta = ModeloPersonas::mdlRangoFechasPersonasHistorial($fechaInicial, $fechaFinal);

		return $respuesta;

	}




	/*=============================================
	Provincia
	=============================================*/
	public function ctrDescargarReporteProvincia(){

		  $fechaini=$_GET["fechaInicial"];
          $fechafin=$_GET["fechaFinal"];
          $provincia=$_GET["provincia"];


		if(isset($_GET["reporte"])){



			if(isset($fechaini) && isset($fechafin)){
				$Personases = ModeloPersonas::mdlRangoFechasPersonasProvincia($fechaini, $fechafin, $provincia);

			}else{

				$item = null;
				$valor = null;

				$Personases = ModeloPersonas::mdlMostrarPersonasProvincia($item, $valor, $provincia);

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
					<td style='font-weight:bold; border:1px solid #eee;'>RECORD Personas</td>
					<td style='font-weight:bold; border:1px solid #eee;'>RESULTADO</td
					<td style='font-weight:bold; border:1px solid #eee;'>SOAT</td>
					<td style='font-weight:bold; border:1px solid #eee;'>FECHA DE INICIO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>FECHA DE FIN</td>
					<td style='font-weight:bold; border:1px solid #eee;'>OBSERVACION</td>
					<td style='font-weight:bold; border:1px solid #eee;'>EMPRESA</td>


					</tr>");

			foreach ($Personases as $row => $value){

				$cabify = $value->cabify;
                $easytaxi = $value->easytaxi;

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
			 			<td style='border:1px solid #eee;'>".$value->fecha."</td>
			 			<td style='border:1px solid #eee;'>".$value->descripcion."</td>
			 			<td style='border:1px solid #eee;'>".$value->dni."</td>
			 			<td style='border:1px solid #eee;'>".$value->nombre."</td>
			 			<td style='border:1px solid #eee;'>".$value->apellido."</td>
			 			<td style='border:1px solid #eee;'>".$value->placa."</td>
			 			<td style='border:1px solid #eee;'>".$value->ant_penales."</td>
			 			<td style='border:1px solid #eee;'>".$value->ant_judicial."</td>
			 			<td style='border:1px solid #eee;'>".$value->ant_policial."</td>
			 			<td style='border:1px solid #eee;'>".$value->record_cond."</td>
			 			<td style='border:1px solid #eee;'>".$value->resultado."</td>
			 			<td style='border:1px solid #eee;'>".$value->soat."</td>
			 			<td style='border:1px solid #eee;'>".$value->fecha_inicio_soat."</td>
			 			<td style='border:1px solid #eee;'>".$value->fecha_fin_soat."</td>
						<td style='border:1px solid #eee;'>".$value->observacion."</td>
						<td style='border:1px solid #eee;'>".$cabify."</td>


			 			</tr>");

			 	}

			echo "</table>";



	}



}

	/*=============================================
	RANGO FECHAS
	=============================================*/

	public function ctrRangoFechasPersonasProvincia($fechaInicial, $fechaFinal, $provincia){


		$respuesta = ModeloPersonas::mdlRangoFechasPersonasProvincia($fechaInicial, $fechaFinal, $provincia);
		//var_dump($respuesta);
		return $respuesta;

	}


	/*=============================================
	MOSTRAR Personases
	=============================================*/


	public function ctrMostrarPersonasMes($item2, $valor2){

		$respuesta = ModeloPersonas::mdlMostrarPersonasesMes($item2, $valor2);

		return $respuesta;

	}

	public function ctrMostrarPersonashoy($item, $valor){


	$respuesta = ModeloPersonas::mdlMostrarPersonashoy($item, $valor);

	return $respuesta;
	}
	/*=============================================
	MOSTRAR Personases
	=============================================*/


	public function ctrMostrarPersonasMesCabify($item2, $valor2){

		$tabla = "Personases";

		$respuesta = ModeloPersonas::mdlMostrarPersonasesMesCabify($tabla, $item2, $valor2);

		return $respuesta;

	}

	public function ctrMostrarPersonashoyCabify($item, $valor){


	$respuesta = ModeloPersonas::mdlMostrarPersonashoyCabify($item, $valor);

	return $respuesta;
	}

/*=============================================
	MOSTRAR Personases act
	=============================================*/


	public function ctrMostrarPersonasactcbf($item2, $valor2){

		$tabla = "Personases";

		$respuesta = ModeloPersonas::mdlMostrarPersonasesactcbf($tabla, $item2, $valor2);

		return $respuesta;

	}

	public function ctrMostrarPersonasacteasy($item, $valor){

	$tabla = "Personases";


	$respuesta = ModeloPersonas::mdlMostrarPersonasacteasy($tabla, $item, $valor);

	return $respuesta;
	}

	/*=============================================
	MOSTRAR Personases
	=============================================*/


	public function ctrMostrarPersonasMesCabifyact($item2, $valor2){

		$tabla = "Personases";

		$respuesta = ModeloPersonas::mdlMostrarPersonasesMesCabify($tabla, $item2, $valor2);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR Personases
	=============================================*/


	public function ctrMostrarPersonasmigradosmescbf($item2, $valor2){

		$tabla = "Personases";

		$respuesta = ModeloPersonas::mdlMostrarPersonasesmigradosmescbf($tabla, $item2, $valor2);

		return $respuesta;

	}
	/*=============================================
	MOSTRAR Personases
	=============================================*/


	public function ctrMostrarPersonasmigradosmesanteriorcbf($item2, $valor2){

		$tabla = "Personases";

		$respuesta = ModeloPersonas::mdlMostrarPersonasesmigradosmesanteriorcbf($tabla, $item2, $valor2);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR Personases
	=============================================*/


	public function ctrMostrarPersonasmigradosmeseasy($item2, $valor2){

		$tabla = "Personases";

		$respuesta = ModeloPersonas::mdlMostrarPersonasesmigradosmeseasy($tabla, $item2, $valor2);

		return $respuesta;

	}
	/*=============================================
	MOSTRAR Personases
	=============================================*/


	public function ctrMostrarPersonasmigradosmesanterioreasy($item2, $valor2){

		$tabla = "Personases";

		$respuesta = ModeloPersonas::mdlMostrarPersonasesmigradosmesanterioreasy($tabla, $item2, $valor2);

		return $respuesta;

	}
	public function ctrMostrarPersonashoyCabifyact($item, $valor){

	$tabla = "Personases";

	$respuesta = ModeloPersonas::mdlMostrarPersonashoyCabify($tabla, $item, $valor);

	return $respuesta;
	}

	/*=============================================
	MOSTRAR Personases
	=============================================*/


	public function ctrMostrarPersonasMesEasyact($item2, $valor2){

		$tabla = "Personases";

		$respuesta = ModeloPersonas::mdlMostrarPersonasesMesEasyact($tabla, $item2, $valor2);

		return $respuesta;

	}

	public function ctrMostrarPersonashoyeasyact($item, $valor){

	$tabla = "Personases";

	$respuesta = ModeloPersonas::mdlMostrarPersonashoyEasyact($tabla, $item, $valor);

	return $respuesta;
	}

	/*=============================================
	MOSTRAR Personases
	=============================================*/


	public function ctrMostrarPersonasMesEasy($item2, $valor2){

		$tabla = "Personases";

		$respuesta = ModeloPersonas::mdlMostrarPersonasesMesEasy($tabla, $item2, $valor2);

		return $respuesta;

	}

	public function ctrMostrarPersonashoyEasy($item, $valor){

	$tabla = "Personases";

	$respuesta = ModeloPersonas::mdlMostrarPersonashoyEasy($tabla, $item, $valor);

	return $respuesta;
	}

	/*=============================================
	MOSTRAR Personases
	=============================================*/


	public function ctrMostrarPersonasMesact($item2, $valor2){

		$tabla = "Personases";

		$respuesta = ModeloPersonas::mdlMostrarPersonasesMesact($tabla, $item2, $valor2);

		return $respuesta;

	}

	public function ctrMostrarPersonashoyact($item, $valor){

	$tabla = "Personases";

	$respuesta = ModeloPersonas::mdlMostrarPersonashoyact($tabla, $item, $valor);

	return $respuesta;
	}

	/*=============================================
	MOSTRAR Personases
	=============================================*/


	public function ctrMostrarPersonasMesactcbf($item2, $valor2){

		$tabla = "Personases";

		$respuesta = ModeloPersonas::mdlMostrarPersonasesMesactcbf($tabla, $item2, $valor2);

		return $respuesta;

	}



	/*=============================================
	MOSTRAR 1 Personases
	=============================================*/


	public function ctrMostrarunPersonasHistorial($item2, $valor2, $idPersonas){


		$respuesta = ModeloPersonas::mdlMostrarunPersonasHistorial($item2, $valor2, $idPersonas);

		return $respuesta;

	}

	public function ctrMostrarSoatPersonas($item, $valor){

		$tabla = "Personases";

		$respuesta = ModeloPersonas::mdlMostrarSoatPersonas($tabla, $item, $valor);

		return $respuesta;

	}

	public function ctrMostrarPersonassoatvencido(){

		$respuesta = ModeloPersonas::mdlMostrarSoatPersonasvencido();

		return $respuesta;

	}


}



