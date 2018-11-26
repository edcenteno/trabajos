<?php
require 'modelo/modeloconductor.php';
require_once("crv/src/autoload.php");


$fecha_reg = date("Y-m-d H:i:s");
$placa=$_POST['placa'];
$cabify = $_POST['cabify'];
$easy = $_POST['easy'];



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

echo"</pre>";*/


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
$observacion = "";
$conductores = ModeloConductor::one(['dni'=>$dni]);
$contsoat = $conductores->contsoat;
$contsoat++;

if ($estado == "VIGENTE") {

        $conductores->update([
                        'fecha_actsoat'=>$fecha_reg,
                        'soat'=>$estado,
                        'fecha_inicio_soat'=>$FechaInicio,
                        'fecha_fin_soat'=>$FechaFin,
                        'nombrecompania'=>$NombreCompania,
                        'numeropoliza'=>$NumeroPoliza,
                        'NombreUsoVehiculo'=>$NombreUsoVehiculo,
                        'orden_captura'=>$crv,
                        'nombreclasevehiculo'=>$NombreClaseVehiculo,
                        'fechacontrolpolicial'=>$FechaControlPolicial,
                        'contsoat'=>$contsoat,
                        'observacion'=>'',
                        'resultado'=>'APTO',
                        'TipoCertificado'=>$TipoCertificado
                            ]);
        $conductores->save();

} else {

    $soat = 'El vehiculo consultado no posee SOAT';
    $estado = "VENCIDO";

        $conductores->update([
                'fecha_actsoat'=>$fecha_reg,
                'soat'=>$estado,
                'orden_captura'=>$crv,
                'contsoat'=>$contsoat,
                'observacion'=>$soat,
                'resultado'=>'NO APTO',
                'TipoCertificado'=>$TipoCertificado
                    ]);
        $conductores->save();


}
