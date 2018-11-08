<?php
$file = $_POST['id_file'];


if (isset($file) && isset($_FILES["file"])){
    $uploads_dirpdf = 'extensiones/tcpdf/pdf/images/conductorescbf';
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

echo json_encode($return);



$conexion=mysqli_connect("localhost","root","","arhuantecedentes");
$sql="UPDATE conductores SET foto = '$name', fecha_foto = NOW() WHERE dni = '$file'";
    $result=mysqli_query($conexion,$sql);


?>