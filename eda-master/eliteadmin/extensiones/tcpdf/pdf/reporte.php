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
require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->startPageGroup();

$pdf->AddPage();
// Image example with resizing
$pdf->Image('images/conductores/conductor.png', 35, 80, 45, 45, 'PNG');

// ---------------------------------------------------------

$bloque1 = <<<EOF

	<table border="0">
		
		<tr>
			
			<td style="width:150px"><img src="images/arhuint.jpg"></td>

			<td style="background-color:white; width:140px">
				
				

			</td>

			<td style="background-color:white; width:140px">

				
				
			</td>

			<td style="background-color:white; width:110px; text-align:center; color:black"><br><br><b>secuencia_arhu_ant</b></td>

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
			<td style="border: 1px solid #666; background-color:white; width:130px; text-align:center"><b>FECHA DE NACIMIENTO</b></td>
			
		</tr>

		<tr>
		
			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:260px; text-align:center"></td>
			<td style="border: 1px solid #666; background-color:white; width:130px; text-align:center">DIGITO VERIFICADOR</td>
			<td style="border: 1px solid #666; background-color:white; width:130px; text-align:center"><b>DIGITO VERIFICADOR</b></td>
			
		</tr>

		<tr>
		
			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:260px; text-align:center"></td>
			<td style="border: 1px solid #666; background-color:white; width:130px; text-align:center">ESTADO CIVIL</td>
			<td style="border: 1px solid #666; background-color:white; width:130px; text-align:center"><b>ESTADO CIVIL</b></td>
			
		</tr>

		
	</table>

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
			<td style="width:260px; text-align:left"><b>REQUISITORIAS</b></td>

		</tr>

		
	</table>

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
$pdf->writeHTML($bloque1, false, false, false, false, '');


// ---------------------------------------------------------

$bloque8 = <<<EOF

	<table>
		
		<tr>
			
			<td style="width:540px"><img src="images/back.jpg"></td>
		
		</tr>

	</table>

	<table style="font-size:10px; padding:5px 10px;">
	
		<tr>
		
			<td style="border: 3px solid #5b9bd4; background-color:white; width:540px" align="center">

				RECORD DE CONDUCTOR

			</td>

			

		</tr>

		
	</table>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

EOF;

$pdf->writeHTML($bloque8, false, false, false, false, '');
$pdf->writeHTML($bloque7, false, false, false, false, '');


// ---------------------------------------------------------
//SALIDA DEL ARCHIVO 
}
$pdf->Output('factura.pdf');




$factura = new imprimirFactura();
$factura -> codigo = $_GET["codigo"];
$factura -> traerImpresionFactura();

?>