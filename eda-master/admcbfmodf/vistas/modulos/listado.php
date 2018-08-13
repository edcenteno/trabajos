<?php

$host = 'localhost';
$basededatos = 'cabify';
$usuario = 'root';
$contraseña = '';


$conexion = new mysqli($host, $usuario,$contraseña, $basededatos);
if ($conexion -> connect_errno)
{
	die("Fallo la conexion:(".$conexion -> mysqli_connect_errno().")".$conexion-> mysqli_connect_error());
}
 	header('Content-type: application/vnd.ms-excel');
    header('Content-Disposition:attachment;filename=libro.xls');

$fecha1 = $_POST['fecha1'];
$fecha2 = $_POST['fecha2'];

$tabla="";
$query="SELECT * FROM conductores WHERE fecha BETWEEN '$fecha1' AND '$fecha2' ";

$buscarPersona=$conexion->query($query);
if ($buscarPersona->num_rows > 0)
{
	$tabla.= 
	'<div class="table-responsive">
	<table class="table">
		<tr class="bg-primary">
		   <th>FECHA DE REGISTRO</th>
		   <th>DNI</th>
		   <th>NOMBRE</th>
		   <th>APELLIDO</th>
		   <th>PLACA</th>
		   <th>ANTECEDENTES PENALES</th>
		   <th>ANTECEDENTES JUDICIAL</th>
		   <th>ANTECEDENTES POLICIAL</th>
		   <th>RECORD CONDUCTOR</th>
		   <th>RESULTADO</th>
		   <th>SOAT</th>
           <th>FORMATO</th>


		</tr>';

	while($filaPersonas= $buscarPersona->fetch_assoc()){

		 if ($filaPersonas['pdf'] == @num_rows > 0){ 
			$formato =  '<td align="center"><img src="https://cabifyperu.pe/usuario_cabifynew/img/sist/pdfoff.png" onClick="alerta()"></td>';
			}else{ 
			$formato =  '<td align="center"><a href="https://cabifyperu.pe/usuario_arhu/docs/'.$filaPersonas['pdf'].'" target="_blank"><img src="https://cabifyperu.pe/usuario_cabifynew/img/sist/pdf.png"></td>';
			}

		$tabla.=
		'<tr>
			<td align="center">'.$filaPersonas['fecha'].'</td>
			<td  align="center">'.$filaPersonas['id'].'</td>
			<td align="center">'.$filaPersonas['documento'].'</td>
			<td align="center">'.$filaPersonas['cliente'].'</td>
			<td align="center">'.$filaPersonas['placa'].'</td>
			<td align="center">'.$filaPersonas['producto'].'</td>
			<td align="center">'.$filaPersonas['precio'].'</td>
			<td align="center">'.$filaPersonas['iva'].'</td>
			<td align="center">'.$filaPersonas['estado'].'</td>
			<td align="center">'.$filaPersonas['resultado'].'</td>
			<td align="center">'.$filaPersonas['soat'].'</td>
			'.$formato.'

		 </tr>
		';
	}

	$tabla.='</table> </div>';
} else
	{
		$tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
	}


echo $tabla;
?>
