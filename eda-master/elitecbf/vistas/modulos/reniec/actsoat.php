<?php

//error_reporting(0);
$dni=$_POST['dni'];
$placa=$_POST['placa'];
$cabify = $_POST['cabify'];
$easy = $_POST['easy'];


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
/*echo "<pre>";
var_dump($out);

echo"</pre>";
*/

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
 include "conex.php";

if ($estado == "VIGENTE") {
  $soat = "VIGENTE";

$sentencia="UPDATE conductores SET
                 contsoat = contsoat + 1,
                 fecha_actsoat = NOW( ),
                 soat = '".$soat."',
                 placa = '".$placa."',
                 resultado = 'APTO',
                 orden_captura = '".$crv."',
                 fecha_inicio_soat = '".$FechaInicio."',
                 fecha_fin_soat = '".$FechaFin."',
                 nombrecompania = '".$NombreCompania."',
                 numeropoliza = '".$NumeroPoliza."',
                 NombreUsoVehiculo = '".$NombreUsoVehiculo."',
                 nombreclasevehiculo = '".$NombreClaseVehiculo."',
                 fechacontrolpolicial = '".$FechaControlPolicial."',
                 TipoCertificado = '".$TipoCertificado."'
                 WHERE dni='".$dni."' ";
$mysqli->query($sentencia) or die ("Error al actualizar datos".mysqli_error($mysqli));
//echo $sentencia;

} else {
  $soat = 'El vehiculo consultado no posee SOAT';

$sentencia="UPDATE conductores SET
                 contsoat = contsoat + 1,
                 fecha_actsoat = NOW( ),
                 soat = '".$soat."',
                 placa = '".$placa."',
                 resultado = 'NO APTO',
                 orden_captura = '".$crv."',
                 fecha_inicio_soat = '".$FechaInicio."',
                 fecha_fin_soat = '".$FechaFin."',
                 nombrecompania = '".$NombreCompania."',
                 numeropoliza = '".$NumeroPoliza."',
                 NombreUsoVehiculo = '".$NombreUsoVehiculo."',
                 nombreclasevehiculo = '".$NombreClaseVehiculo."',
                 fechacontrolpolicial = '".$FechaControlPolicial."',
                 TipoCertificado = '".$TipoCertificado."'
                 WHERE dni='".$dni."' ";
$mysqli->query($sentencia) or die ("Error al actualizar datos".mysqli_error($mysqli));
//echo $sentencia;
}






?>