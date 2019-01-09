<?php
require '../../../modelos/personas.modelo.php';
require '../../../modelos/antecedentes.modelo.php';
$coleccion ='individuosarhuinternacionalsac';
		$fecha_reg = date("Y-m-d H:i:s");
	    $usuario_reg = $_POST['usuario_reg'];
		$nombre=$_POST['nombre'];
		$apellidos=$_POST['apellidos'];
		$dni=$_POST['dni'];
		$antecedentes=$_POST['antecedentes'];

		$fecha_nacimiento=$_POST['fechaNacimiento'];


       if (!isset($_POST['tipoext'])){
       		$tipoext =1;
       }else{
       	$tipoext = $_POST['tipoext'];
       }

		function buscaRepetido($dni){

			$count = ModeloPersonas::count(array('dni'=>$dni));

			if($count > 0){
				return 1;
			}else{
				return 0;
			}
		}
		/*if ($easytaxi == "undefined") {
			$easytaxi = "0" ;
		}*/
		/*if ($easyeconomy == "undefined") {
			$easyeconomy = "0" ;
		}*/

		if ($antecedentes == "undefined") {
			$antecedentes = "0" ;
		}

		if ($antecedentes == "0") {
			echo "4";
		} else {
			if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $nombre) || preg_match('/^[a-zA-Z]+$/', $nombre) ||
			   preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $apellidos) ||
			   preg_match('/^[a-zA-Z]+$/', $apellidos) ||
			   strlen($dni) >= 8  || strlen($fecha_nacimiento) == 10 ){


			if(buscaRepetido($dni)==1){
				echo 2;
			}else{
				$personas = new ModeloPersonas([
											'dni' => $dni,
											'nombre' => $nombre,
											'apellido' => $apellidos,
											'fechanacimiento' => $fecha_nacimiento,
											'tipo_doc' => $tipoext,
											'fecha' => $fecha_reg,
											'usuario_reg' => $usuario_reg
												]);
//					var_dump($personas);

					$personas->setColection($coleccion);

				$personas->save();

				switch (1) {
					case "$antecedentes":
						# code...
						break;

					default:
						# code...
						break;
				}
				if ($antecedentes == "1") {
					$antecedentes = new ModeloAntecedentes([
											'idPersonas' => $personas->_id,
												]);
					$antecedentes->save();
				}
				if ($recordconductor == "1") {
					$recordconductor = new ModeloRecordConductor([
											'idPersonas' => $personas->_id,
												]);
					$recordconductor->save();
				}
				if ($historialacademico == "1") {
					$historialacademico = new ModeloHistorialAcademico([
											'idPersonas' => $personas->_id,
												]);
					$historialacademico->save();
				}
				if ($antecedentes == "1") {
					$antecedentes = new ModeloAntecedentes([
											'idPersonas' => $personas->_id,
												]);
					$antecedentes->save();
				}
				if ($antecedentes == "1") {
					$antecedentes = new ModeloAntecedentes([
											'idPersonas' => $personas->_id,
												]);
					$antecedentes->save();
				}
				if ($antecedentes == "1") {
					$antecedentes = new ModeloAntecedentes([
											'idPersonas' => $personas->_id,
												]);
					$antecedentes->save();
				}




				echo "1";



			}



			} else {
				echo '3';
			}
		}
 ?>