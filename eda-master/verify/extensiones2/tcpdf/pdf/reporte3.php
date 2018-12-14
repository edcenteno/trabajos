<?php

require_once "../../../controladores/conductores.controlador.php";
require_once "../../../modelos/conductores.modelo.php";
//$idconductor=0;
 	$idconductor = $_GET['idconductor'];
    $item = null;
    $valor = null;
require 'vendor/autoload.php';
require "phpqrcode/qrlib.php";
$dir = 'temp/';

	//Si no existe la carpeta la creamos
	if (!file_exists($dir))
        mkdir($dir);

        //Declaramos la ruta y nombre del archivo a generar
	$filename = $dir.'test.png';

        //Parametros de Condiguración

	$tamaño = 2; //Tamaño de Pixel
	$level = 'L'; //Precisión Baja
	$framSize = 3; //Tamaño en blanco
	$contenido = "https://arhuantecedentes.com/elitecbf/extensiones/tcpdf/pdf/reporte.php?idconductor=$idconductor"; //Texto

        //Enviamos los parametros a la Función para generar código QR
	QRcode::png($contenido, $filename, $level, $tamaño, $framSize);

        //Mostramos la imagen generada
	$qr ='<img src="'.$dir.basename($filename).'" /><hr/>';


    $unconductor = ControladorConductor::ctrMostrarunConductor($item, $valor, $idconductor);
    //var_dump($unconductor);
    foreach ($unconductor as $key => $value){
	$foto = $value['foto'];
	if ($foto == "") {
		$foto = "conductor.jpg";
	}

   if ($value['blacklist'] == 0) {
      $bl="No se encuentra en lista negra";
    } else {
      $bl="Si se encuentra en lista negra";
    }

	if ($value['nombrecompania']== "Mapfre PerÃº") {
	$seguro = '<img width="120" src="images/soat/mapfre.png">';
	}

	if ($value['nombrecompania']== "La Positiva") {
	$seguro = '<img width="120" src="images/soat/lapositiva.png">';
	}

	if ($value['nombrecompania']== "Interseguro") {
	$seguro = '<img width="120" src="images/soat/interbank.png">';
	}
	if ($value['nombrecompania']== "INTERSEGURO") {
	$seguro = '<img width="120" src="images/soat/interbank.png">';
	}

	if ($value['nombrecompania']== "Pacifico Seguros") {
	$seguro = '<img width="120" src="images/soat/pacifico.png">';
	}
	if ($value['nombrecompania']== "Mapfre Perú") {
	$seguro = '<img width="120" src="images/soat/mapfre.png">';
	}
	if ($value['nombrecompania']== "Rimac Seguros") {
    $seguro = '<img width="120" src="images/soat/rimac.png">';
	}
	if ($value['nombrecompania']== "Bnp Paribas Cardif") {
        echo '<img width="120" src="vistas/img/plantilla/bnpparibascardif.png">';
    }
    if ($value['nombrecompania']== "Protecta") {
        echo '<img width="120" src="vistas/img/plantilla/protecta.png">';
    }

    $record = $value['record_cond'];

	$client = new GuzzleHttp\Client();
	$res = $client->request('GET', 'https://captcharh.ddns.net/api/record/principal/'.$idconductor);
	$res->getStatusCode();
	$res->getHeader('content-type');

	if(!is_object($res)) {
	}else{
	$arr = json_decode($res->getBody(), true);
	}


	//var_dump($arr);
	$direccion = $arr[0]['var_direccion'];
	$provincia = $arr[0]['var_provincia'];
	$distrito = $arr[0]['var_distrito'];
	$estado_licencia = $arr[0]['var_estado_licencia'];
	$dat_fecha_expedicion = $arr[0]['dat_fecha_expedicion'];
	$dat_fecha_revalidacion = $arr[0]['dat_fecha_revalidacion'];
	$var_restricciones1 = $arr[0]['var_restricciones1'];
	$var_num_licencia = $arr[0]['var_num_licencia'];


	$res = $client->request('GET', 'https://captcharh.ddns.net/api/record/multas/'.$idconductor);
	$res->getStatusCode();

	$res->getHeader('content-type');

	$arrmultas = json_decode($res->getBody(), true);


	$placa = $value['placa'];

	$client = new GuzzleHttp\Client();
	$res = $client->request('GET', 'https://captcharh.ddns.net/api/record/placa/'.$placa);
	$res->getStatusCode();
	$res->getHeader('content-type');

	if(!is_object($res)) {
	}else{
	$veh = json_decode($res->getBody(), true);
	}
	/*echo "<pre>";
	var_dump($veh['Vin']);*/

	$continent=$veh['Vin']['continent'];
	$countries=$veh['Vin']['countries'];
	$modelYear=$veh['Vin']['modelYear'];
	$manufacture=$veh['Vin']['manufacture'];

require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->startPageGroup();

$pdf->AddPage();
// Image example with resizing
//$pdf->Image('images/confidencial.png', -10, -10, 250, 175, 'PNG');
if ($value['cabify'] == '1') {
	$pdf->Image('images/conductorescbf/'.$foto.'', 35, 80, 45, 45, 'JPG');
} if ($value['easytaxi'] == '1') {
	$pdf->Image('images/conductores/'.$foto.'', 35, 80, 45, 45, 'JPG');
}

$pdf->SetAuthor('Edgar Centeno');
//$img_file = K_PATH_IMAGES.'images/confidencial.png';



// ---------------------------------------------------------

$bloque1 = <<<EOF

	<table border="0">

		<tr>

			<td style="width:150px"><img src="images/arhuint.jpg"></td>

			<td style="background-color:white; width:140px">


			</td>

			<td style="background-color:white; width:140px">



			</td>

			<td style="background-color:white; width:110px; text-align:center; color:black"><br><br><b>

			$value[secuencia_arhu_ant]
			</b></td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque1, false, false, false, false, '');

