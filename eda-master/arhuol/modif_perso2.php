      <link rel="shortcut icon" href="img/favicon.ico" type="image/ico" />
<title>ARHU Internacional</title>
		<link rel="shortcut icon" href="img/favicon.ico" type="image/ico" />
<?php
require 'modeloconductor.php';

$ant_judicial= $_POST['ant_judicial'];
$ant_penales = $_POST['ant_penales'];
$ant_policial = $_POST['ant_policial'];
$record_cond = $_POST['record_cond'];
$resultado = $_POST['resultado'];
$soat = $_POST['soat'];
$status_licencia = $_POST['status_licencia'];
@$blacklist = $_POST['blacklist'];

if ($ant_judicial == 'POSITIVO' ||
	$ant_penales == 'POSITIVO' ||
	$ant_policial =='POSITIVO' ||
	$soat =='El vehiculo consultado no posee SOAT' ||
	$soat =='NO POSEE' ||
	$soat =='VENCIDO' ||
	$status_licencia != 'VIGENTE' && $status_licencia != 'VERIFICADO' ||
	$record_cond >= '55' ||
	$blacklist == '1') {

	$resultado = "NO APTO";

} else {

	$resultado = "APTO";

}

	ModificarPersona($_POST['dni'], $_POST['nombre'], $_POST['apellido'], $_POST['placa'],  $ant_penales, $ant_judicial, $ant_policial, $record_cond, $resultado, $_POST['cont'],$_POST['observacion'], $pdf, $blacklist,$_POST['observacionPenales'], $_POST['observacionJudicial'], $_POST['observacionPolicial'],$_POST['motivo_penal'], $_POST['autoridad_penal'], $_POST['documento_penal'], $_POST['fecha_proceso_penal'],  $_POST['estado_penal'], $_POST['tipo_ocurrecia_penal'],$_POST['tipo_penal'], $_POST['agraviado_penal'], $_POST['definicion_delito_penal'], $_POST['motivo_judicial'], $_POST['autoridad_judicial'], $_POST['documento_judicial'], $_POST['fecha_proceso_judicial'], $_POST['tipo_ocurrecia_judicial'], $_POST['tipo_judicial'],$_POST['agraviado_judicial'], $_POST['definicion_delito_judicial'], $_POST['motivo_Policial'], $_POST['autoridad_Policial'],$_POST['documento_Policial'], $_POST['fecha_proceso_Policial'], $_POST['estado_Policial'], $_POST['tipo_ocurrecia_Policial'], $_POST['tipo_Policial'],$_POST['agraviado_Policial'], $_POST['definicion_delito_Policial'], $_POST['estado_judicial'], $_POST['color_vehiculo'], $status_licencia);

	function ModificarPersona($dni, $nombre, $apellido, $placa, $ant_penales, $ant_judicial, $ant_policial, $record_cond, $resultado, $cont, $observacion, $pdf, $blacklist, $observacionPenales, $observacionJudicial, $observacionPolicial, $motivo_penal, $autoridad_penal, $documento_penal, $fecha_proceso_penal, $estado_penal, $tipo_ocurrecia_penal, $tipo_penal, $agraviado_penal, $definicion_delito_penal, $motivo_judicial, $autoridad_judicial, $documento_judicial, $fecha_proceso_judicial, $tipo_ocurrecia_judicial, $tipo_judicial, $agraviado_judicial, $definicion_delito_judicial, $motivo_Policial, $autoridad_Policial, $documento_Policial, $fecha_proceso_Policial, $estado_Policial, $tipo_ocurrecia_Policial, $tipo_Policial, $agraviado_Policial, $definicion_delito_Policial, $estado_judicial, $color_vehiculo, $status_licencia)
	{

		$conductores = ModeloConductor::one(['cont'=>$cont]);
		$conductores->update([
			                    'dni' => $dni,
			                    'nombre' => $nombre,
			                    'apellido' => $apellidos,
			                    'placa' => $placa,
			                    'ant_penales' => $ant_penales,
			                    'ant_judicial' => $ant_judicial,
			                    'ant_policial' => $ant_policial,
			                    'record_cond' => $record_cond,
			                    'resultado' => $resultado,
			                    'observacion' => $observacion,
			                   	'blacklist' => $blacklist,
			                    'observacionPenales' => $observacionPenales,
			                    'observacionJudicial' => $observacionJudicial,
			                    'observacionPolicial' => $observacionPolicial,
			                    'motivo_penal' => $motivo_penal,
			                    'autoridad_penal' => $autoridad_penal,
			                    'documento_penal' => $documento_penal,
			                    'fecha_proceso_penal' => $fecha_proceso_penal,
			                    'estado_penal' => $estado_penal,
			                    'tipo_ocurrecia_penal' => $tipo_ocurrecia_penal,
			                    'tipo_penal' => $tipo_penal,
			                    'agraviado_penal' => $agraviado_penal,
			                    'definicion_delito_penal' => $definicion_delito_penal,
			                    'motivo_Policial' => $motivo_Policial,
			                    'autoridad_Policial' => $autoridad_Policial,
			                    'documento_Policial' => $documento_Policial,
			                    'fecha_proceso_Policial' => $fecha_proceso_Policial,
			                    'estado_Policial' => $estado_Policial,
			                    'tipo_ocurrecia_Policial' => $tipo_ocurrecia_Policial,
			                    'tipo_Policial' => $tipo_Policial,
			                    'agraviado_Policial' => $agraviado_Policial,
			                    'definicion_delito_Policial' => $definicion_delito_Policial,
			                    'motivo_judicial' => $motivo_judicial,
			                    'autoridad_judicial' => $autoridad_judicial,
			                    'documento_judicial' => $documento_judicial,
			                    'fecha_proceso_judicial' => $fecha_proceso_judicial,
			                    'estado_judicial' => $estado_judicial,
			                    'tipo_ocurrecia_judicial' => $tipo_ocurrecia_judicial,
			                    'tipo_judicial' => $tipo_judicial,
			                    'agraviado_judicial' => $agraviado_judicial,
			                    'definicion_delito_judicial' => $definicion_delito_judicial,
			                    'color_vehiculo' => $color_vehiculo,
			                    'status_licencia' => $status_licencia
			                ]);

                $conductores->save();
	}
?>

<script type="text/javascript">
	alert("Datos Actualizados Exitosamante!!");
	window.location.href='inicio.php';
</script>