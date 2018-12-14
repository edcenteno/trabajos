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
	$uploads_dirpdf = 'extensiones/tcpdf/pdf/images/conductores';

	foreach ($_FILES["file"]["error"] as $key => $error) {
	    if ($error == UPLOAD_ERR_OK) {
	        $tmp_name = $_FILES["file"]["tmp_name"][$key];
	        // basename() puede evitar ataques de denegación de sistema de ficheros;
	        // podría ser apropiada más validación/saneamiento del nombre del fichero
	        $name = basename($file.".jpg");

	        move_uploaded_file($tmp_name, "$uploads_dirpdf/$name");
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

$conductores = ModeloConductor::one(['dni'=>$file]);

$conductores->update([
					'foto' => $name,
					'fecha_foto' => $fecha_reg
					]);

$conductores->save();
/*echo($conductores);*/
//echo json_encode($return);
?>