// ---------------------------------------------------------

$bloque2 = <<<EOF

	<table>

		<tr>

			<td style="width:540px"><img src="images/back.jpg"></td>

		</tr>

	</table>

	<table style="font-size:10px; padding:5px 10px;">

		<tr>

			<td style="border: 3px solid #5b9bd4; background-color:white; width:540px" align="center">

				DATOS DEL POSTULANTE: <b> $value[nombre] $value[apellido] </b>

			</td>



		</tr>


	</table>
<br><br>

EOF;

$pdf->writeHTML($bloque2, false, false, false, false, '');

// ---------------------------------------------------------

$bloque3 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>

			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:260px; text-align:center"></td>
			<td style="border: 1px solid #666; background-color:white; width:130px; text-align:center">PRENOMBRES</td>
			<td style="border: 1px solid #666; background-color:white; width:130px; text-align:center"><b>$value[nombre] </b></td>

		</tr>

		<tr>

			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:260px; text-align:center"></td>
			<td style="border: 1px solid #666; background-color:white; width:130px; text-align:center">APELLIDOS</td>
			<td style="border: 1px solid #666; background-color:white; width:130px; text-align:center"><b>$value[apellido]</b></td>

		</tr>


		<tr>

			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:260px; text-align:center"></td>
			<td style="border: 1px solid #666; background-color:white; width:130px; text-align:center">DNI</td>
			<td style="border: 1px solid #666; background-color:white; width:130px; text-align:center"><b>$value[dni]</b></td>

		</tr>

		<tr>

			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:260px; text-align:center"></td>
			<td style="border: 1px solid #666; background-color:white; width:130px; text-align:center">FECHA DE NACIMIENTO</td>
			<td style="border: 1px solid #666; background-color:white; width:130px; text-align:center"><b>$value[fecha_nacimiento]</b></td>

		</tr>

		<tr>

			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:260px; text-align:center"></td>
			<td style="border: 1px solid #666; background-color:white; width:130px; text-align:center">DEPARTAMENTO</td>
			<td style="border: 1px solid #666; background-color:white; width:130px; text-align:center"><b>$direccion</b></td>

		</tr>

		<tr>

			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:260px; text-align:center"></td>
			<td style="border: 1px solid #666; background-color:white; width:130px; text-align:center">PROVINCIA</td>
			<td style="border: 1px solid #666; background-color:white; width:130px; text-align:center"><b>$provincia</b></td>

		</tr>

		<tr>

			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:260px; text-align:center"></td>
			<td style="border: 1px solid #666; background-color:white; width:130px; text-align:center">DISTRITO</td>
			<td style="border: 1px solid #666; background-color:white; width:130px; text-align:center"><b>$distrito</b></td>

		</tr>

		<tr>

			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:260px; text-align:center"></td>
			<td style="border: 1px solid #666; background-color:white; width:130px; text-align:center">DIRECCION</td>
			<td style="border: 1px solid #666; background-color:white; width:130px; text-align:center"><b>$direccion</b></td>

		</tr>



	</table>

EOF;



// ---------------------------------------------------------

