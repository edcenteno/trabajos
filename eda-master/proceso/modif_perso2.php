      <link rel="shortcut icon" href="img/favicon.ico" type="image/ico" />
<title>ARHU Internacional</title>
		<link rel="shortcut icon" href="img/favicon.ico" type="image/ico" />
<?php

$ant_judicial= $_POST['ant_judicial'];
$ant_penales = $_POST['ant_penales'];
$ant_policial = $_POST['ant_policial'];


if ($_POST['negativo'] == '1') {
	$ant_judicial= "NEGATIVO";
	$ant_penales = "NEGATIVO";
	$ant_policial = "NEGATIVO";
} else {
	$ant_judicial= $_POST['ant_judicial'];
	$ant_penales = $_POST['ant_penales'];
	$ant_policial = $_POST['ant_policial'];
}



	ModificarPersona($_POST['dni'], $ant_penales, $ant_judicial, $ant_policial, $_POST['motivo_penal'], $_POST['autoridad_penal'], $_POST['fecha_proceso_penal'], $_POST['motivo_judicial'], $_POST['autoridad_judicial'], $_POST['fecha_proceso_judicial'], $_POST['motivo_Policial'], $_POST['autoridad_Policial'], $_POST['fecha_proceso_Policial']);

	function ModificarPersona($dni, $ant_penales, $ant_judicial, $ant_policial, $motivo_penal, $autoridad_penal, $fecha_proceso_penal, $motivo_judicial, $autoridad_judicial, $fecha_proceso_judicial, $motivo_Policial, $autoridad_Policial, $fecha_proceso_Policial)
	{
		include 'conexion.php';
		 $sentencia="UPDATE proceso SET
		 							   ant_penales='".$ant_penales."',
									   ant_judicial='".$ant_judicial."',
									   ant_policial='".$ant_policial."',
									   motivo_penal='".$motivo_penal."',
									   autoridad_penal ='".$autoridad_penal."',
		 							   fecha_proceso_penal='".$fecha_proceso_penal."',
									   motivo_judicial='".$motivo_judicial."',
									   autoridad_judicial='".$autoridad_judicial."',
									   fecha_proceso_judicial='".$fecha_proceso_judicial."',
									   motivo_Policial='".$motivo_Policial."',
									   autoridad_Policial='".$autoridad_Policial."',
									   fecha_proceso_Policial='".$fecha_proceso_Policial."'
									   WHERE dni='".$dni."' ";
		$mysqli->query($sentencia) or die ("Error al actualizar datos".mysqli_error($mysqli));
	}
?>

<script type="text/javascript">
	alert("Datos Actualizados Exitosamante!!");
	window.location.href='inicio.php';
</script>