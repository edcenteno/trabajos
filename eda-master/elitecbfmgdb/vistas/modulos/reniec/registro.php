<?php

require 'modelo/modeloconductor.php';


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
		$usuario_reg=$_POST['usuario_reg'];
		$provincia=$_POST['provincia'];

		if(buscaRepetido($dni)==1){
			echo 2;
		}else{
		//	echo $estado;

				$conductores = ModeloConductor::all()->sortBy(function($conductor){
			    return $conductor->_id;
			    })->take(1);
			    $secuencia_arhu_ant = $conductores[0]->secuencia_arhu_ant;
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


			$conductores = new ModeloConductor([
					'plus' => '',
					'dni' => $dni,
					'nombre' => $nombre,
					'apellido' => $apellidos,
					'placa' => $placa,
					'fecha_nacimiento' => $fecha_nacimiento,
					'cabify' => $cabify,
					'easytaxi' => $easytaxi,
					'extr' => 1,
					'fecha' => $fecha_reg,
					'secuencia_arhu_ant' => $secuencia,
					'usuario_reg' => $usuario_reg,
					'soat' => $estado,
					'ant_penales' => '',
			        'ant_judicial' => '',
			        'ant_policial' => '',
			        'record_cond' => '',
			        'resultado' => '',
			        'observacion' => '',
			        'validarpdf' => 0,
			        'empresa' => '',
			        'blacklist' => null,
			        'fechaentrega' => '',
			        'estado_civil' => '',
			        'fecha_soat' => '',
			        'orden_captura' => $crv,
			        'fecha_inicio_soat' => $FechaInicio,
			        'fecha_fin_soat' => $FechaFin,
			        'nombrecompania' => $NombreCompania,
			        'numeropoliza' => $NumeroPoliza,
			        'NombreUsoVehiculo' => $NombreUsoVehiculo,
			        'nombreclasevehiculo' => $NombreClaseVehiculo,
			        'fechacontrolpolicial' => $FechaControlPolicial,
			        'TipoCertificado' => $TipoCertificado,
			        'observacionPenales' => '',
			        'observacionJudicial' => '',
			        'observacionPolicial' => '',
			        'motivo_penal' => '',
			        'autoridad_penal' => '',
			        'documento_penal' => '',
			        'fecha_proceso_penal' => '',
			        'estado_penal' => '',
			        'tipo_ocurrecia_penal' => '',
			        'tipo_penal' => '',
			        'agraviado_penal' => '',
			        'definicion_delito_penal' => '',
			        'motivo_Policial' => '',
			        'autoridad_Policial' => '',
			        'documento_Policial' => '',
			        'fecha_proceso_Policial' => '',
			        'estado_Policial' => '',
			        'tipo_ocurrecia_Policial' => '',
			        'tipo_Policial' => '',
			        'agraviado_Policial' => '',
			        'definicion_delito_Policial' => '',
			        'motivo_judicial' => '',
			        'autoridad_judicial' => '',
			        'documento_judicial' => '',
			        'fecha_proceso_judicial' => '',
			        'estado_judicial' => '',
			        'tipo_ocurrecia_judicial' => '',
			        'tipo_judicial' => '',
			        'agraviado_judicial' => '',
			        'definicion_delito_judicial' => '',
			        'fecha_foto' => '',
			        'foto' => '',
			        'dni_digital' => '',
			        'dni_digital_r' => '',
			        'fecha_dni_digital' => '',
			        'fecha_act' => '',
			        'act' => 0,
			        'form' => 'Nuevo',
			        'act_cbf' => 0,
			        'act_easy' => 0,
			        'fecha_dni_digital_r' => '',
			        'fecha_migrados' => '',
			        'migrarcabf' => 0,
			        'migrareasy' => 0,
			        'fechamigra' => '',
			        'color_vehiculo' => '',
			        'fecha_actsoat' => '',
			        'contsoat' => 0,
			        'actualizado' => 0,
			        'foto_cbf' => '',
			        'fecha_foto_cbf' => '',
			        'fecha_placa' => '',
			        'contador_act_placa' => 0,
			        'fecha_act_placa' => '',
			        'fecha_fab_veh' => '',
			        'cambio_placa' => '',
			        'ruc' => null,
			        'status_licencia' => null,
			        'id_provincia' =>$provincia
				]);

				$conductores->save();

			echo "1";
		}


		function buscaRepetido($dni){
			$count = ModeloConductor::count(array('dni'=>$dni));

			if($count > 0){
				return 1;
			}else{
				return 0;
			}
		}

 ?>