$bloque3extr = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>

			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:260px; text-align:center"></td>
			<td style="border: 1px solid #666; background-color:white; width:130px; text-align:center">PRENOMBRES</td>
			<td style="border: 1px solid #666; background-color:white; width:130px; text-align:center"><b>$value[nombre] </b></td>

		</tr>

		<tr>

			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:260px; text-align:center"></td>
			<td style="border: 1px solid #666; background-color:white; width:130px; text-align:center">APELLIDOS</td>
			<td style="border: 1px solid #666; background-color:white; width:130px; text-align:center"><b>$value[apellido]</b></td>

		</tr>


		<tr>

			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:260px; text-align:center"></td>
			<td style="border: 1px solid #666; background-color:white; width:130px; text-align:center">DNI</td>
			<td style="border: 1px solid #666; background-color:white; width:130px; text-align:center"><b>$value[dni]</b></td>

		</tr>

		<tr>

			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:260px; text-align:center"></td>
			<td style="border: 1px solid #666; background-color:white; width:130px; text-align:center">FECHA DE NACIMIENTO</td>
			<td style="border: 1px solid #666; background-color:white; width:130px; text-align:center"><b>$value[fecha_nacimiento]</b></td>

		</tr>


	</table>

EOF;
	//echo "<pre>";
	//var_dump($arr);
if(!is_object($res)) {
$pdf->writeHTML($bloque3extr, false, false, false, false, '');
}else{
$pdf->writeHTML($bloque3, false, false, false, false, '');
}
// ---------------------------------------------------------


// ---------------------------------------------------------

$bloque5 = <<<EOF

	<table>

		<tr>

			<td style="width:540px"><img src="images/back.jpg"></td>

		</tr>

	</table>
<br><br>
	<table style="font-size:10px; padding:5px 10px;">

		<tr>

			<td style="border: 3px solid #5b9bd4; background-color:white; width:540px" align="center">

				INFORMACION GENERAL

			</td>



		</tr>


	</table>
<br><br>

EOF;

$pdf->writeHTML($bloque5, false, false, false, false, '');

$bloque6 = <<<EOF
<br>
	<table style="font-size:10px; padding:5px 10px;">

		<tr>

			<td style="width:260px; text-align:right">ANTECEDENTES POLICIALES:</td>
			<td style="width:260px; text-align:left"><b>$value[ant_policial]</b></td>

		</tr>

		<tr>


			<td style="width:260px; text-align:right">ANTECEDENTES JUDICIALES:</td>
			<td style="width:260px; text-align:left"><b>$value[ant_judicial]</b></td>

		</tr>

		<tr>


			<td style="width:260px; text-align:right">ANTECEDENTES PENALES:</td>
			<td style="width:260px; text-align:left"><b>$value[ant_penales]</b></td>

		</tr>


	</table>
	<br><br><br><br><br><br><br>

EOF;

$pdf->writeHTML($bloque6, false, false, false, false, '');

$bloque7 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>

			<td style="width:260px; text-align:right"></td>
			<td style="width:260px; text-align:left"><b></b></td>

		</tr>

		<tr>


			<td style="width:260px; text-align:right"></td>
			<td style="width:260px; text-align:left"><b></b></td>

		</tr>

		<tr>
		<br><br>

			<td style="width:540px; text-align:center">
				<font size="8" color="#aaaaaa">Este documento no es de uso oficial, la información proporcionada en el mismo es de uso interno y
				exclusivo del tenedor.<br>
				Es confidencial incomunicable a terceros.
				Su divulgación, distribución,
				retransmisión y/o alteración, total o parcial está expresamente
				prohibida.</font>
			</td>

		</tr>


	</table>

EOF;

$pdf->writeHTML($bloque7, false, false, false, false, '');

// ---------------------------------------------------------
//
$bloque7 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>

			<td style="width:260px; text-align:right"></td>
			<td style="width:260px; text-align:left"><b></b></td>

		</tr>

		<tr>


			<td style="width:260px; text-align:right"></td>
			<td style="width:260px; text-align:left"><b></b></td>

		</tr>

		<tr>
		<br><br><br><br><br><br><br>

			<td style="width:540px; text-align:center">
				<font size="8" color="#aaaaaa">Este documento no es de uso oficial, la información proporcionada en el mismo es de uso interno y
				exclusivo del tenedor.<br>
				Es confidencial incomunicable a terceros.
				Su divulgación, distribución,
				retransmisión y/o alteración, total o parcial está expresamente
				prohibida.</font>
			</td>

		</tr>


	</table>

EOF;



