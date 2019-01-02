<?php
require '../../../modelos/personas.modelo.php';
require '../../../modelos/clientes.modelo.php';
require '../../../modelos/antecedentes.modelo.php';


$fecha_reg = date("Y-m-d H:i:s");
//$ruc = $_POST['ruc'];
$ruc = "20557675052";
$usuario_reg = $_POST['usuario_reg'];
$nombre=$_POST['nombre'];
$apellidos=$_POST['apellidos'];
$dni=$_POST['dni'];
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

				$personas->save();

				$item = "ruc";
    			$valor = $ruc;

				$params = array($item=>$valor);
				$cliente = ModeloClientes::one($params);

				foreach ($cliente as $key => $value) {
					$confg = $value['config'];
						foreach ($confg as $key => $value) {

							switch ($value) {
								case "5c1bcfa002c45b42547c87be":
									$antecedentes = new ModeloAntecedentes([
													'idPersonas' => $personas->_id,
														]);
									$antecedentes->save();
									break;
								case "5c2698109c07a73c605bc13f":
									$antecedentes = new ModeloRecordConductor([
													'idPersonas' => $personas->_id,
														]);
									$antecedentes->save();
									break;
								case "5c2698499c07a73c605bc140":
									$antecedentes = new ModeloHistorialAcademico([
													'idPersonas' => $personas->_id,
														]);
									$antecedentes->save();
									break;
								case "5c2698589c07a73c605bc141":
									$antecedentes = new ModeloRecordCrediticio([
													'idPersonas' => $personas->_id,
														]);
									$antecedentes->save();
									break;
								case "5c26986d9c07a73c605bc142":
									$antecedentes = new ModeloHistorialLaboral([
													'idPersonas' => $personas->_id,
														]);
									$antecedentes->save();
									break;
								case "5c26988e9c07a73c605bc143":
									$antecedentes = new ModeloVerificacionDomiciliaria([
													'idPersonas' => $personas->_id,
														]);
									$antecedentes->save();
									break;

								default:
									# code...
									break;
						}
					}
				}

				echo "1";



			}



			} else {
				echo '3';
			}

 ?>