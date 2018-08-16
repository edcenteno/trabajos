<?php


require_once "../../../controladores/conductores.controlador.php";
require_once "../../../modelos/conductores.modelo.php";


	//$idconductor=0;
 	$idconductor = $_GET['idconductor'];
    $item = null;
    $valor = null;

    $unconductor = ControladorConductor::ctrMostrarunConductor($item, $valor, $idconductor);
    //var_dump($unconductor); 
    foreach ($unconductor as $key => $value){
  

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

	if ($value['nombrecompania']== "Pacifico Seguros") {
	$seguro = '<img width="120" src="images/soat/pacifico.png">';
	}
	
	
	
require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->startPageGroup();

$pdf->AddPage();
// Image example with resizing
//$pdf->Image('images/confidencial.png', -10, -10, 250, 175, 'PNG');
$pdf->Image('images/conductores/conductor.png', 35, 80, 45, 45, 'PNG');
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

			<td style="background-color:white; width:110px; text-align:center; color:black"><br><br><b>$value[secuencia_arhu_ant]</b></td>

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
	<br><br><br><br>

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

		

		
	</table>
<br><br><br><br>
EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');

// ---------------------------------------------------------

/*foreach ($productos as $key => $item) {

$itemProducto = "descripcion";
$valorProducto = $item["descripcion"];
$orden = null;

$respuestaProducto = ControladorProductos::ctrMostrarProductos($itemProducto, $valorProducto, $orden);

$valorUnitario = number_format($respuestaProducto["precio_venta"], 2);

$precioTotal = number_format($item["total"], 2);*/

$bloque4 = <<<EOF

	

EOF;

$pdf->writeHTML($bloque4, false, false, false, false, '');

/*}*/

// ---------------------------------------------------------

$bloque5 = <<<EOF
<br><br><br><br>
	<table>
		
		<tr>
			
			<td style="width:540px"><img src="images/back.jpg"></td>
		
		</tr>

	</table>

	<table style="font-size:10px; padding:5px 10px;">
	
		<tr>
		
			<td style="border: 3px solid #5b9bd4; background-color:white; width:540px" align="center">

				INFORMACION GENERAL

			</td>

			

		</tr>

		
	</table>
	<br><br><br><br>

EOF;

$pdf->writeHTML($bloque5, false, false, false, false, '');

$bloque6 = <<<EOF

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

		<tr>
		
			
			<td style="width:260px; text-align:right">REQUISITORIAS:</td>
			<td style="width:260px; text-align:left"><b>REFERENCIA POLICIALES</b></td>

		</tr>

		
	</table>
	<br><br><br>

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
		<br><br><br><br><br><br>
			
			<td style="width:540px; text-align:center">
				<font size="8" color="#aaaaaa">Este documento no es de uso oficial, la información proporcionada en el mismo es de uso interno y 
				exclusivo del tenedor.<br>
				Es confidencial incomunicable a terceros.<br>
				Su divulgación, distribución,
				retransmisión y/o alteración, total o parcial está expresamente 
				prohibida.</font>
			</td>

		</tr>

		
	</table>

EOF;

$pdf->writeHTML($bloque7, false, false, false, false, '');

// ---------------------------------------------------------

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

			<td style="width:260px; text-align:justify"><font size="8"><b>$value[definicion_delito_penal]</b></font></td>

		</tr>

		<tr>
			
			<td style="width:260px; text-align:right">RESUMEN:</td>
			<td style="width:260px; text-align:justify"><font size="8"><b>$value[observacionPenales]</b></font></td>

		</tr>

		
	</table>
	<br><br><br><br><br><br><br>

EOF;
if ($value['ant_policial'] == 'POSITIVO') {
$pdf->writeHTML($bloque1, false, false, false, false, '');
	
$pdf->writeHTML($bloquePolicial, false, false, false, false, '');
$pdf->writeHTML($bloque7, false, false, false, false, '');
$pdf->writeHTML($bloque1, false, false, false, false, '');
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

			<td style="width:260px; text-align:justify"><font size="8"><b>$value[definicion_delito_penal]</b></font></td>

		</tr>

		<tr>
			
			<td style="width:260px; text-align:right">RESUMEN:</td>
			<td style="width:260px; text-align:justify"><font size="8"><b>$value[observacionPenales]</b></font></td>

		</tr>

		
	</table>
	<br><br><br><br><br><br><br>

EOF;
if ($value['ant_penales'] == 'POSITIVO') {
	
$pdf->writeHTML($bloquePenal, false, false, false, false, '');
$pdf->writeHTML($bloque7, false, false, false, false, '');
$pdf->writeHTML($bloque1, false, false, false, false, '');
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

			<td style="width:260px; text-align:justify"><font size="8"><b>$value[definicion_delito_judicial]</b></font></td>

		</tr>

		<tr>
			
			<td style="width:260px; text-align:right">RESUMEN:</td>
			<td style="width:260px; text-align:justify"><font size="8"><b>$value[observacionJudicial]</b></font></td>

		</tr>

		
	</table>
	<br><br><br><br><br><br><br>

EOF;
if ($value['ant_judicial'] == 'POSITIVO') {
	
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
		
			<br><br>
			<br>
			<td style="width:540px; text-align:center">
				<font size="8" color="#aaaaaa">Los establecimientos de salud públicos y privados están obligados
					a prestar atención médico quirúrgica de emergencia en caso de la
					ocurrencia de un accidente de tránsito conforme en la Ley No
					26842, Ley General de Salud y su Reglamento.</font>
			</td>
			</tr>
			<tr>
			<td style="width:540px; text-align:center">
				<font size="8" color="#aaaaaa">Este documento no es de uso oficial, la información proporcionada en el mismo es de uso interno y 
				exclusivo del tenedor.<br>
				Es confidencial incomunicable a terceros.<br>
				Su divulgación, distribución,
				retransmisión y/o alteración, total o parcial está expresamente 
				prohibida.</font>
			</td>

		</tr>

		
	</table>

EOF;

$pdf->writeHTML($bloquelogosoat, false, false, false, false, '');	
$pdf->writeHTML($bloquesoat, false, false, false, false, '');
$pdf->writeHTML($bloquepiesoat, false, false, false, false, '');
//$pdf->writeHTML($bloque7, false, false, false, false, '');



// ---------------------------------------------------------

$bloquerecord = <<<EOF

	<table>
		
		<tr>
			
			<td style="width:540px"><img src="images/back.jpg"></td>
		
		</tr>

	</table>

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
		
			<td style="width:260px; text-align:right">COMPAÑÍA DE SEGUROS</td>
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

			<td style="width:260px; text-align:justify"><font size="8"><b>$value[definicion_delito_judicial]</b></font></td>

		</tr>

		<tr>
			
			<td style="width:260px; text-align:right">RESUMEN:</td>
			<td style="width:260px; text-align:justify"><font size="8"><b>$value[observacionJudicial]</b></font></td>

		</tr>

		
	</table>
	

EOF;

//$pdf->writeHTML($bloquerecord, false, false, false, false, '');
//$pdf->writeHTML($bloque7, false, false, false, false, '');


// ---------------------------------------------------------
//SALIDA DEL ARCHIVO 
}


$nombre="REPORTE_".$value['nombre']."_".$value['apellido'].".pdf";
/*require 'vendor/autoload.php';
	$client = new GuzzleHttp\Client();
	$res = $client->request('GET', 'https://captcharh.ddns.net/api/record/multas/'.$idconductor);
	$res->getStatusCode();

	$res->getHeader('content-type');

	$arr = json_decode($res->getBody(), true);
	echo "<pre>";
	//var_dump($arr);
	echo "</pre>";

	foreach ($arr as $key => $value) {
		$papeleta = $value{'papeleta'};
		echo $value{'dat_fecha_papeleta'}."<br>";
		echo $value{'str_fec_firme'}."<br>";
		echo $value{'str_estado'}."<br>";
		echo $value{'falta'}."<br>";
		echo $value{'fec_infraccion'}."<br>";
		echo $value{'str_num_infraccion'}."<br>";
		echo $value{'str_num_entidad'}."<br>";
		echo $value{'str_num_entidad'}."<br>";
	}*/
$pdf->Output($nombre);

?>
