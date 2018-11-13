<?php

/*include 'conex.php';*/
    function conexion()
    {
        return $conexion=mysqli_connect("localhost","arhuantecedentes","^Zi7ZZl!SCfA","arhuantecedentes");
        //return $conexion=mysqli_connect("localhost","root","","arhuantecedentes");

    }
date_default_timezone_set("America/Lima");
$conexion = conexion();

$sql = "SELECT * FROM ant2";
$result=mysqli_query($conexion,$sql);

    if(mysqli_num_rows($result) > 0){
        foreach ($result as $key => $value) {
            $fecha = $value['fecha'];
            $dni = $value['dni'];
            $nombre = $value['nombre'];
            $placa = $value['placa'];
            $record_cond = $value['record_cond'];
            $apellido = $value['apellido'];
            $extr = $value['extr'];
            $fecha_nacimiento = $value['fecha_nacimiento'];
            $cabify = $value['cabify'];
            $easytaxi = $value['easytaxi'];
            $usuario_reg = $value['usuario_reg'];
            $soat = $value['soat'];
            $ant_penales = $value['ant_penales'];
            $ant_judicial = $value['ant_judicial'];
            $ant_policial = $value['ant_policial'];
            $resultado = $value['resultado'];
            $observacion = $value['observacion'];
            $validarpdf = $value['validarpdf'];
            $empresa = $value['empresa'];
            $blacklist = $value['blacklist'];
            $fechaentrega = $value['fechaentrega'];
            $estado_civil = $value['estado_civil'];
            $fecha_soat = $value['fecha_soat'];
            $orden_captura = $value['orden_captura'];
            $fecha_inicio_soat = $value['fecha_inicio_soat'];
            $fecha_fin_soat = $value['fecha_fin_soat'];
            $nombrecompania = $value['nombrecompania'];
            $numeropoliza = $value['numeropoliza'];
            $NombreUsoVehiculo = $value['NombreUsoVehiculo'];
            $nombreclasevehiculo = $value['nombreclasevehiculo'];
            $fechacontrolpolicial = $value['fechacontrolpolicial'];
            $TipoCertificado = $value['TipoCertificado'];
            $observacionPenales = $value['observacionPenales'];
            $observacionJudicial = $value['observacionJudicial'];
            $observacionPolicial = $value['observacionPolicial'];
            $motivo_penal = $value['motivo_penal'];
            $autoridad_penal = $value['autoridad_penal'];
            $documento_penal = $value['documento_penal'];
            $fecha_proceso_penal = $value['fecha_proceso_penal'];
            $estado_penal = $value['estado_penal'];
            $tipo_ocurrecia_penal = $value['tipo_ocurrecia_penal'];
            $tipo_penal = $value['tipo_penal'];
            $agraviado_penal = $value['agraviado_penal'];
            $definicion_delito_penal = $value['definicion_delito_penal'];
            $motivo_Policial = $value['motivo_Policial'];
            $autoridad_Policial = $value['autoridad_Policial'];
            $documento_Policial = $value['documento_Policial'];
            $fecha_proceso_Policial = $value['fecha_proceso_Policial'];
            $estado_Policial = $value['estado_Policial'];
            $tipo_ocurrecia_Policial = $value['tipo_ocurrecia_Policial'];
            $tipo_Policial = $value['tipo_Policial'];
            $agraviado_Policial = $value['agraviado_Policial'];
            $definicion_delito_Policial = $value['definicion_delito_Policial'];
            $motivo_judicial = $value['motivo_judicial'];
            $autoridad_judicial = $value['autoridad_judicial'];
            $documento_judicial = $value['documento_judicial'];
            $fecha_proceso_judicial = $value['fecha_proceso_judicial'];
            $estado_judicial = $value['estado_judicial'];
            $tipo_ocurrecia_judicial = $value['tipo_ocurrecia_judicial'];
            $tipo_judicial = $value['tipo_judicial'];
            $agraviado_judicial = $value['agraviado_judicial'];
            $definicion_delito_judicial = $value['definicion_delito_judicial'];
            $fecha_foto = $value['fecha_foto'];
            $foto = $value['foto'];
            $dni_digital = $value['dni_digital'];
            $dni_digital_r = $value['dni_digital_r'];
            $fecha_dni_digital = $value['fecha_dni_digital'];
            $fecha_act = $value['fecha_act'];
            $act = $value['act'];
            $form = $value['form'];
            $act_cbf = $value['act_cbf'];
            $act_easy = $value['act_easy'];
            $fecha_dni_digital_r = $value['fecha_dni_digital_r'];
            $fecha_migrados = $value['fecha_migrados'];
            $migrarcabf = $value['migrarcabf'];
            $migrareasy = $value['migrareasy'];
            $fechamigra = $value['fechamigra'];
            $color_vehiculo = $value['color_vehiculo'];
            $fecha_actsoat = $value['fecha_actsoat'];
            $contsoat = $value['contsoat'];
            $actualizado = $value['actualizado'];
            $foto_cbf = $value['foto_cbf'];
            $fecha_foto_cbf = $value['fecha_foto_cbf'];
            $fecha_placa = $value['fecha_placa'];
            $contador_act_placa = $value['contador_act_placa'];
            $fecha_act_placa = $value['fecha_act_placa'];
            $fecha_fab_veh = $value['fecha_fab_veh'];
            $cambio_placa = $value['cambio_placa'];
            $ruc = $value['ruc'];
            $status_licencia = $value['status_licencia'];
            $id_provincia = $value['id_provincia'];


            //  $cabify = 1;
/*
            if($placa == ""){
                $placa = "NINGUNO";

            }

            if($placa == "NINGUNA"){
                $placa = "NINGUNO";

            }*/
            /*$sentencia="SELECT COUNT(*) as cont where dni = $dni";*/

         /* $sentencia=  "UPDATE conductores SET easytaxi = '1', cabify = '0' WHERE dni = '$dni'";*/
         $sentencia="INSERT into conductores
                                (dni, nombre, apellido, ant_penales, ant_judicial, ant_policial, record_cond, fecha, resultado, placa, soat, observacion, validarpdf, empresa, blacklist, fechaentrega, foto, estado_civil, fecha_soat, orden_captura, fecha_inicio_soat, fecha_fin_soat, fecha_nacimiento, nombrecompania, numeropoliza, NombreUsoVehiculo, nombreclasevehiculo, fechacontrolpolicial, TipoCertificado, cabify, easytaxi, observacionPenales, observacionJudicial, observacionPolicial, motivo_penal, autoridad_penal, documento_penal, fecha_proceso_penal, estado_penal, tipo_ocurrecia_penal, tipo_penal, agraviado_penal, definicion_delito_penal, motivo_Policial, autoridad_Policial, documento_Policial, fecha_proceso_Policial, estado_Policial, tipo_ocurrecia_Policial, tipo_Policial, agraviado_Policial, definicion_delito_Policial, motivo_judicial, autoridad_judicial, documento_judicial, fecha_proceso_judicial, estado_judicial, tipo_ocurrecia_judicial, tipo_judicial, agraviado_judicial, definicion_delito_judicial, fecha_foto, dni_digital, fecha_dni_digital, extr, fecha_act, act, form, act_cbf, act_easy, usuario_reg, dni_digital_r, fecha_dni_digital_r, fecha_migrados, migrarcabf, migrareasy, fechamigra, color_vehiculo, fecha_actsoat, contsoat, actualizado, foto_cbf, fecha_foto_cbf, fecha_placa, contador_act_placa, fecha_act_placa, fecha_fab_veh, cambio_placa, ruc, status_licencia, id_provincia)
                        values
                                ('$dni', '$nombre', '$apellido', '$ant_penales', '$ant_judicial', '$ant_policial', '$record_cond', '$fecha', '$resultado', '$placa', '$soat', '$observacion', '$validarpdf', '$empresa', '$blacklist', '$fechaentrega', '$foto', '$estado_civil', '$fecha_soat', '$orden_captura', '$fecha_inicio_soat', '$fecha_fin_soat', '$fecha_nacimiento', '$nombrecompania', '$numeropoliza', '$NombreUsoVehiculo', '$nombreclasevehiculo', '$fechacontrolpolicial', '$TipoCertificado', '$cabify', '$easytaxi', '$observacionPenales', '$observacionJudicial', '$observacionPolicial', '$motivo_penal', '$autoridad_penal', '$documento_penal', '$fecha_proceso_penal', '$estado_penal', '$tipo_ocurrecia_penal', '$tipo_penal', '$agraviado_penal', '$definicion_delito_penal', '$motivo_Policial', '$autoridad_Policial', '$documento_Policial', '$fecha_proceso_Policial', '$estado_Policial', '$tipo_ocurrecia_Policial', '$tipo_Policial', '$agraviado_Policial', '$definicion_delito_Policial', '$motivo_judicial', '$autoridad_judicial', '$documento_judicial', '$fecha_proceso_judicial', '$estado_judicial', '$tipo_ocurrecia_judicial', '$tipo_judicial', '$agraviado_judicial', '$definicion_delito_judicial', '$fecha_foto', '$dni_digital', '$fecha_dni_digital', '$extr', '$fecha_act', '$act', '$form', '$act_cbf', '$act_easy', '$usuario_reg', '$dni_digital_r', '$fecha_dni_digital_r', '$fecha_migrados', '$migrarcabf', '$migrareasy', '$fechamigra', '$color_vehiculo', '$fecha_actsoat', '$contsoat', '$actualizado', '$foto_cbf', '$fecha_foto_cbf', '$fecha_placa', '$contador_act_placa', '$fecha_act_placa', '$fecha_fab_veh', '$cambio_placa', '$ruc', '$status_licencia', '$id_provincia')";

        $reg=mysqli_query($conexion,$sentencia);
        /*echo "<pre>";
        var_dump($sentencia);
        echo "</pre>";*/

        }
        echo "ok";
    }else{
       echo "error";
}

?>