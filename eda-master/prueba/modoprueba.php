<?php

include 'conex.php';
$conexion = conexion();

$sql = "SELECT * FROM historial";
$result=mysqli_query($conexion,$sql);

    if(mysqli_num_rows($result) > 0){
        foreach ($result as $key => $value) {
            $id = $value['id'];
            $placa = $value['placa'];

         $sentencia="INSERT INTO vehiculos  (id, id_historial, placa) values (NULL, '$id', '$placa')";

        $reg=mysqli_query($conexion,$sentencia);
        //var_dump($reg);
        }
    }else{
       echo "error";
}

?>