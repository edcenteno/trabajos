<?php 

	require_once "php/conexion.php";
	$conexion=conexion();

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

		if(buscaRepetido($dni,$conexion)==1){
			echo 2;
		}else{
			$sql="INSERT into conductores 
										(dni,nombre, apellido,soat,placa, orden_captura, fecha_inicio_soat,
										 fecha_fin_soat, fecha_nacimiento, nombrecompania, numeropoliza,
										 NombreUsoVehiculo, easytaxi, cabify, nombreclasevehiculo, 
										 fechacontrolpolicial, TipoCertificado, fecha)
				values 
									('$dni','$nombre', '$apellidos', '$estado', '$placa', '$crv', 
									 '$FechaInicio', '$FechaFin', '$fecha_nacimiento', '$NombreCompania', 
									 '$NumeroPoliza', '$NombreUsoVehiculo', '$easytaxi', '$cabify', 
									 '$NombreClaseVehiculo', '$FechaControlPolicial', '$TipoCertificado', 
									 NOW( ))";
								//echo $sql;
				
			$result=mysqli_query($conexion,$sql);
			//var_dump($sql);
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