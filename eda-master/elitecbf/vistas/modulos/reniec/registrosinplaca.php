<?php 

	require_once "php/conexion.php";
	$conexion=conexion();

		$nombre=$_POST['nombre'];
		$apellidos=$_POST['apellidos'];
		$dni=$_POST['dni'];
		$easytaxi=$_POST['easytaxi'];
		$cabify=$_POST['cabify'];
		$fecha_nacimiento=$_POST['fechaNacimiento'];
		$placa="NINGUNO";
		

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
				$sql="INSERT into conductores (dni,nombre, apellido, fecha_nacimiento, placa, cabify, easytaxi, fecha)
					values ('$dni','$nombre', '$apellidos','$fecha_nacimiento', '$placa', '$cabify', '$easytaxi', NOW( ))";
				$result=mysqli_query($conexion,$sql);
				//var_dump($sql);
				echo "1";
			}


			
			} else {
				echo '3';
			}
		}
		
		
		

		

 ?>