$bloquePolicial = <<<EOF

	<table>

		<tr>

			<td style="width:540px"><img src="images/back.jpg"></td>

		</tr>

	</table>

	<table style="font-size:10px; padding:5px 10px;">

		<tr>

			<td style="border: 3px solid #5b9bd4; background-color:white; width:540px" align="center">

				ANTECEDENTES POLICIALES

			</td>



		</tr>


	</table>
	<br>

	<table style="font-size:10px; padding:5px 10px;">

		<tr>

			<td style="width:260px; text-align:right">MOTIVO:</td>
			<td style="width:260px; text-align:left"><font color="red" size="10"><b>$value[motivo_Policial]</b></font></td>

		</tr>

		<tr>

			<td style="width:260px; text-align:right">AUTORIDAD:</td>
			<td style="width:260px; text-align:left"><font size="8"><b>$value[autoridad_Policial]</b></font></td>

		</tr>

		<tr>

			<td style="width:260px; text-align:right">DOCUMENTO:</td>
			<td style="width:260px; text-align:left"><font size="8"><b>$value[documento_Policial]</b></font></td>

		</tr>

		<tr>

			<td style="width:260px; text-align:right">FECHA DE PROCESO:</td>
			<td style="width:260px; text-align:left"><font size="8"><b>$value[fecha_proceso_Policial]</b></font></td>

		</tr>

		<tr>

			<td style="width:260px; text-align:right">ESTADO:</td>
			<td style="width:260px; text-align:left"><font color="red" size="10"><b>$value[estado_Policial]</b></font></td>

		</tr>

		<tr>

			<td style="width:260px; text-align:right">TIPO DE OCURRENCIA:</td>
			<td style="width:260px; text-align:left"><font size="8"><b>$value[tipo_ocurrecia_Policial]</b></font></td>

		</tr>

		<tr>

			<td style="width:260px; text-align:right">TIPO:</td>
			<td style="width:260px; text-align:left"><font size="8"><b>$value[tipo_Policial]</b></font></td>

		</tr>

		<tr>

			<td style="width:260px; text-align:right">FECHA DE PROCESO:</td>
			<td style="width:260px; text-align:left"><font size="8"><b>$value[fecha_proceso_Policial]</b></font></td>

		</tr>

		<tr>

			<td style="width:260px; text-align:right">DEFINICIÓN DEL DELITO:</td>

			<td style="width:260px; text-align:justify"><font size="8"><b>$value[definicion_delito_Policial]</b></font></td>

		</tr>

		<tr>

			<td style="width:260px; text-align:right">RESUMEN:</td>
			<td style="width:260px; text-align:justify"><font size="8"><b>$value[observacionPolicial]</b></font></td>

		</tr>


	</table>
<br><br><br><br><br>

EOF;
if ($value['ant_policial'] == 'POSITIVO') {
$pdf->writeHTML($bloque1, false, false, false, false, '');
$pdf->writeHTML($bloquePolicial, false, false, false, false, '');
$pdf->writeHTML($bloque7, false, false, false, false, '');

}

$bloque7veh = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>

			<td style="width:260px; text-align:right"></td>
			<td style="width:260px; text-align:left"><b></b></td>

		</tr>

		<tr>


			<td style="width:260px; text-align:right"></td>
			<td style="width:260px; text-align:left"><b></b></td>

		</tr>

		<tr>
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

			<td style="width:540px; text-align:center">
				<font size="8" color="#aaaaaa">Este documento no es de uso oficial, la información proporcionada en el mismo es de uso interno y
				exclusivo del tenedor.<br>
				Es confidencial incomunicable a terceros.
				Su divulgación, distribución,
				retransmisión y/o alteración, total o parcial está expresamente
				prohibida.</font>
			</td>

		</tr>


	</table>

EOF;

$bloquevehiculo = <<<EOF

	<table>

		<tr>

			<td style="width:540px"><img src="images/back.jpg"></td>

		</tr>

	</table>

	<table style="font-size:10px; padding:5px 10px;">

		<tr>

			<td style="border: 3px solid #5b9bd4; background-color:white; width:540px" align="center">

				INFORMACION DEL VEHICULO

			</td>



		</tr>


	</table>
	<br><br><br>

	<table style="font-size:10px; padding:5px 10px;">

		<tr>

			<td style="width:260px; text-align:right">PLACA:</td>
			<td style="width:260px; text-align:left"><font color="red" size="10"><b>$veh[Placa_Nueva]</b></font></td>

		</tr>

		<tr>

			<td style="width:260px; text-align:right">MARCA:</td>
			<td style="width:260px; text-align:left"><font size="8"><b>$veh[Marca]</b></font></td>

		</tr>

		<tr>

			<td style="width:260px; text-align:right">MODELO:</td>
			<td style="width:260px; text-align:left"><font size="8"><b>$veh[Modelo]</b></font></td>

		</tr>

		<tr>

			<td style="width:260px; text-align:right">PROPIETARIO:</td>
			<td style="width:260px; text-align:left"><font size="8"><b>$veh[Propietario]</b></font></td>

		</tr>

		<tr>

			<td style="width:260px; text-align:right">FECHA DE ENTREGA:</td>
			<td style="width:260px; text-align:left"><font color="red" size="10"><b>$veh[Fecha_Entrega]</b></font></td>

		</tr>

		<tr>

			<td style="width:260px; text-align:right">CONTINENTE:</td>
			<td style="width:260px; text-align:left"><font size="8"><b>$continent</b></font></td>

		</tr>

		<tr>

			<td style="width:260px; text-align:right">PAIS:</td>
			<td style="width:260px; text-align:left"><font size="8"><b>$countries</b></font></td>

		</tr>

		<tr>

			<td style="width:260px; text-align:right">AÑO DEL MODELO:</td>
			<td style="width:260px; text-align:left"><font size="8"><b>$modelYear</b></font></td>

		</tr>

		<tr>

			<td style="width:260px; text-align:right">FABRICA:</td>

			<td style="width:260px; text-align:justify"><font size="8"><b>$manufacture</b></font></td>

		</tr>



	</table>
