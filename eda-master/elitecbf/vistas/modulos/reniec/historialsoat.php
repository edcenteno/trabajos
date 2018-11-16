<?php
 include "conex.php";

$dni = $_POST['dni'];
$placa = $_POST['placa'];
$id = $_POST['id'];
/*
soat
 */


if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $placa) &&
   preg_match('/^[a-zA-Z0-9]+$/', $placa) && strlen($placa) == 6){

    // Modo de Uso
    require_once("crv/src/autoload.php");

    $test = new \Pit\Pit();
    $out=$test->check( "$placa" ); // Sin Requisitoria
    $crv = $out['message'];

$token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.MTA2MQ.mNioS0vL0ckba0lPV955HvekjFHzvIcqEVqy1_kBerM';//token prestado
$query = "
query {
    soat(placa:\"$placa\") {
        NombreCompania
        FechaInicio
        FechaFin
        Estado
    }
}";


$body = json_encode($query);
$headers = [
    'Content-Type: application/json',
    'Content-Length: '.strlen($body),
    'Authorization: Bearer ' . $token,
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"http://quertium.com/api/v1/apeseg/soat/$placa");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$jsonString = curl_exec ($ch);
curl_close ($ch);
$out = json_decode($jsonString, true);
//var_dump($out);
//

$dni = $_POST['dni'];
$estado = $out['Estado'];
$FechaInicio = $out['FechaInicio'];
$FechaFin = $out['FechaFin'];
$NombreCompania= $out['NombreCompania'];
$NumeroPoliza = $out['NumeroPoliza'];
$NombreUsoVehiculo = $out['NombreUsoVehiculo'];
$NombreClaseVehiculo = $out['NombreClaseVehiculo'];
$FechaControlPolicial = $out['FechaControlPolicial'];
$TipoCertificado = $out['TipoCertificado'];


if ($estado != "VIGENTE") {
  $soat = 'El vehiculo consultado no posee SOAT';

  $sentencia="UPDATE antecedentes SET
                 resultado = 'NO APTO',
                 observacion = '".$soat."'
                 WHERE id_historial='".$id."' ";

$mysqli->query($sentencia) or die ("Error al actualizar datos".mysqli_error($mysqli));


} else {
  $soat = "VIGENTE";
}

  $sentencia="UPDATE vehiculos SET
                 soat = '".$soat."',
                 placa = '".$placa."',
                 orden_captura = '".$crv."',
                 fecha_inicio_soat = '".$FechaInicio."',
                 fecha_fin_soat = '".$FechaFin."',
                 nombrecompania = '".$NombreCompania."',
                 numeropoliza = '".$NumeroPoliza."',
                 NombreUsoVehiculo = '".$NombreUsoVehiculo."',
                 nombreclasevehiculo = '".$NombreClaseVehiculo."',
                 fechacontrolpolicial = '".$FechaControlPolicial."',
                 TipoCertificado = '".$TipoCertificado."'
                 WHERE id_historial='".$id."' ";

$mysqli->query($sentencia) or die ("Error al actualizar datos".mysqli_error($mysqli));
//echo $sentencia;
}