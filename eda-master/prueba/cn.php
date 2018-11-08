<?php
require 'vendor/autoload.php'; // incluir lo bueno de Composer
use Modelo\Conductores;
$conductores = Conductores::all();
$count = Conductores::count(array('id_provincia'=>'5'));

$params = array( 'dni'=>'41762372');
$users = Conductores::one($params);     // $users is instance of Collection
echo $users->nombre;
//var_dump($users);

/*foreach ($conductores as $key => $value) {
   echo $value->dni;
   break;
}*/

//var_dump($count);
?>