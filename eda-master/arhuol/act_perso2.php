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
@$blacklist = $_POST['blacklist'];

if ($blacklist == "") {
  $blacklist = 2;
}

if ($ant_judicial == 'POSITIVO' ||
  $ant_penales == 'POSITIVO' ||
  $ant_policial =='POSITIVO' ||
  $soat =='El vehiculo consultado no posee SOAT' ||
  $soat =='NO POSEE' ||
  $soat =='VENCIDO' ||
  //$status_licencia != 'VIGENTE' && $status_licencia != 'VERIFICADO' ||
  $record_cond >= '55' ||
  $blacklist == '1') {

  $resultado = "NO APTO";

} else {

  $resultado = "APTO";

}

  $dni= $_POST['dni'];
  $nombre= $_POST['nombre'];
  $apellido= $_POST['apellido'];
  $placa= $_POST['placa'];
  $cont=$_POST['cont'];
  $observacion = $_POST['observacion'];
  $observacionPenales = $_POST['observacionPenales'];
  $observacionJudicial = $_POST['observacionJudicial'];
  $observacionPolicial = $_POST['observacionPolicial'];
  $motivo_penal =$_POST['motivo_penal'];
  $autoridad_penal =$_POST['autoridad_penal'];
  $documento_penal =$_POST['documento_penal'];
  $fecha_proceso_penal =$_POST['fecha_proceso_penal'];
  $estado_penal =$_POST['estado_penal'];
  $tipo_ocurrecia_penal =$_POST['tipo_ocurrecia_penal'];
  $tipo_penal =$_POST['tipo_penal'];
  $agraviado_penal =$_POST['agraviado_penal'];
  $definicion_delito_penal =$_POST['definicion_delito_penal'];
  $motivo_judicial =$_POST['motivo_judicial'];
  $autoridad_judicial =$_POST['autoridad_judicial'];
  $documento_judicial =$_POST['documento_judicial'];
  $fecha_proceso_judicial =$_POST['fecha_proceso_judicial'];
  $tipo_ocurrecia_judicial =$_POST['tipo_ocurrecia_judicial'];
  $tipo_judicial =$_POST['tipo_judicial'];
  $agraviado_judicial =$_POST['agraviado_judicial'];
  $definicion_delito_judicial =$_POST['definicion_delito_judicial'];
  $motivo_Policial =$_POST['motivo_Policial'];
  $autoridad_Policial =$_POST['autoridad_Policial'];
  $documento_Policial =$_POST['documento_Policial'];
  $fecha_proceso_Policial =$_POST['fecha_proceso_Policial'];
  $estado_Policial =$_POST['estado_Policial'];
  $tipo_ocurrecia_Policial =$_POST['tipo_ocurrecia_Policial'];
  $tipo_Policial =$_POST['tipo_Policial'];
  $agraviado_Policial =$_POST['agraviado_Policial'];
  $definicion_delito_Policial =$_POST['definicion_delito_Policial'];
  $estado_judicial =$_POST['estado_judicial'];
  $color_vehiculo =$_POST['color_vehiculo'];

    $conductores = ModeloConductor::one(['dni'=>$dni]);
    $conductores->update([
                          'nombre' => $nombre,
                          'apellido' => $apellido,
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
                          'color_vehiculo' => $color_vehiculo
                      ]);

                $conductores->save();
?>

<script type="text/javascript">
    alert("Datos Actualizados Exitosamante!!");
    window.location.href='listadoact.php';
</script>