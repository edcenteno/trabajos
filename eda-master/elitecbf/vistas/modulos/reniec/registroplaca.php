<?php

    require_once "php/conexion.php";
    $conexion=conexion();

        $fecha_reg = date("Y-m-d H:i:s");

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

if ($crv =="El vehiculo de placa $placa TIENE ORDEN DE CAPTURA por los siguientes conceptos.") {
     $sql="UPDATE conductores SET
                 placa = '".$placa."',
                 soat = '".$estado."',
                 orden_captura = '".$crv."',
                 fecha_inicio_soat = '".$FechaInicio."',
                 fecha_fin_soat = '".$FechaFin."',
                 nombrecompania = '".$NombreCompania."',
                 numeropoliza = '".$NumeroPoliza."',
                 resultado = 'NO APTO',
                 NombreUsoVehiculo = '".$NombreUsoVehiculo."',
                 nombreclasevehiculo = '".$NombreClaseVehiculo."',
                 fechacontrolpolicial = '".$FechaControlPolicial."',
                 contador_act_placa = contador_act_placa+1,
                 fecha_act_placa = '".$fecha_reg."',
                 TipoCertificado = '".$TipoCertificado."'
                 WHERE dni='".$dni."' ";
                                //echo $sql;

            $result=mysqli_query($conexion,$sql);
            echo "1";
} else {
   $sql="UPDATE conductores SET
                 placa = '".$placa."',
                 soat = '".$estado."',
                 orden_captura = '".$crv."',
                 fecha_inicio_soat = '".$FechaInicio."',
                 fecha_fin_soat = '".$FechaFin."',
                 nombrecompania = '".$NombreCompania."',
                 numeropoliza = '".$NumeroPoliza."',
                 NombreUsoVehiculo = '".$NombreUsoVehiculo."',
                 nombreclasevehiculo = '".$NombreClaseVehiculo."',
                 fechacontrolpolicial = '".$FechaControlPolicial."',
                 contador_act_placa = contador_act_placa+1,
                 fecha_act_placa = '".$fecha_reg."',
                 TipoCertificado = '".$TipoCertificado."'
                 WHERE dni='".$dni."' ";
                                //echo $sql;

            $result=mysqli_query($conexion,$sql);

            echo "1";
}





 ?>