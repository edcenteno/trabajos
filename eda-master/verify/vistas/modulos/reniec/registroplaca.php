<?php

  require 'modelo/modeloconductor.php';

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

    $conductores = ModeloConductor::one(['dni'=>$dni]);
    $contador_placa = $conductores->contador_act_placa;
    $contador_placa++;

if ($crv =="El vehiculo de placa $placa TIENE ORDEN DE CAPTURA por los siguientes conceptos.") {


    $conductores->update([
                    'placa'=>$placa,
                    'soat'=>$estado,
                    'orden_captura'=>$crv,
                    'fecha_inicio_soat'=>$FechaInicio,
                    'fecha_fin_soat'=>$FechaFin,
                    'nombrecompania'=>$NombreCompania,
                    'numeropoliza'=>$NumeroPoliza,
                    'NombreUsoVehiculo'=>$NombreUsoVehiculo,
                    'orden_captura'=>$crv,
                    'nombreclasevehiculo'=>$NombreClaseVehiculo,
                    'fechacontrolpolicial'=>$FechaControlPolicial,
                    'contador_act_placa'=>$contador_placa,
                    'fecha_act_placa'=>$fecha_reg,
                    'color_vehiculo'=>'',
                    'TipoCertificado'=>$TipoCertificado
                        ]);
    $conductores->save();
    echo "1";

} else {
   $conductores->update([
                    'placa'=>$placa,
                    'soat'=>$estado,
                    'orden_captura'=>$crv,
                    'fecha_inicio_soat'=>$FechaInicio,
                    'fecha_fin_soat'=>$FechaFin,
                    'nombrecompania'=>$NombreCompania,
                    'numeropoliza'=>$NumeroPoliza,
                    'NombreUsoVehiculo'=>$NombreUsoVehiculo,
                    'orden_captura'=>$crv,
                    'nombreclasevehiculo'=>$NombreClaseVehiculo,
                    'fechacontrolpolicial'=>$FechaControlPolicial,
                    'contador_act_placa'=>$contador_placa,
                    'fecha_act_placa'=>$fecha_reg,
                    'color_vehiculo'=>'',
                    'TipoCertificado'=>$TipoCertificado
                        ]);
    $conductores->save();
     echo "1";
}





 ?>