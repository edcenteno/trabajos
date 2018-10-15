<?php

    $mysqli = new mysqli('localhost', 'root', '', 'arhuantecedentes');
        $mysqli->set_charset('utf8');
    if($mysqli->connect_error){

        die('Error en la conexion' . $mysqli->connect_error);

    }

include 'conex.php';
$conexion = conexion();

$sql = "SELECT * FROM vehiculos";
$result=mysqli_query($conexion,$sql);

    if(mysqli_num_rows($result) > 0){
        foreach ($result as $key => $value) {
            $id = $value['id'];
            $id_historial = $value['id_historial'];
            $placa = $value['placa'];

         $sentencia="UPDATE historial SET
                             id_vehiculo = '".$id."'
                             WHERE id ='".$id_historial."' ";


        $mysqli->query($sentencia) or die ("Error al actualizar datos".mysqli_error($mysqli));
        //var_dump($reg);
        }
    }else{
       echo "error";
}

?>