<br><br><br>

EOF;

if ($value['placa'] != 'NINGUNO') {
$pdf->writeHTML($bloque1, false, false, false, false, '');
$pdf->writeHTML($bloquevehiculo, false, false, false, false, '');
$pdf->writeHTML($bloque7veh, false, false, false, false, '');

}

// ---------------------------------------------------------

$bloquePenal = <<<EOF

	<table>

		<tr>

			<td style="width:540px"><img src="images/back.jpg"></td>

		</tr>

	</table>

	<table style="font-size:10px; padding:5px 10px;">

		<tr>

			<td style="border: 3px solid #5b9bd4; background-color:white; width:540px" align="center">

				ANTECEDENTES PENALES

			</td>



		</tr>


	</table>
	<br>

	<table style="font-size:10px; padding:5px 10px;">

		<tr>

			<td style="width:260px; text-align:right">MOTIVO:</td>
			<td style="width:260px; text-align:left"><font color="red" size="10"><b>$value[motivo_penal]</b></font></td>

		</tr>

		<tr>

			<td style="width:260px; text-align:right">AUTORIDAD:</td>
			<td style="width:260px; text-align:left"><font size="8"><b>$value[autoridad_penal]</b></font></td>

		</tr>

		<tr>

			<td style="width:260px; text-align:right">DOCUMENTO:</td>
			<td style="width:260px; text-align:left"><font size="8"><b>$value[documento_penal]</b></font></td>

		</tr>

		<tr>

			<td style="width:260px; text-align:right">FECHA DE PROCESO:</td>
			<td style="width:260px; text-align:left"><font size="8"><b>$value[fecha_proceso_penal]</b></font></td>

		</tr>

		<tr>

			<td style="width:260px; text-align:right">ESTADO:</td>
			<td style="width:260px; text-align:left"><font color="red" size="10"><b>$value[estado_penal]</b></font></td>

		</tr>

		<tr>

			<td style="width:260px; text-align:right">TIPO DE OCURRENCIA:</td>
			<td style="width:260px; text-align:left"><font size="8"><b>$value[tipo_ocurrecia_penal]</b></font></td>

		</tr>

		<tr>

			<td style="width:260px; text-align:right">TIPO:</td>
			<td style="width:260px; text-align:left"><font size="8"><b>$value[tipo_penal]</b></font></td>

		</tr>

		<tr>

			<td style="width:260px; text-align:right">FECHA DE PROCESO:</td>
			<td style="width:260px; text-align:left"><font size="8"><b>$value[fecha_proceso_penal]</b></font></td>

		</tr>

		<tr>

			<td style="width:260px; text-align:right">DEFINICIÓN DEL DELITO:</td>

			<td style="width:260px; text-align:justify"><font size="8"><b>$value[definicion_delito_judicial]</b></font></td>

		</tr>

		<tr>

			<td style="width:260px; text-align:right">RESUMEN:</td>
			<td style="width:260px; text-align:justify"><font size="8"><b>$value[observacionPenales]</b></font></td>

		</tr>


	</table>
	<br><br><br><br>

EOF;
if ($value['ant_penales'] == 'POSITIVO') {
$pdf->writeHTML($bloque1, false, false, false, false, '');
$pdf->writeHTML($bloquePenal, false, false, false, false, '');
$pdf->writeHTML($bloque7, false, false, false, false, '');

}

// ---------------------------------------------------------

