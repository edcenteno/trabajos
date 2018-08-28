<?php

    require_once "php/conexion.php";
    $conexion=conexion();

        $dni = $_POST['dni'];
        $estado = $_POST['estado'];
        $placa = $_POST['placa'];
        $crv = $_POST['crv'];
        $FechaInicio = $_POST['FechaInicio'];
        $FechaFin = $_POST['FechaFin'];
        $NombreCompania = $_POST['NombreCompania'];
        $NumeroPoliza = $_POST['NumeroPoliza'];
        $NombreUsoVehiculo = $_POST['NombreUsoVehiculo'];
        $NombreClaseVehiculo = $_POST['NombreClaseVehiculo'];
        $FechaControlPolicial = $_POST['FechaControlPolicial'];
        $FechaControlPolicial = $_POST['FechaControlPolicial'];
        $TipoCertificado = $_POST['TipoCertificado'];



            $sql="UPDATE conductores SET
                 placa = '".$placa."',
                 soat = '".$estado."',
                 orden_captura = '".$crv."',
                 fecha_inicio_soat = '".$FechaInicio."',
                 fecha_fin_soat = '".$FechaFin."',
                 nombrecompania = '".$NombreCompania."',
                 numeropoliza = '".$NumeroPoliza."',
                 NombreUsoVehiculo = '".$NombreUsoVehiculo."',
                 NombreClaseVehiculo = '".$NombreClaseVehiculo."',
                 FechaControlPolicial = '".$FechaControlPolicial."',
                 TipoCertificado = '".$TipoCertificado."'
                 WHERE dni='".$dni."' ";
                                //echo $sql;

            $result=mysqli_query($conexion,$sql);

            echo "1";


 ?>