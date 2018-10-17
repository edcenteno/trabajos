<?php

include 'conex.php';
$conexion = conexion();

$sql = "SELECT * FROM historial";
$result=mysqli_query($conexion,$sql);

    if(mysqli_num_rows($result) > 0){
        foreach ($result as $key => $value) {
            $id = $value['id'];

         $sentencia="INSERT INTO historial  (id, id_historial) values (NULL, '$id')";

        $reg=mysqli_query($conexion,$sentencia);
        //var_dump($reg);
        }
    }else{
       echo "error";
}

?>