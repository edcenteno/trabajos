<?php

require '../vendor/autoload.php'; //

use Purekid\Mongodm\Model;
//require_once "conexion.php";
 class ModeloConductor extends Model
    {

        static $collection = "conductores";

        /** use specific config section **/
        public static $config = 'default';

    }

class TablaConductor{

  /*=============================================
  MOSTRAR LA TABLA DE PRODUCTO
  =============================================*/

  public function mostrarTabla(){

   // $conductores = ControladorConductor::ctrMostrarConductor($item, $valor, $orden);
    $conductores = ModeloConductor::all();


    //var_dump($conductores);
    //return;

    echo '{
      "data": [';

      for($i = 0; $i < count($conductores)-1; $i++){

        $modificar = "<a href='modificar.php?id=".$conductores[$i]->cont."'><button type='button' class='btn btn-outline-primary'><i class='fa fa-pencil'></i></button></a>";


        $eliminar = "<a href='#' data-href='eliminar.php?id=".$conductores[$i]->cont."' data-toggle='modal' data-target='#confirm-delete'><button type='button' class='btn btn-outline-danger'><i class='fa fa-trash-o'></i></button></a>";

          echo '[
            "'.$conductores[$i]->cont.'",
            "'.$conductores[$i]->fecha.'",
            "'.$conductores[$i]->dni.'",
            "'.$conductores[$i]->nombre.'",
            "'.$conductores[$i]->apellido.'",
            "'.$conductores[$i]->placa.'",
            "'.$conductores[$i]->soat.'",
            "'.$conductores[$i]->resultado.'",
            "'.$conductores[$i]->ant_penales.'",
            "'.$conductores[$i]->ant_judicial.'",
            "'.$conductores[$i]->ant_policial.'",
            "'.$modificar.'",
            "'.$eliminar.'"
          ],';

      }

      $modificar = "<a href='modificar.php?id=".$conductores[count($conductores)-1]->cont."'><button type='button' class='btn btn-outline-primary'><i class='fa fa-pencil'></i></button></a>";


      $eliminar = "<a href='#' data-href='eliminar.php?id=".$conductores[count($conductores)-1]->cont."' data-toggle='modal' data-target='#confirm-delete'><button type='button' class='btn btn-outline-danger'><i class='fa fa-trash-o'></i></button></a>";

       echo'[

            "'.$conductores[count($conductores)-1]->cont.'",
            "'.$conductores[count($conductores)-1]->fecha.'",
            "'.$conductores[count($conductores)-1]->dni.'",
            "'.$conductores[count($conductores)-1]->nombre.'",
            "'.$conductores[count($conductores)-1]->apellido.'",
            "'.$conductores[count($conductores)-1]->placa.'",
            "'.$conductores[count($conductores)-1]->soat.'",
            "'.$conductores[count($conductores)-1]->resultado.'",
            "'.$conductores[count($conductores)-1]->ant_penales.'",
            "'.$conductores[count($conductores)-1]->ant_judicial.'",
            "'.$conductores[count($conductores)-1]->ant_policial.'",
            "'.$modificar.'",
            "'.$eliminar.'"
      ]
      ]
    }';



  }


}

/*=============================================
ACTIVAR TABLA DE conductores
=============================================*/
$activar = new TablaConductor();
$activar -> mostrarTabla();