$bloquejudicial = <<<EOF

	<table>

		<tr>

			<td style="width:540px"><img src="images/back.jpg"></td>

		</tr>

	</table>

	<table style="font-size:10px; padding:5px 10px;">

		<tr>

			<td style="border: 3px solid #5b9bd4; background-color:white; width:540px" align="center">

				ANTECEDENTES JUDIALES

			</td>



		</tr>


	</table>
	<br>

	<table style="font-size:10px; padding:5px 10px;">

		<tr>

			<td style="width:260px; text-align:right">MOTIVO:</td>
			<td style="width:260px; text-align:left"><font color="red" size="10"><b>$value[motivo_judicial]</b></font></td>

		</tr>

		<tr>

			<td style="width:260px; text-align:right">AUTORIDAD:</td>
			<td style="width:260px; text-align:left"><font size="8"><b>$value[autoridad_judicial]</b></font></td>

		</tr>

		<tr>

			<td style="width:260px; text-align:right">DOCUMENTO:</td>
			<td style="width:260px; text-align:left"><font size="8"><b>$value[documento_judicial]</b></font></td>

		</tr>

		<tr>

			<td style="width:260px; text-align:right">FECHA DE PROCESO:</td>
			<td style="width:260px; text-align:left"><font size="8"><b>$value[fecha_proceso_judicial]</b></font></td>

		</tr>

		<tr>

			<td style="width:260px; text-align:right">ESTADO:</td>
			<td style="width:260px; text-align:left"><font color="red" size="10"><b>$value[estado_judicial]</b></font></td>

		</tr>

		<tr>

			<td style="width:260px; text-align:right">TIPO DE OCURRENCIA:</td>
			<td style="width:260px; text-align:left"><font size="8"><b>$value[tipo_ocurrecia_judicial]</b></font></td>

		</tr>

		<tr>

			<td style="width:260px; text-align:right">TIPO:</td>
			<td style="width:260px; text-align:left"><font size="8"><b>$value[tipo_judicial]</b></font></td>

		</tr>

		<tr>

			<td style="width:260px; text-align:right">FECHA DE PROCESO:</td>
			<td style="width:260px; text-align:left"><font size="8"><b>$value[fecha_proceso_judicial]</b></font></td>

		</tr>

		<tr>

			<td style="width:260px; text-align:right">DEFINICIÓN DEL DELITO:</td>

			<td style="width:260px; text-align:justify"><font size="8"><b></b></font></td>$value[definicion_delito_judicial]

		</tr>

		<tr>

			<td style="width:260px; text-align:right">RESUMEN:</td>
			<td style="width:260px; text-align:justify"><font size="8"><b>$value[observacionJudicial]</b></font></td>

		</tr>


	</table>
	<br><br><br><br>
EOF;
if ($value['ant_judicial'] == 'POSITIVO') {
$pdf->writeHTML($bloque1, false, false, false, false, '');
$pdf->writeHTML($bloquejudicial, false, false, false, false, '');
$pdf->writeHTML($bloque7, false, false, false, false, '');
//$pdf->writeHTML($bloque1, false, false, false, false, '');
}

// ---------------------------------------------------------
$bloquelogosoat = <<<EOF

	<table border="0">

		<tr>

			<td style="width:200px"><img src="images/min.png"></td>

			<td style="background-color:white; width:140px">



			</td>



			<td style="background-color:white; width:210px; text-align:center; color:#6f42c1"><font size="72">SOAT</font></td>

		</tr>

	</table>
	<hr style="height: 3px; background-color: #6f42c1">

EOF;
	//-------------------------
$bloquesoat = <<<EOF

	<table>

		<tr>

			<td style="width:540px"><img src="images/back.jpg"></td>

		</tr>

	</table>

	<table style="font-size:10px; padding:5px 10px;">

		<tr>

			<td style="width:520px; text-align:center"><font size="20">COMPAÑÍA DE SEGUROS</font></td>


		</tr>

		<tr>
			<td style="width:520px; text-align:center"><font color="red" size="10"><b>$seguro</b></font></td>

		</tr>
		<hr>
		<tr>

			<td style="width:260px; text-align:right"><font size="12">VIGENCIA DE LA PÓLIZA</font></td>
			<td style="width:260px; text-align:right"><font size="12">CERTIFICADO SOAT CONTROL POLICIAL</font></td>


		</tr>

		<tr>

			<td style="width:260px; text-align:right"><font size="12">No Póliza - Certificado</font></td>
			<td style="width:260px; text-align:left"><font size="10">Vigencia de uso exclusivo para control policial</font></td>
		</tr>

		<tr>

			<td style="width:260px; text-align:right"><font size="14"><b>$value[numeropoliza]</b></font></td>


		</tr>

		<tr>
			<td style="width:260px; text-align:right"><font size="12">Desde</font></td>
			<td style="width:260px; text-align:left"><font size="12">Desde</font></td>


		</tr>

		<tr>


			<td style="width:260px; text-align:right"><font size="14"><b>$value[fecha_inicio_soat]</b></font></td>
			<td style="width:260px; text-align:left"><font size="14"><b>$value[fecha_inicio_soat]</b></font></td>

		</tr>

		<tr>
			<td style="width:260px; text-align:right"><font size="12">Hasta</font></td>
			<td style="width:260px; text-align:left"><font size="12">Hasta</font></td>


		</tr>

		<tr>


			<td style="width:260px; text-align:right"><font size="14"><b>$value[fecha_fin_soat]</b></font></td>
			<td style="width:260px; text-align:left"><font size="14"><b>$value[fecha_fin_soat]</b></font></td>

		</tr>
		<hr>
		<tr>

			<td style="width:520px; text-align:center"><font size="20">VEHÍCULO ASEGURADO</font></td>

		</tr>

		<tr>

			<td style="width:260px; text-align:right"><font size="12">Placa</font></td>
			<td style="width:260px; text-align:left"><font size="12">Categoría / Clase</font></td>
			<td style="width:260px; text-align:right"><font size="12">Uso</font></td>

		</tr>

		<tr>
			<td style="width:260px; text-align:right"><font size="14"><b>$value[placa]</b></font></td>
			<td style="width:260px; text-align:left"><font size="14"><b>$value[nombreclasevehiculo]</b></font></td>

		</tr>
		<tr>
			<td style="width:260px; text-align:right"><font size="12">Uso</font></td>
			<td style="width:260px; text-align:left"><font size="12">Estado</font></td>

		</tr>
		<tr>
			<td style="width:260px; text-align:right"><font size="14"><b>$value[NombreUsoVehiculo]</b></font></td>
			<td style="width:260px; text-align:left"><font size="14"><b>$value[soat]</b></font></td>

		</tr>
		<tr>
			<td style="width:260px; text-align:right"><font size="12">Tipo de Certificado</font></td>
			<td style="width:260px; text-align:left"><font size="12">Orden de Captura</font></td>

		</tr>
		<tr>
			<td style="width:260px; text-align:right"><font size="14"><b>$value[TipoCertificado]</b></font></td>
			<td style="width:260px; text-align:justify"><font size="10"><b>$value[orden_captura]</b></font></td>

		</tr>


	</table>


