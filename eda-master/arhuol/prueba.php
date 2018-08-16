<?php

require 'vendor/autoload.php';
//require 'conexion.php';
$dni = '41896975';
$client = new GuzzleHttp\Client();
$res = $client->request('GET', 'https://captcharh.ddns.net/api/record/principal/'.$dni);
$res->getStatusCode();

$res->getHeader('content-type');

$arr = json_decode($res->getBody());
echo "<pre>";
//var_dump($arr);
echo "</pre>";

echo $arr->{'var_num_documento'};
echo $arr->{'var_num_licencia'};
echo $arr->{'var_departamento'};
echo $arr->{'var_provincia'};
echo $arr->{'var_distrito'};
echo $arr->{'var_direccion'};
echo $arr->{'var_estado_licencia'};
echo $arr->{'dat_fecha_expedicion'};
echo $arr->{'dat_fecha_revalidacion'};
echo $arr->{'var_restricciones1'};
echo "<pre>";
//var_dump($arr);
echo "</pre>";



$client = new GuzzleHttp\Client();
$res = $client->request('GET', 'https://captcharh.ddns.net/api/record/multas/'.$dni);
$res->getStatusCode();

$res->getHeader('content-type');

$arr = json_decode($res->getBody(), true);
echo "<pre>";
//var_dump($arr);
echo "</pre>";

foreach ($arr as $key => $value) {
	echo $value{'papeleta'}."<br>";
	echo $value{'dat_fecha_papeleta'}."<br>";
	echo $value{'str_fec_firme'}."<br>";
	echo $value{'str_estado'}."<br>";
	echo $value{'falta'}."<br>";
	echo $value{'fec_infraccion'}."<br>";
	echo $value{'str_num_infraccion'}."<br>";
	echo $value{'str_num_entidad'}."<br>";
	echo $value{'str_num_entidad'}."<br>";
}


?>