<?php 

	require_once "conexion.php";
	$conexion=conexion();

		$nombre=$_POST['nombre'];
		$apellidos=$_POST['apellidos'];
		$dni=$_POST['dni'];
		$estado=$_POST['estado'];
		$placa=$_POST['placa'];

		if(buscaRepetido($dni,$conexion)==1){
			echo 2;
		}else{
			$sql="INSERT into conductores (dni,nombre, apellido,soat,placa, fecha)
				values ('$dni','$nombre', '$apellidos', '$estado', '$placa', NOW( ))";
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