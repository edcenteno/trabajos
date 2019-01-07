<?php

require_once "../controladores/conductores.controlador.php";
require_once "../modelos/conductores.modelo.php";

require '../modelos/vendor/autoload.php'; //

use Purekid\Mongodm\Model;
//require_once "conexion.php";
 class Provincias extends Model
    {

        static $collection = "provincias";

        /** use specific config section **/
        public static $config = 'default';

    }

    $item = null;
    $valor = null;
    $orden = "id";

    $conductores = ControladorConductor::ctrMostrarConductor($item, $valor, $orden);

          $data=[];
         foreach ($conductores as $key => $value) {

            $vermas= "<div class='btn-group'><a class='btn btn-success btnvermas' href='index.php?ruta=vermas&idconductor=".$value->dni."' target='_blank'>ver<i class='fa fa-fw fa-plus'></i></a></div>";


        if($value->observacion != ""){

               $dni= "<span class='badge badge-warning ml-auto'>".$value->dni."</span>";

             }else{

              $dni = $value->dni;

            }
             if ($value->ant_policial == "" || $value->ant_judicial == "" || $value->ant_penales == "" || $value->soat == "undefined") {

              $soat = "";

             }else{

             $soat = $value->resultado;

            }
                $cabify = $value->cabify;
                $easytaxi = $value->easytaxi;

                if ($cabify == '1' && $easytaxi == 1) {
                    $cabify= "Cabify &nbsp&nbsp   <img width='30' src='vistas/img/plantilla/favicon.ico'><br> Easytaxi <img width='30' src='vistas/img/plantilla/easy.png'>";
                }else if ($easytaxi == 1 && $cabify == 0) {
                    $cabify= "easytaxi <img width='30' src='vistas/img/plantilla/easy.png'>";
                }else if ($easytaxi == 0 && $cabify == 1) {
                    $cabify = "cabify <img width='30' src='vistas/img/plantilla/favicon.ico'>";
                }else if ($easytaxi == 0 && $cabify == 0) {
                    $cabify = "";
                }
            $provincias = Provincias::one(['id'=>$value->id_provincia
            ]);


            $data[]=[
                      $value->fecha,
                      $provincias->descripcion,
                      $dni,
                      $value->nombre,
                      $value->apellido,
                      $value->placa,
                      $cabify,
                      $soat,
                      $vermas
                    ];
        }
          echo json_encode(["data"=>$data]);
