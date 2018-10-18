<?php
 namespace DatosPeru;
error_reporting(0);
 include "conex.php";
$fecha_reg = date("Y-m-d H:i:s");
$dni=$_POST['dni'];
$placa=$_POST['placa'];
$cabify = $_POST['cabify'];
$easy = $_POST['easy'];
$type = $_POST['type'];

  class Peru  {
    function __construct()
    {
      $this->reniec = new \Reniec\Reniec();
      $this->essalud = new \EsSalud\EsSalud();
      $this->mintra = new \MinTra\mintra();
    }
    function search( $dni )
    {

 /*     $response = $this->reniec->search( $dni );
      if($response->success == true)
      {
        $rpt = (object)array(
          "success"     => true,
          "source"    => "reniec",
          "result"    => $response->result
        );
        return $rpt;
      }*/
/*
        $response = $this->mintra->check( $dni );
        if( $response->success == true )
        {
          $rpt = (object)array(
            "success"     => true,
            "source"    => "mintra",
            "result"    => $response->result
          );
          return $rpt;
        }*/
 $response = $this->essalud->check( $dni );
      if($response->success == true)
      {
        $rpt = (object)array(
          "success"     => true,
          "source"    => "essalud",
          "result"    => $response->result
        );
        return $rpt;
      }




      $rpt = (object)array(
        "success"     => false,
        "msg"       => "No se encontraron datos"
      );
      return $rpt;
    }
  }


  require_once( __DIR__ . "/src/autoload.php" );

  $test = new \DatosPeru\Peru();

  $out=$test->search("$dni");

 // var_dump($out);
  if ($type == 1) {
  $dni=$out->result->DNI;
  //$apellidos=$out->result->ApellidoPaterno;
  $apellidos=$out->result->ApellidoPaterno. " " .$out->result->ApellidoMaterno;
  $nombre=$out->result->Nombres;
  $fechanac=$out->result->FechaNacimiento;

 $sentencia="UPDATE conductores SET
                 nombre = '".$nombre."',
                 apellido = '".$apellidos."',
                 fecha_nacimiento = '".$fechanac."',
                 resultado = ''
                 WHERE dni='".$dni."' ";

$mysqli->query($sentencia) or die ("Error al actualizar datos".mysqli_error($mysqli));
echo $sentencia;
}



