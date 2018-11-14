<?php
include 'php/conexion.php';
//$placa=$_POST['placa'];

$conexion=conexion();
$placa="ABC123";
if (strlen($placa) == 6) {



  //jhon$token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.MTA2MQ.mNioS0vL0ckba0lPV955HvekjFHzvIcqEVqy1_kBerM';

  	// Modo de Uso
	require_once("crv/src/autoload.php");

	$test = new \Pit\Pit();
	$out=$test->check( "$placa" ); // Sin Requisitoria
  $provincia="piura";
  //var_dump($out);
  $crv = $out["message"];
  if ($crv == "El vehiculo de placa $placa no tiene orden de captura en la provincia de Lima.") {

    $crv = "El vehiculo de placa $placa no tiene orden de captura en la provincia de $provincia.";
  } else {
     $crv ="El vehiculo de placa $placa TIENE ORDEN DE CAPTURA por los siguientes conceptos.";

  }

  echo $crv;



	/*$x = json_encode($out);
  echo $x->message;*/

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
echo "<pre>";
var_dump($out);

echo"</pre>";

/*echo "NombreCompania : ".$out['NombreCompania']." <br>";
echo "FechaInicio : ". $out['FechaInicio'] ."<br>";
echo "FechaFin : ".$out['FechaFin']." <br>";*/
$nombre =$_POST['nombre'];
$apellidos= $_POST['apellidos'];
$dni = $_POST['dni'];
$estado = $out['Estado'];

echo "dni ". $dni." <br>";
echo "nombre ". $nombre." <br>";
echo "apellidos ". "$apellidos"." <br>";
echo "Estado :  ".$out['Estado'] ."<br>";

?>
<?php



} else {
  echo "Introduzca una placa valida";
}



?>
