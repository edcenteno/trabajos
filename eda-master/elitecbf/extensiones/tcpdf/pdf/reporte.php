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
    $placa=$value['placa'];
    

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
			<td style="width:260px; text-align:left"><font color="red" size="10"><b>$estadopolicial</b></font></td>

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
			<td style="width:260px; text-align:left"><font size="8"><b>$value[fecha_proceso_judicial]</b></font></td>

		</tr>

		
	</table>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

EOF;

$pdf->writeHTML($bloquePolicial, false, false, false, false, '');
$pdf->writeHTML($bloque7, false, false, false, false, '');
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
<script type="text/javascript">
    
    var dni = '<?php echo $idconductor ?>'
    var placa = '<?php echo $placa ?>'

    $.ajax({
    type: "GET",
    url: 'https://captcharh.ddns.net/api/record/principal/'+ dni
    
    }).done(function(msg){
        //$("#resultado").html(msg);
        //console.log(msg)
        //
        $('.licencia')[0].innerText = msg['var_direccion'];
        $('.licencia')[1].innerText = msg['var_departamento'];
        $('.licencia')[2].innerText = msg['var_distrito'];
        $('.licencia')[3].innerText = msg['var_estado_licencia'];
        $('.licencia')[4].innerText = msg['dat_fecha_expedicion'];
        $('.licencia')[5].innerText = msg['dat_fecha_revalidacion'];
        $('.licencia')[6].innerText = msg['num_cod_administrado'];
        $('.licencia')[7].innerText = msg['var_num_licencia'];
        $('.licencia')[8].innerText = msg['var_restricciones1'];
        $('.licencia')[9].innerText = msg['var_restricciones2'];

    });

    $.ajax({
    type: "GET",
    url: 'https://captcharh.ddns.net/api/record/multas/'+ dni
    
    }).done(function(msg){
        //$("#resultado").html(msg);
        //console.log(msg)

        $('.multas')[0].innerText = msg[0]['dat_fecha_firme'];
        $('.multas')[1].innerText = msg[0]['dat_fecha_papeleta'];
        $('.multas')[2].innerText = msg[0]['dat_fecha_registro'];
        $('.multas')[3].innerText = msg[0]['falta'];
        $('.multas')[4].innerText = msg[0]['fec_infraccion'];
        $('.multas')[5].innerText = msg[0]['papeleta'];
        $('.multas')[6].innerText = msg[0]['str_entidad'];
        $('.multas')[7].innerText = msg[0]['str_estado'];
        $('.multas')[8].innerText = msg[0]['str_fec_firme'];
        $('.multas')[9].innerText = msg[0]['str_num_infraccion'];
        $('.multas')[10].innerText = msg[0]['str_num_entidad'];
        $('.multas')[11].innerText = msg[0]['str_puntos'];
        record = $('.record')[0].innerText = msg['suma']+"%";
        if (record> "55") {
            $('.record')[1].innerText = msg['suma']+"%";
        }else{
            $('.record')[1].innerText = msg['suma']+"%";

        }

        
    });

    
    $.ajax({
    type: "GET",
    url: 'https://captcharh.ddns.net/api/record/placa/'+placa
    
    }).done(function(msg){
        //$("#resultado").html(msg);
       // console.log(msg)//msg.vin.co
        $('.vehiculo')[0].innerText = msg['Marca']; 
        $('.vehiculo')[1].innerText = msg['Modelo']; 
        $('.vehiculo')[2].innerText = msg['Vin']['modelYear']; 
        $('.vehiculo')[3].innerText = msg['Nro_Serie']; 
        $('.vehiculo')[4].innerText = msg['Placa_Anterior']; 
        $('.vehiculo')[5].innerText = msg['Fecha_Entrega']; 
        $('.vehiculo')[6].innerText = msg['Propietario']; 
        $('.vehiculo')[7].innerText = msg['Estado']; 
        $('.vehiculo')[8].innerText = msg['Punto_Entrega']; 
        $('.vehiculo')[9].innerText = msg['Tipo_Uso']; 
        $('.vehiculo')[10].innerText = msg['Tipo_de_Sol']; 
        $('.vehiculo')[11].innerText = msg['Vin']['continent']; 
        $('.vehiculo')[12].innerText = msg['Vin']['countries']; 
        $('.vehiculo')[13].innerText = msg['Vin']['manufacture']; 
        $('.vehiculo')[14].innerText = msg['Vin']['sequentialNumber']; 
        
    });

</script>
