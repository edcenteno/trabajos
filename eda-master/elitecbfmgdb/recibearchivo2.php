<?php
$file = $_POST['id_file'];
$fecha_reg = date("Y-m-d H:i:s");

require 'vendor/autoload.php'; // incluir lo bueno de Composer
/*use Modelo\Conductores;*/
use Purekid\Mongodm\Model;
class ModeloConductor extends Model {

        static $collection = "conductores";

        /** use specific config section **/
        public static $config = 'default';

}


if (isset($file) && isset($_FILES["file"])){
	$uploads_dir = 'vistas/img/dni';
//	var_dump($_POST['back']);
	if ($_POST['back']== "true"){
		$tipo = "r";
	}else{
		$tipo = "f";
	}
	foreach ($_FILES["file"]["error"] as $key => $error) {
	    if ($error == UPLOAD_ERR_OK) {
	        $tmp_name = $_FILES["file"]["tmp_name"][$key];
	        // basename() puede evitar ataques de denegación de sistema de ficheros;
	        // podría ser apropiada más validación/saneamiento del nombre del fichero
	        $name = basename($file.$tipo.".jpg");
	        move_uploaded_file($tmp_name, "$uploads_dir/$name");
	        $return = [
				'error' => false,
				'msj' => "Se guardo el archivo"
			];
	    }
	}
}else{
	$return = [
		'error' => true,
		'msj' => "No se encontraron datos"
	];
}

echo json_encode($return);

$conductores = ModeloConductor::one(['dni'=>$file]);

if ($_POST['back']== "true"){
	$conductores->update([
				'dni_digital_r' => $name,
				'fecha_dni_digital_r' => $fecha_reg
				]);
	$conductores->save();
}else{
	$conductores->update([
				'dni_digital' => $name,
				'fecha_dni_digital' => $fecha_reg
				]);
	$conductores->save();

}

?>