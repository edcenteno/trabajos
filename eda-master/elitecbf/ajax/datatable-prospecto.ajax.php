<?php

require_once "../controladores/prospectos.controlador.php";
require_once "../modelos/prospecto.modelo.php";


class TablaProspecto{

  /*=============================================
  MOSTRAR LA TABLA DE PRODUCTO
  =============================================*/ 

  public function mostrarTabla(){

  	$item = null;
    $valor = null;
    $orden = "id";

  	$conductores = ControladorProspecto::ctrMostrarProspecto($item, $valor, $orden);
  	//var_dump($conductores);
  	//return;
  	
  	echo '{
			"data": [';

			for($i = 0; $i < count($conductores)-1; $i++){
				 /*$vermas= "<div class='btn-group'><a class='btn btn-success btnvermas' href='index.php?ruta=vermas&idconductor=".$conductores[$i]["dni"]."' target='_blank'>ver<i class='fa fa-fw fa-plus'></i></a></div>";

				
				if($conductores[$i]["observacion"] != ""){

		           $dni= "<span class='badge badge-warning ml-auto'>".$conductores[$i]["dni"]."</span>";

		         }else{

		          $dni = $conductores[$i]["dni"];

		        }*/
		       


				echo '[
			      "'.$conductores[$i]["dni"].'",
			      "'.$conductores[$i]["nombre"].'",
			      "'.$conductores[$i]["apellido"].'"
			     
			    ],';

			}

			/*$vermas="<div class='btn-group'><a class='btn btn-success btnvermas' href='index.php?ruta=vermas&idconductor=".$conductores[count($conductores)-1]["dni"]."' target='_blank'>ver<i class='fa fa-fw fa-plus'></i></a></div>";*/
		   echo'[
			     
			      "'.$conductores[count($conductores)-1]["dni"].'",
			      "'.$conductores[count($conductores)-1]["nombre"].'",
			      "'.$conductores[count($conductores)-1]["apellido"].'"
			      
			]
			]
		}';



  }


}

/*=============================================
ACTIVAR TABLA DE conductores
=============================================*/ 
$activar = new TablaProspecto();
$activar -> mostrarTabla();
