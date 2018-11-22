<title>Cabify - Disfruta del viaje</title>
  		<link rel="shortcut icon" href="img/favicon.ico" type="image/ico" />


<?php
	date_default_timezone_set('America/Lima');
	include 'conexion.php';

	$sqlsecu = "SELECT * FROM conductores ORDER BY fecha DESC LIMIT 1";
	$resultado = $mysqli->query($sqlsecu);
	$row = $resultado->fetch_array(MYSQLI_ASSOC);
	$secuencia_arhu_ant = $row['secuencia_arhu_ant'];
	$secu = substr($secuencia_arhu_ant, 7, -5);
	$mes = date("M");
	if ($secu == $mes) {
		$saa=str_pad($secuencia_arhu_ant, 5, "0", STR_PAD_LEFT);
		$secuencia_arhu_ant++;
		$secuencia = $secuencia_arhu_ant;
	}else{
		$año = date("Y");
		$mes = date("M");
		$secuencia_arhu_ant = "00000";
		$secuencia_arhu_ant++;
		$saa=str_pad($secuencia_arhu_ant, 5, "0", STR_PAD_LEFT);
		$secuencia =  "RA-" .$año . $mes. $saa;
	}
	
	

	NuevaPersona($_POST['nuevoDni'], $_POST['nuevoNombre'], $_POST['nuevoApellido'], $_POST['nuevoPlaca'], $secuencia);
	
	function NuevaPersona($dni, $nombre, $apellido, $placa, $secuencia)
	{
		include 'conexion.php';
		$sentencia= "INSERT INTO conductores (dni, nombre, apellido, placa, fecha, empresa, secuencia_arhu_ant)
					VALUES ('".$dni."', '".$nombre."', '".$apellido."', '".$placa."', NOW( ), 'A', '".$secuencia."')" ;
		
		$mysqli->query($sentencia) or die ("Error al ingresar los datos".mysqli_error($mysqli));
	}
?>

<?php
header('location: inicio.php')

?>