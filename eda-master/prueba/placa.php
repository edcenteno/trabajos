<?php
include 'php/conexion.php';
$placa=$_POST['placa'];
/**
* Extraido de http://ecapy.com/reemplazar-la-n-acentos-espacios-y-caracteres-especiales-con-php-actualizada/
* Reemplaza todos los acentos por sus equivalentes sin ellos
*
* @param $string
*  string la cadena a sanear
*
* @return $string
*  string saneada
*/
function eliminar_simbolos($string){

    $string = trim($string);

    $string = str_replace(
        array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
        array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
        $string
    );

    $string = str_replace(
        array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
        array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
        $string
    );

    $string = str_replace(
        array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
        array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
        $string
    );

    $string = str_replace(
        array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
        array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
        $string
    );

    $string = str_replace(
        array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
        array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
        $string
    );

    $string = str_replace(
        array('ñ', 'Ñ', 'ç', 'Ç'),
        array('n', 'N', 'c', 'C',),
        $string
    );

    $string = str_replace(
        array("\\", "¨", "º", "-", "~",
             "#", "@", "|", "!", "\"",
             "·", "$", "%", "&", "/",
             "(", ")", "?", "'", "¡",
             "¿", "[", "^", "<code>", "]",
             "+", "}", "{", "¨", "´",
             ">", "< ", ";", ",", ":",
             ".", " "),
        ' ',
        $string
    );
return $string;
}

//Ejemplo


/*$placa = eliminar_simbolos($placa);

echo $placa;*/
$placa = str_replace("-","",$placa);
echo $placa;

$conexion=conexion();
//$placa="ABC123";
if (strlen($placa) == 6) {



  //jhon$token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.MTA2MQ.mNioS0vL0ckba0lPV955HvekjFHzvIcqEVqy1_kBerM';

  	// Modo de Uso
	require_once("crv/src/autoload.php");

	$test = new \Pit\Pit();
	$out=$test->check( "$placa" ); // Sin Requisitoria

  //var_dump($out);
  /*echo $out["message"];*/

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
