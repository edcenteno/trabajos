<?php
$file = $_POST['id_file'];


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


//require_once "php/conexion.php";
$conexion=mysqli_connect("localhost","root","","arhuantecedentes");
if ($_POST['back']== "true"){
		$sql="UPDATE conductores SET dni_digital_r = '$name', fecha_dni_digital_r = NOW() WHERE dni = '$file'";
	$result=mysqli_query($conexion,$sql);
	}else{
		$sql="UPDATE conductores SET dni_digital = '$name', fecha_dni_digital = NOW() WHERE dni = '$file'";
	$result=mysqli_query($conexion,$sql);
	}


	//echo $sql;

?>