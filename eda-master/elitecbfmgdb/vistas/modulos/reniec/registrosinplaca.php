<?php

require 'vendor3/autoload.php'; // incluir lo bueno de Composer
/*use Modelo\Conductores;*/
use Purekid\Mongodm\Model;
class ModeloConductor extends Model {

        static $collection = "conductores";

        /** use specific config section **/
        public static $config = 'default';

    }
		$fecha_reg = date("Y-m-d H:i:s");
	    $usuario_reg = $_POST['usuario_reg'];
		$nombre=$_POST['nombre'];
		$apellidos=$_POST['apellidos'];
		$dni=$_POST['dni'];
		//$easytaxi=$_POST['easytaxi'];
		$cabify=$_POST['cabify'];
		$easytaxi=$_POST['easytaxi'];
		$fecha_nacimiento=$_POST['fechaNacimiento'];
		$provincia=$_POST['provincia'];
		$placa="NINGUNO";

       if (!isset($_POST['tipoext'])){
       		$tipoext =1;
       }else{
       	$tipoext = $_POST['tipoext'];
       }

		function buscaRepetido($dni){

			$count = ModeloConductor::count(array('dni'=>$dni));

			if($count > 0){
				return 1;
			}else{
				return 0;
			}
		}
		if ($easytaxi == "undefined") {
			$easytaxi = "0" ;
		}
		/*if ($easyeconomy == "undefined") {
			$easyeconomy = "0" ;
		}*/

		if ($cabify == "undefined") {
			$cabify = "0" ;
		}

		if ($cabify == "0" && $easytaxi == "0") {
			echo "4";
		} else {
			if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $nombre) || preg_match('/^[a-zA-Z]+$/', $nombre) ||
			   preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $apellidos) || preg_match('/^[a-zA-Z]+$/', $apellidos) ||
			   strlen($dni) >= 8  || strlen($fecha_nacimiento) == 10 ){


			if(buscaRepetido($dni)==1){
				echo 2;
			}else{

				$conductores = ModeloConductor::all()->sortBy(function($conductor){
			    return $conductor->_id;
			    })->take(1);
			    $secuencia_arhu_ant = $conductores[0]->secuencia_arhu_ant;;

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
					'soat' => 'NO POSEE',
					'ant_penales' => '',
			        'ant_judicial' => '',
			        'ant_policial' => '',
			        'record_cond' => '',
			        'resultado' => '',
			        'soat' => '',
			        'observacion' => '',
			        'validarpdf' => 0,
			        'empresa' => '',
			        'blacklist' => null,
			        'fechaentrega' => '',
			        'estado_civil' => '',
			        'fecha_soat' => '',
			        'orden_captura' => '',
			        'fecha_inicio_soat' => '',
			        'fecha_fin_soat' => '',
			        'nombrecompania' => '',
			        'numeropoliza' => '',
			        'NombreUsoVehiculo' => '',
			        'nombreclasevehiculo' => '',
			        'fechacontrolpolicial' => '',
			        'TipoCertificado' => '',
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
			        'form' => '',
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



			} else {
				echo '3';
			}
		}
 ?>