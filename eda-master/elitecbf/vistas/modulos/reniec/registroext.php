<?php

    require_once "php/conexion.php";
    $conexion=conexion();

        $fecha_reg = date("Y-m-d H:i:s");

        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $dni = $_POST['dni'];
        $estado = $_POST['estado'];
        $placa = $_POST['placa'];
        $crv = $_POST['crv'];
        $FechaInicio = $_POST['FechaInicio'];
        $FechaFin = $_POST['FechaFin'];
        $fecha_nacimiento = $_POST['fechaNacimiento'];
        $NombreCompania = $_POST['NombreCompania'];
        $NumeroPoliza = $_POST['NumeroPoliza'];
        $NombreUsoVehiculo = $_POST['NombreUsoVehiculo'];
        $NombreClaseVehiculo = $_POST['NombreClaseVehiculo'];
        $FechaControlPolicial = $_POST['FechaControlPolicial'];
        $FechaControlPolicial = $_POST['FechaControlPolicial'];
        $TipoCertificado = $_POST['TipoCertificado'];
        $easytaxi=$_POST['easytaxi'];
        $cabify=$_POST['cabify'];
        $tipoext=$_POST['tipoext'];
        $usuario_reg=$_POST['usuario_reg'];

        if(buscaRepetido($dni,$conexion)==1){
            echo 2;
        }else{
            require_once "conex.php";
                $sqlsecu = "SELECT * FROM conductores ORDER BY fecha DESC LIMIT 1";
                $resultado = $mysqli->query($sqlsecu);
                $row = $resultado->fetch_array(MYSQLI_ASSOC);
                $secuencia_arhu_ant = $row['secuencia_arhu_ant'];
                $secu = substr($secuencia_arhu_ant, 7, -5);
                $mes = date("M");
                if ($secu == $mes) {
                    $saa=str_pad($secuencia_arhu_ant, 5, "0", STR_PAD_LEFT);
                    $secuencia_arhu_ant++;
                    $secuencia = $secuencia_arhu_ant;
                }else{
                    $año = date("Y");
                    $mes = date("M");
                    $secuencia_arhu_ant = "00000";
                    $secuencia_arhu_ant++;
                    $saa=str_pad($secuencia_arhu_ant, 5, "0", STR_PAD_LEFT);
                    $secuencia =  "RA-" .$año . $mes. $saa;
                }
            $sql="INSERT into conductores
                                (dni,nombre, apellido,soat,placa, orden_captura, fecha_inicio_soat,
                                 fecha_fin_soat, fecha_nacimiento, nombrecompania, numeropoliza,
                                 NombreUsoVehiculo, easytaxi, cabify, nombreclasevehiculo,
                                 fechacontrolpolicial, TipoCertificado, fecha, secuencia_arhu_ant, extr, form, usuario_reg)
                        values
                                ('$dni','$nombre', '$apellidos', '$estado', '$placa', '$crv',
                                 '$FechaInicio', '$FechaFin', '$fecha_nacimiento', '$NombreCompania',
                                 '$NumeroPoliza', '$NombreUsoVehiculo', '$easytaxi', '$cabify',
                                 '$NombreClaseVehiculo', '$FechaControlPolicial', '$TipoCertificado',
                                 '$fecha_reg', '$secuencia', '$tipoext', 'Nuevo', '$usuario_reg')";
                                //echo $sql;
            $result=mysqli_query($conexion,$sql);

            /*$sql="INSERT into proceso
                                (dni,nombre, apellido, fecha_reg)
                        values
                                ('$dni','$nombre', '$apellidos', NOW( ))";
                                //echo $sql;

            $result=mysqli_query($conexion,$sql);
*/
            echo "1";
        }


        function buscaRepetido($dni,$conexion){
            $sql="SELECT * from conductores
                where dni='$dni'";
            $result=mysqli_query($conexion,$sql);

            if(mysqli_num_rows($result) > 0){
                return 1;
            }else{
                return 0;
            }
        }

 ?>