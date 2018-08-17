<?php
if (isset($_POST['id_file']) && isset($_FILES["file"])){
	$uploads_dir = 'vistas/img/conductores';
	foreach ($_FILES["file"]["error"] as $key => $error) {
	    if ($error == UPLOAD_ERR_OK) {
	        $tmp_name = $_FILES["file"]["tmp_name"][$key];
	        // basename() puede evitar ataques de denegación de sistema de ficheros;
	        // podría ser apropiada más validación/saneamiento del nombre del fichero
	        $name = basename($_POST['id_file'].".jpg");
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
require_once "php/conexion.php";
$sql="INSERT into conductores (foto, fecha_foto)
					values ('$name',NOW( ))";
				$result=mysqli_query($conexion,$sql);

?>