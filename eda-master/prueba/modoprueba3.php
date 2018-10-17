<?php

    $mysqli = new mysqli('localhost', 'root', '', 'arhuantecedentes');
        $mysqli->set_charset('utf8');
    if($mysqli->connect_error){

        die('Error en la conexion' . $mysqli->connect_error);

    }

include 'conex.php';
$conexion = conexion();


$año = date("Y");
$mes = date("M");
 $secuencia_arhu_ant = "00000";



$sql = "SELECT * FROM historial";
$result=mysqli_query($conexion,$sql);

    if(mysqli_num_rows($result) > 0){
        foreach ($result as $key => $value) {


        $secuencia_arhu_ant++;
        $saa=str_pad($secuencia_arhu_ant, 5, "0", STR_PAD_LEFT);
        $secuencia =  "RA-" .$año . $mes. $saa;
            $id = $value['id'];
         $sentencia="UPDATE historial SET
                             secuencia_arhu_ant = '".$secuencia."'
                             WHERE id ='".$id."' ";


        $mysqli->query($sentencia) or die ("Error al actualizar datos".mysqli_error($mysqli));
        //var_dump($reg);
        }
    }else{
       echo "error";
}

?>