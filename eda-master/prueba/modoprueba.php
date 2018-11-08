<?php

/*include 'conex.php';*/
    function conexion()
    {
        return $conexion=mysqli_connect("localhost","arhuantecedentes","^Zi7ZZl!SCfA","arhuantecedentes");
    }
date_default_timezone_set("America/Lima");
$conexion = conexion();

$sql = "SELECT * FROM excel";
$result=mysqli_query($conexion,$sql);

    if(mysqli_num_rows($result) > 0){
        foreach ($result as $key => $value) {
            $fecha = $value['fecha'];
            $dni = $value['dni'];
            $nombres = $value['nombres'];
            $apellidos = $value['apellidos'];
            $placa = $value['placa'];
            $empresa = $value['empresa'];

            if($empresa == "Easy Taxi"){
                $easy = 1;
                $cabify = "";

            }
            if($empresa == "Cabify"){
                $cabify = 1;
                $easy = "";

            }
            if($empresa == ""){
                $easy = 1;
                $cabify = 1;
            }
            if($placa == ""){
                $placa = "NINGUNO";

            }

            if($placa == "COMPAN"){
                $placa = "NINGUNO";

            }

         $sentencia="INSERT INTO conductores (fecha, dni, nombre, apellido, placa, cabify, easytaxi, id_provincia)
                        values ('$fecha', '$dni', '$nombres', '$apellidos', '$placa', '$cabify', '$easy', '4')";

        $reg=mysqli_query($conexion,$sentencia);
        //var_dump($sentencia);

        }
    }else{
       echo "error";
}

?>