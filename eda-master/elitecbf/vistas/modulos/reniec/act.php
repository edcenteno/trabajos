<?php

  namespace DatosPeru;
error_reporting(0);
$dni=$_POST['dni'];

  class Peru  {
    function __construct()
    {
      $this->reniec = new \Reniec\Reniec();
      $this->essalud = new \EsSalud\EsSalud();
      $this->mintra = new \MinTra\mintra();
    }
    function search( $dni )
    {
     /* $response = $this->reniec->search( $dni );
      if($response->success == true)
      {
        $rpt = (object)array(
          "success"     => true,
          "source"    => "reniec",
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

      $response = $this->mintra->check( $dni );
      if( $response->success == true )
      {
        $rpt = (object)array(
          "success"     => true,
          "source"    => "mintra",
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

  //var_dump($out);
  //$dni=$out->result->DNI;
  //$apellidos=$out->result->ApellidoPaterno;
  $apellidos=$out->result->ApellidoPaterno. " " .$out->result->ApellidoMaterno;
  $nombre=$out->result->Nombres;
  $fechanac=$out->result->FechaNacimiento;

  //jhon$token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.MTA2MQ.mNioS0vL0ckba0lPV955HvekjFHzvIcqEVqy1_kBerM';

    // Modo de Uso
  require_once("crv/src/autoload.php");

  $test = new \Pit\Pit();
  $out=$test->check( "$placa" ); // Sin Requisitoria

  $x = json_encode($out);
  //var_dump($x);

$token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.MTAzNA.AmJhTMIv9Bzd9h4KjWijho4Wf0apnT4IoqasWM0dLLE';//token prestado
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

$estado = $out['Estado'];
$FechaInicio = $out['FechaInicio'];
$FechaFin = $out['FechaFin'];
$fechaNacimiento= $_POST['fechaNacimiento'];
$NombreCompania= $out['NombreCompania'];
$NumeroPoliza = $out['NumeroPoliza'];
$NombreUsoVehiculo = $out['NombreUsoVehiculo'];
$NombreClaseVehiculo = $out['NombreClaseVehiculo'];
$FechaControlPolicial = $out['FechaControlPolicial'];
$TipoCertificado = $out['TipoCertificado'];


  include "conex.php";


 $sentencia="UPDATE conductores SET dni ='".$dni."',
                 nombre='".$nombre."',
                 apellido ='".$apellidos."',
                 fecha_nacimiento = '".$fechanac."',
                 soat = '".$estado."',
                 orden_captura = '".$fechanac."',
                 fecha_nacimiento = '".$fechanac."',
                 fecha_nacimiento = '".$fechanac."',
                 fecha_nacimiento = '".$fechanac."',
                 fecha_nacimiento = '".$fechanac."',
                 fecha_nacimiento = '".$fechanac."',

                 WHERE dni='".$dni."' ";
$mysqli->query($sentencia) or die ("Error al actualizar datos".mysqli_error($mysqli));

echo"$sentencia";
?>
