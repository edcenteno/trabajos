<?php

require '../vendor/autoload.php'; //

use Purekid\Mongodm\Model;
//require_once "conexion.php";
 class arhconductoresdocs extends Model
    {

        static $collection = "arhconductoresdocs";

        /** use specific config section **/
        public static $config = 'default';

    }

class TablaConductor{

  /*=============================================
  MOSTRAR LA TABLA DE PRODUCTO
  =============================================*/

  public function mostrarTabla(){

   // $conductores = ControladorConductor::ctrMostrarConductor($item, $valor, $orden);
    $conductores = arhconductoresdocs::all();


    //var_dump($conductores);
    //return;

    echo '{
      "data": [';

      for($i = 0; $i < count($conductores)-1; $i++){

        if ($conductores[$i]->record == "0" && $conductores[$i]->dni != ""){
            $record = "<span class='badge badge-danger'>¡Verificar!</span>";
        }else{
            $record = "";
        }

        if ($conductores[$i]->record_slc == "0" && $conductores[$i]->dni != ""){
            $record_slc = "<span class='badge badge-danger'>¡Verificar!</span>";
        }else{
            $record_slc = "";
        }

        if ($conductores[$i]->placa_result == "0" && $conductores[$i]->placa != ""){
            $placa_result = "<span class='badge badge-danger'>¡Verificar!</span>";
        }else{
            $placa_result = "";
        }

          echo '[
            "'.$conductores[$i]->created_at.'",
            "'.$conductores[$i]->dni.'",
            "'.$conductores[$i]->placa.'",
            "'.$record.'",
            "'.$record_slc.'",
            "'.$placa_result.'"
          ],';

      }

        if ($conductores[count($conductores)-1]->record == "0" && $conductores[count($conductores)-1]->dni != ""){
              $record = "<span class='badge badge-danger'>¡Verificar!</span>";
          }else{
              $record = "";
          }

          if ($conductores[count($conductores)-1]->record_slc == "0" && $conductores[count($conductores)-1]->dni != ""){
              $record_slc = "<span class='badge badge-danger'>¡Verificar!</span>";
          }else{
              $record_slc = "";
          }

          if ($conductores[count($conductores)-1]->placa_result == "0" && $conductores[count($conductores)-1]->placa != ""){
              $placa_result = "<span class='badge badge-danger'>¡Verificar!</span>";
          }else{
              $placa_result = "";
        }

       echo'[

            "'.$conductores[count($conductores)-1]->created_at.'",
            "'.$conductores[count($conductores)-1]->dni.'",
            "'.$conductores[count($conductores)-1]->placa.'",
            "'.$record.'",
            "'.$record_slc.'",
            "'.$placa_result.'"
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
