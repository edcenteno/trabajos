<?php

/*include 'conex.php';*/
    function conexion()
    {
       // return $conexion=mysqli_connect("localhost","arhuantecedentes","^Zi7ZZl!SCfA","arhuantecedentes");
        return $conexion=mysqli_connect("localhost","root","","arhuantecedentes");

    }
date_default_timezone_set("America/Lima");
$conexion = conexion();

$sql = "SELECT * FROM restores";
$result=mysqli_query($conexion,$sql);

    if(mysqli_num_rows($result) > 0){
        foreach ($result as $key => $value) {
            $fecha = $value['fecha'];
            $dni = $value['dni'];
           /* $nombres = $value['nombre'];
            $placa = $value['placa'];
            $puntaje = $value['puntaje'];
            $apellido = $value['apellido'];
            $extr = $value['tipo'];*/

            //  $cabify = 1;
/*
            if($placa == ""){
                $placa = "NINGUNO";

            }

            if($placa == "NINGUNA"){
                $placa = "NINGUNO";

            }*/
            /*$sentencia="SELECT COUNT(*) as cont where dni = $dni";*/

          $sentencia=  "UPDATE conductores SET easytaxi = '1', cabify = '0' WHERE dni = '$dni'";
       /*  $sentencia="INSERT INTO conductores (fecha, dni, nombre, apellido, placa, record_cond, cabify, extr, id_provincia)
                        values ('$fecha', '$dni', '$nombres', '$apellido', '$placa', '$puntaje', '$cabify', '$extr', '4')";*/

        $reg=mysqli_query($conexion,$sentencia);
        echo "<pre>";
        var_dump($sentencia);
        echo "</pre>";

        }
        echo "ok";
    }else{
       echo "error";
}

?>