EOF;
$bloquepiesoat = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>

			<td style="width:260px; text-align:right"></td>
			<td style="width:260px; text-align:left"><b></b></td>

		</tr>

		<tr>


			<td style="width:260px; text-align:right"></td>
			<td style="width:260px; text-align:left"><b></b></td>

		</tr>

		<tr>

			<td style="width:540px; text-align:center">
				<font size="7" color="#aaaaaa">
					Los establecimientos de salud públicos y privados están obligados
					a prestar atención médico quirúrgica de emergencia en caso de la
					ocurrencia de un accidente de tránsito conforme en la Ley No
					26842, Ley General de Salud y su Reglamento.
				</font>
			</td>
		</tr>
		<tr>

			<td style="width:540px; text-align:center;" bgcolor="#6e42c1" border-radius: 150px;>
				<font size="7" color="#fff">
					La información sobre las obligaciones derechos del
					contratante/asegurado, coberturas, exclusiones, las podrás encontrar
					ingresando a www.apeseg.org.pe/soat o solicitando tu cartilla
					informativa en las oficinas de tu compañía de seguros.
				</font>
			</td>

		</tr>
		<tr>
			<td style="width:540px; text-align:center">
				<font size="8" color="#aaaaaa">
					Este documento no es de uso oficial, la información proporcionada en
					el mismo es de uso interno y
					exclusivo del tenedor.<br>
					Es confidencial incomunicable a terceros.
					Su divulgación, distribución,
					retransmisión y/o alteración, total o parcial está expresamente
					prohibida.
				</font>
			</td>
		</tr>


	</table>

EOF;



