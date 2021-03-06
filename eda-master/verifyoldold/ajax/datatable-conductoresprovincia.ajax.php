<?php
//error_reporting(0);
//session_start();
require_once "../controladores/conductores.controlador.php";
require_once "../modelos/conductores.modelo.php";
require '../modelos/vendor/autoload.php'; //

use Purekid\Mongodm\Model;
 class Provincias extends Model
    {

        static $collection = "provincias";

        /** use specific config section **/
        public static $config = 'default';

    }

class TablaConductor{
/*=============================================
  MOSTRAR LA TABLA DE PRODUCTO
  =============================================*/

  public function mostrarTabla(){




    $conductores = ControladorConductor::ctrMostrarConductorProvincia();

    echo '{
            "data": [';

            for($i = 0; $i < count($conductores)-1; $i++){
                 $vermas= "<div class='btn-group'><a class='btn btn-success btnvermas' href='index.php?ruta=vermas&idconductor=".$conductores[$i]->dni."' target='_blank'>ver<i class='fa fa-fw fa-plus'></i></a></div>";


                if($conductores[$i]->observacion != ""){

                   $dni= "<span class='badge badge-warning ml-auto'>".$conductores[$i]->dni."</span>";

                 }else{

                  $dni = $conductores[$i]->dni;

                }
             if ($conductores[$i]->ant_policial == "" || $conductores[$i]->ant_judicial == "" || $conductores[$i]->ant_penales == "" || $conductores[$i]->soat == "undefined") {

              $soat = "";

             }else{

             $soat = $conductores[$i]->resultado;

            }
                $cabify = $conductores[$i]->cabify;
                $easytaxi = $conductores[$i]->easytaxi;

                if ($cabify == '1' && $easytaxi == 1) {
                    $cabify= "Cabify &nbsp&nbsp   <img width='30' src='vistas/img/plantilla/favicon.ico'><br> Easytaxi <img width='30' src='vistas/img/plantilla/easy.png'>";
                }else if ($easytaxi == 1 && $cabify == 0) {
                    $cabify= "easytaxi <img width='30' src='vistas/img/plantilla/easy.png'>";
                }else if ($easytaxi == 0 && $cabify == 1) {
                    $cabify = "cabify <img width='30' src='vistas/img/plantilla/favicon.ico'>";
                }else if ($easytaxi == 0 && $cabify == 0) {
                    $cabify = "";
                }

                 $provincias = Provincias::one(['id'=>$conductores[$i]->id_provincia
                                          ]);


                echo '[
                  "'.$conductores[$i]->fecha.'",
                  "'.$provincias->descripcion.'",
                  "'.$dni.'",
                  "'.$conductores[$i]->nombre.'",
                  "'.$conductores[$i]->apellido.'",
                  "'.$conductores[$i]->placa.'",
                  "'.$cabify.'",
                  "'.$soat.'",
                  "'.$vermas.'"
                ],';

            }

            $vermas="<div class='btn-group'><a class='btn btn-success btnvermas' href='index.php?ruta=vermas&idconductor=".$conductores[count($conductores)-1]->dni."' target='_blank'>ver<i class='fa fa-fw fa-plus'></i></a></div>";

            if ($conductores[count($conductores)-1]->cabify == 1 && $conductores[count($conductores)-1]->easytaxi == 1) {
                    $empresa= "Cabify &nbsp&nbsp   <img width='30' src='vistas/img/plantilla/favicon.ico'><br> Easytaxi <img width='30' src='vistas/img/plantilla/easy.png'>";
                }
            if ($conductores[count($conductores)-1]->easytaxi == 1 && $conductores[count($conductores)-1]->cabify == 0) {
                    $empresa= "easytaxi <img width='30' src='vistas/img/plantilla/easy.png'>";
                }

            if ($conductores[count($conductores)-1]->easytaxi == 0 && $conductores[count($conductores)-1]->cabify == 1) {
                $empresa= "cabify <img width='30' src='vistas/img/plantilla/favicon.ico'>";
            }
            if ($conductores[count($conductores)-1]->easytaxi == 0 && $conductores[count($conductores)-1]->cabify == 0) {
                $empresa= "";
            }

            if ($conductores[count($conductores)-1]->ant_policial == "" || $conductores[count($conductores)-1]->ant_judicial == "" || $conductores[count($conductores)-1]->ant_penales == "" || $conductores[count($conductores)-1]->soat == "undefined") {

              $soat = "";

             }else{

             $soat = $conductores[count($conductores)-1]->resultado;

            }

              $provincias = Provincias::one(['id'=>$conductores[count($conductores)-1]->id_provincia
            ]);

           echo'[

            "'.$conductores[count($conductores)-1]->fecha.'",
            "'.$provincias->descripcion.'",
            "'.$conductores[count($conductores)-1]->dni.'",
            "'.$conductores[count($conductores)-1]->nombre.'",
            "'.$conductores[count($conductores)-1]->apellido.'",
            "'.$conductores[count($conductores)-1]->placa.'",
            "'.$empresa.'",
            "'.$soat.'",
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
