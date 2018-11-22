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

        $modificar = "<a href='modpam.php?id=".$conductores[$i]->dni."'><button type='button' class='btn btn-outline-primary'><i class='fa fa-pencil'></i></button></a>";

          echo '[
            "'.$conductores[$i]->fecha.'",
            "'.$conductores[$i]->dni.'",
            "'.$conductores[$i]->nombre.'",
            "'.$conductores[$i]->apellido.'",
            "'.$conductores[$i]->placa.'",
            "'.$conductores[$i]->resultado.'",
            "'.$modificar.'"
          ],';

      }

      $modificar = "<a href='modpam.php?id=".$conductores[count($conductores)-1]->dni."'><button type='button' class='btn btn-outline-primary'><i class='fa fa-pencil'></i></button></a>";

       echo'[

            "'.$conductores[count($conductores)-1]->fecha.'",
            "'.$conductores[count($conductores)-1]->dni.'",
            "'.$conductores[count($conductores)-1]->nombre.'",
            "'.$conductores[count($conductores)-1]->apellido.'",
            "'.$conductores[count($conductores)-1]->placa.'",
            "'.$conductores[count($conductores)-1]->resultado.'",
            "'.$modificar.'"
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