$pdf->writeHTML($bloquelogosoat, false, false, false, false, '');
$pdf->writeHTML($bloquesoat, false, false, false, false, '');
$pdf->writeHTML($bloquepiesoat, false, false, false, false, '');
/////////-----------------------------------------------
$bloqueencabezadorecord = <<<EOF

		<table>

		<tr>

			<td style="width:540px"><img src="images/back.jpg"></td>

		</tr>

	</table>
	<table style="font-size:10px; padding:5px 10px;">

		<tr>

			<td style="border: 3px solid #5b9bd4; background-color:white; width:540px" align="center">

				RECORD DEL CONDUCTOR
			</td>



		</tr>


		</table>
		<table style="font-size:10px; padding:5px -10px; ">

		<tr>
			<td style="solid #666; background-color:white; width:130px; text-align:center">PRENOMBRES</td>
			<td style="solid #666; background-color:white; width:150px; text-align:center"><b>$value[nombre] $value[apellido]</b></td>

		</tr>

		<tr>
			<td style="solid #666; background-color:white; width:130px; text-align:center">DNI</td>
			<td style="solid #666; background-color:white; width:150px; text-align:center"><b>$value[dni]</b></td>

		</tr>

		<tr>
			<td style="solid #666; background-color:white; width:130px; text-align:center">Nº de Licencia Correlativo</td>
			<td style="solid #666; background-color:white; width:150px; text-align:center"><b>$var_num_licencia</b></td>

		</tr>

		<tr>
			<td style="solid #666; background-color:white; width:130px; text-align:center">Estado</td>
			<td style="solid #666; background-color:white; width:150px; text-align:center"><b>$estado_licencia</b></td>

		</tr>

		<tr>
			<td style="solid #666; background-color:white; width:130px; text-align:center">Fecha de Expedición</td>
			<td style="solid #666; background-color:white; width:150px; text-align:center"><b>$dat_fecha_expedicion</b></td>

		</tr>

		<tr>
			<td style="solid #666; background-color:white; width:130px; text-align:center">Fecha de Revalidación</td>
			<td style="solid #666; background-color:white; width:150px; text-align:center"><b>$dat_fecha_revalidacion</b></td>

		</tr>

		<tr>
			<td style="solid #666; background-color:white; width:130px; text-align:center">Restricciones</td>
			<td style="solid #666; background-color:white; width:150px; text-align:center"><b>$var_restricciones1</b></td>

		</tr>
		<tr>
			<td style="solid #666; background-color:white; width:130px; text-align:center">Record del Conductor</td>
			<td style="solid #666; background-color:white; width:150px; text-align:center"><b>$record</b></td>

		</tr>



	</table>
	<br><br><br>
	<table style="font-size:10px; padding:5px 10px; background-color:#ededed;">

		<thead>
	    <tr>
		    <th>ENTIDAD</th>
			<th>PAPELETAS</th>
			<th>FECHA</th>
			<th>FECHA FIRME</th>
			<th>FALTA</th>
		</tr>
		</thead>
		</table>
	<br>

EOF;


// ---------------------------------------------------------


$pdf->writeHTML($bloque1, false, false, false, false, '');
$pdf->writeHTML($bloqueencabezadorecord, false, false, false, false, '');

$bloque7multas = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>

			<td style="width:260px; text-align:right"></td>
			<td style="width:260px; text-align:left"><b></b></td>

		</tr>

		<tr>


			<td style="width:260px; text-align:right"></td>
			<td style="width:260px; text-align:left"><b></b></td>

		</tr>

		<tr>
		<br><br><br><br><br><br><br>
			<td style="width:540px; text-align:center">
				<font size="8" color="#aaaaaa">Este documento no es de uso oficial, la información proporcionada en el mismo es de uso interno y
				exclusivo del tenedor.<br>
				Es confidencial incomunicable a terceros.
				Su divulgación, distribución,
				retransmisión y/o alteración, total o parcial está expresamente
				prohibida.</font>
			</td>

		</tr>


	</table>

EOF;
$bloque7s = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>

			<td style="width:260px; text-align:right"></td>
			<td style="width:260px; text-align:left"><b></b></td>

		</tr>

		<tr>


			<td style="width:260px; text-align:right"></td>
			<td style="width:260px; text-align:left"><b></b></td>

		</tr>

		<tr>
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
			<td style="width:540px; text-align:center">
				<font size="8" color="#aaaaaa">Este documento no es de uso oficial, la información proporcionada en el mismo es de uso interno y
				exclusivo del tenedor.<br>
				Es confidencial incomunicable a terceros.
				Su divulgación, distribución,
				retransmisión y/o alteración, total o parcial está expresamente
				prohibida.</font>
			</td>

		</tr>


	</table>

EOF;

if (is_array($arrmultas)) {
foreach ($arrmultas as $key => $keymultas) {

$bloquerecord = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

	<tbody>

		<tr>
			<td style="width:100px; text-align:left"><font color="red" size="10"><b>
			$keymultas[str_entidad]</b></font></td>

			<td style="width:100px; text-align:left"><font color="red" size="10"><b>
			$keymultas[papeleta]</b></font></td>

			<td style="width:100px; text-align:left"><font color="red" size="10"><b>
			$keymultas[dat_fecha_papeleta]</b></font></td>

			<td style="width:140px; text-align:left"><font color="red" size="10"><b>
			$keymultas[dat_fecha_firme]</b></font></td>

			<td style="width:100px; text-align:left"><font color="red" size="10"><b>
			$keymultas[falta]</b></font></td>

		</tr>
	</tbody>

</table>


EOF;

$pdf->writeHTML($bloquerecord, false, false, false, false, '');
}
$pdf->writeHTML($bloque7multas, false, false, false, false, '');


} else {
$pdf->writeHTML($bloque7s, false, false, false, false, '');
}


// ---------------------------------------------------------
//SALIDA DEL ARCHIVO
}

//Declaramos una carpeta temporal para guardar la imagenes generadas


$nombre="REPORTE_".$value['nombre']."_".$value['apellido'].".pdf";

$pdf->Output($nombre);

?>
