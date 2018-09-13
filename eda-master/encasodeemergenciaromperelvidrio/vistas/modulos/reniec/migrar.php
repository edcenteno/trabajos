<?php

    require_once "php/conexion.php";
    $conexion=conexion();

        $cabify = $_POST['cabify'];
        $easytaxi = $_POST['easytaxi'];
        $dni = $_POST['dni'];

        if ($cabify == "") {
            $cabify = 1;
            $sql="UPDATE conductores SET
                 migrarcabf = '1',
                 cabify = '".$cabify."',
                 fechamigra = NOW()
                 WHERE dni='".$dni."' ";


            $result=mysqli_query($conexion,$sql);
        }



        if ($easytaxi == "") {
            $easytaxi = 1;
            $sql="UPDATE conductores SET
                 migrareasy = '1',
                 easytaxi = '".$easytaxi."',
                 fechamigra = NOW()

                 WHERE dni='".$dni."' ";


            $result=mysqli_query($conexion,$sql);
        }

        if ($easytaxi == "undefined") {
            $easytaxi = 1;
        }
         if ($cabify == "undefined") {
            $cabify = 1;
        }


            echo "1";


 ?>