<?php

require_once "../controladores/conductores.controlador.php";
require_once "../modelos/conductores.modelo.php";


class TablaConductor{

  /*=============================================
  MOSTRAR LA TABLA DE PRODUCTO
  =============================================*/

  public function mostrarTabla(){

    $item = null;
    $valor = null;
    $orden = "id";

    $conductores = ControladorConductor::ctrMostrarConductorsoatvencido($item, $valor, $orden);
    //var_dump($conductores);
    //return;

    echo '{
            "data": [';

            for($i = 0; $i < count($conductores)-1; $i++){
                 $vermas= "<div class='btn-group'><a class='btn btn-success btnvermas' href='index.php?ruta=vermassoat&idconductor=".$conductores[$i]["dni"]."' target='_blank'>ver<i class='fa fa-fw fa-plus'></i></a></div>";


                if($conductores[$i]["observacion"] != ""){

                   $dni= "<span class='badge badge-warning ml-auto'>".$conductores[$i]["dni"]."</span>";

                 }else{

                  $dni = $conductores[$i]["dni"];

                }
             if ($conductores[$i]['ant_policial'] == "" || $conductores[$i]['ant_judicial'] == "" || $conductores[$i]['ant_penales'] == "" || $conductores[$i]['soat'] == "undefined" || $conductores[$i]['soat'] == "") {

              $resultado = "";

             }else{

             $resultado = $conductores[$i]['resultado'];

            }
                $cabify = $conductores[$i]["cabify"];
                $easytaxi = $conductores[$i]["easytaxi"];

                if ($cabify == '1' && $easytaxi == 1) {
                    $cabify= "Cabify &nbsp&nbsp   <img width='30' src='vistas/img/plantilla/favicon.ico'><br> Easytaxi <img width='30' src='vistas/img/plantilla/easy.png'>";
                }else if ($easytaxi == 1 && $cabify == 0) {
                    $cabify= "easytaxi <img width='30' src='vistas/img/plantilla/easy.png'>";
                }else if ($easytaxi == 0 && $cabify == 1) {
                    $cabify = "cabify <img width='30' src='vistas/img/plantilla/favicon.ico'>";
                }else if ($easytaxi == 0 && $cabify == 0) {
                    $cabify = "";
                }


                echo '[
                  "'.$conductores[$i]["fecha_fin_soat"].'",
                  "'.$dni.'",
                  "'.$conductores[$i]["nombre"].'",
                  "'.$conductores[$i]["apellido"].'",
                  "'.$conductores[$i]["placa"].'",
                  "'.$cabify.'",
                  "'.$resultado.'",
                  "'.$conductores[$i]["soat"].'",
                  "'.$vermas.'"
                ],';

            }

            $vermas="<div class='btn-group'><a class='btn btn-success btnvermas' href='index.php?ruta=vermassoat&idconductor=".$conductores[count($conductores)-1]["dni"]."' target='_blank'>ver<i class='fa fa-fw fa-plus'></i></a></div>";

            if ($conductores[count($conductores)-1]["cabify"] == 1 && $conductores[count($conductores)-1]["easytaxi"] == 1) {
                    $empresa= "Cabify &nbsp&nbsp   <img width='30' src='vistas/img/plantilla/favicon.ico'><br> Easytaxi <img width='30' src='vistas/img/plantilla/easy.png'>";
                }
            if ($conductores[count($conductores)-1]["easytaxi"] == 1 && $conductores[count($conductores)-1]["cabify"] == 0) {
                    $empresa= "easytaxi <img width='30' src='vistas/img/plantilla/easy.png'>";
                }

            if ($conductores[count($conductores)-1]["easytaxi"] == 0 && $conductores[count($conductores)-1]["cabify"] == 1) {
                $empresa= "cabify <img width='30' src='vistas/img/plantilla/favicon.ico'>";
            }
            if ($conductores[count($conductores)-1]["easytaxi"] == 0 && $conductores[count($conductores)-1]["cabify"] == 0) {
                $empresa= "";
            }

            if ($conductores[count($conductores)-1]['ant_policial'] == "" || $conductores[count($conductores)-1]['ant_judicial'] == "" || $conductores[count($conductores)-1]['ant_penales'] == "" || $conductores[count($conductores)-1]['soat'] == "undefined" || $conductores[count($conductores)-1]['soat'] == "") {

              $resultado = "";

             }else{

             $resultado = $conductores[count($conductores)-1]['resultado'];

            }


           echo'[

                  "'.$conductores[count($conductores)-1]["fecha_fin_soat"].'",
                  "'.$conductores[count($conductores)-1]["dni"].'",
                  "'.$conductores[count($conductores)-1]["nombre"].'",
                  "'.$conductores[count($conductores)-1]["apellido"].'",
                  "'.$conductores[count($conductores)-1]["placa"].'",
                  "'.$empresa.'",
                  "'.$resultado.'",
                  "'.$conductores[count($conductores)-1]["soat"].'",
                  "'.$vermas.'"
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