if ($placa == "NINGUNO" || $placa == "" || $placa == "NINGUNA") {

if ($cabify == 1 && $easy == 1) {
  $sentencia="UPDATE conductores SET
                 act = act+1,
                 act_cbf = act_cbf + 1,
                 act_easy = act_easy + 1,
                 fecha_act = '".$fecha_reg."'
                 WHERE dni='".$dni."' ";

$mysqli->query($sentencia) or die ("Error al actualizar datos".mysqli_error($mysqli));
}

if ($cabify == 0 && $easy == 0) {
  $sentencia="UPDATE conductores SET
                 act = act+1,
                 act_cbf = act_cbf + 1,
                 act_easy = act_easy + 1,
                 fecha_act = '".$fecha_reg."'
                 WHERE dni='".$dni."' ";
$mysqli->query($sentencia) or die ("Error al actualizar datos".mysqli_error($mysqli));
//////echo $sentencia;
}

if ($cabify == 1 && $easy == 0) {
  $sentencia="UPDATE conductores SET
                 act = act+1,
                 act_cbf = act_cbf + 1,
                 fecha_act = '".$fecha_reg."'
                 WHERE dni='".$dni."' ";
$mysqli->query($sentencia) or die ("Error al actualizar datos".mysqli_error($mysqli));
//////echo $sentencia;
}

if ($cabify == 0 && $easy == 1) {
  $sentencia="UPDATE conductores SET
                 act_easy = act_easy + 1,
                 act = act+1,
                 fecha_act = '".$fecha_reg."'
                 WHERE dni='".$dni."' ";
$mysqli->query($sentencia) or die ("Error al actualizar datos".mysqli_error($mysqli));
}

}
else {
   // Modo de Uso
    require_once("crv/src/autoload.php");

    $test = new \Pit\Pit();
    $out=$test->check( "$placa" ); // Sin Requisitoria


    $crv = $out['message'];
    //echo $crv;

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
/*//echo "<pre>";
var_dump($out);

//echo"</pre>";*/


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


if ($estado == "VIGENTE") {
  $soat = "VIGENTE";
//if ($crv =="El vehiculo de placa $placa TIENE ORDEN DE CAPTURA por los siguientes conceptos.") {
if ($cabify == 1 && $easy == 1) {
  $sentencia="UPDATE conductores SET
                 act = act+1,
                 act_cbf = act_cbf + 1,
                 act_easy = act_easy + 1,
                 fecha_act = '".$fecha_reg."',
                 soat = '".$estado."',
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
                 WHERE dni='".$dni."' ";

$mysqli->query($sentencia) or die ("Error al actualizar datos".mysqli_error($mysqli));
}
if ($cabify == 0 && $easy == 0) {
  $sentencia="UPDATE conductores SET
                 act = act+1,
                 act_cbf = act_cbf + 1,
                 act_easy = act_easy + 1,
                 fecha_act = '".$fecha_reg."',
                 soat = '".$estado."',
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
                 WHERE dni='".$dni."' ";
$mysqli->query($sentencia) or die ("Error al actualizar datos".mysqli_error($mysqli));
////echo $sentencia;
}

if ($cabify == 1 && $easy == 0) {
  $sentencia="UPDATE conductores SET
                 act = act+1,
                 act_cbf = act_cbf + 1,
                 fecha_act = '".$fecha_reg."',
                 soat = '".$estado."',
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
                 WHERE dni='".$dni."' ";
$mysqli->query($sentencia) or die ("Error al actualizar datos".mysqli_error($mysqli));
////echo $sentencia;
}

if ($cabify == 0 && $easy == 1) {
  $sentencia="UPDATE conductores SET
                 act_easy = act_easy + 1,
                 act = act+1,
                 fecha_act = '".$fecha_reg."',
                 soat = '".$estado."',
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
                 WHERE dni='".$dni."' ";
$mysqli->query($sentencia) or die ("Error al actualizar datos".mysqli_error($mysqli));
}
} else {
  $soat = 'El vehiculo consultado no posee SOAT';

  if ($cabify == 1 && $easy == 1) {
  $sentencia="UPDATE conductores SET
                 act = act+1,
                 act_cbf = act_cbf + 1,
                 act_easy = act_easy + 1,
                 fecha_act = '".$fecha_reg."',
                 soat = '".$soat."',
                 placa = '".$placa."',
                 orden_captura = '".$crv."',
                 observacion = '".$soat."'',
                 resultado = 'NO APTO'
                 WHERE dni='".$dni."' ";

$mysqli->query($sentencia) or die ("Error al actualizar datos".mysqli_error($mysqli));
}
if ($cabify == 0 && $easy == 0) {
  $sentencia="UPDATE conductores SET
                 act = act+1,
                 act_cbf = act_cbf + 1,
                 act_easy = act_easy + 1,
                 fecha_act = '".$fecha_reg."',
                 soat = '".$soat."',
                 placa = '".$placa."',
                 orden_captura = '".$crv."',
                 observacion = '".$soat."',
                 resultado = 'NO APTO'
                 WHERE dni='".$dni."' ";
$mysqli->query($sentencia) or die ("Error al actualizar datos".mysqli_error($mysqli));
////echo $sentencia;
}

if ($cabify == 1 && $easy == 0) {
  $sentencia="UPDATE conductores SET
                 act = act+1,
                 act_cbf = act_cbf + 1,
                 fecha_act = '".$fecha_reg."',
                 soat = '".$soat."',
                 placa = '".$placa."',
                 orden_captura = '".$crv."',
                 observacion = '".$soat."',
                 resultado = 'NO APTO'
                 WHERE dni='".$dni."' ";
$mysqli->query($sentencia) or die ("Error al actualizar datos".mysqli_error($mysqli));
////echo $sentencia;
}

if ($cabify == 0 && $easy == 1) {
  $sentencia="UPDATE conductores SET
                 act_easy = act_easy + 1,
                 act = act+1,
                 fecha_act = '".$fecha_reg."',
                 soat = '".$soat."',
                 placa = '".$placa."',
                 orden_captura = '".$crv."',
                 observacion = '".$soat."',
                  resultado = 'NO APTO'
                  WHERE dni='".$dni."' ";
$mysqli->query($sentencia) or die ("Error al actualizar datos".mysqli_error($mysqli));
}
}

}


?>