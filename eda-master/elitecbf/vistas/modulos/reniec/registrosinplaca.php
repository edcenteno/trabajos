<?php

	require_once "php/conexion.php";
	$conexion=conexion();
 		$usuario_reg = $_POST['usuario_reg'];
		$nombre=$_POST['nombre'];
		$apellidos=$_POST['apellidos'];
		$dni=$_POST['dni'];
		//$easytaxi=$_POST['easytaxi'];
		$cabify=$_POST['cabify'];
		$easytaxi=$_POST['easytaxi'];
		$fecha_nacimiento=$_POST['fechaNacimiento'];
		$placa="NINGUNO";

       if (!isset($_POST['tipoext'])){
       		$tipoext =1;
       }else{
       	$tipoext = $_POST['tipoext'];
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
				$sql="INSERT into conductores (dni,nombre, apellido, fecha_nacimiento, placa, cabify, easytaxi, fecha, secuencia_arhu_ant, form, usuario_reg, extr, soat)
					values ('$dni','$nombre', '$apellidos','$fecha_nacimiento', '$placa', '$cabify', '$easytaxi', NOW( ), '$secuencia', 'Nuevo', '$usuario_reg', '$tipoext', 'NO POSEE')";
				$result=mysqli_query($conexion,$sql);

				$sql="INSERT into proceso
								(dni,nombre, apellido, fecha_reg)
						values
								('$dni','$nombre', '$apellidos', NOW( ))";
								//echo $sql;
				$result=mysqli_query($conexion,$sql);
				//var_dump($sql);

				echo "1";



			}



			} else {
				echo '3';
			}
		}
 ?>