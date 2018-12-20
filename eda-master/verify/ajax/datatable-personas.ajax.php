<?php

require_once "../controladores/personas.controlador.php";
require_once "../modelos/personas.modelo.php";

    $item = null;
    $valor = null;

    $personas = ControladorPersonas::ctrMostrarPersonas($item, $valor);
    //var_dump($personas->count());
          $data=[];

         foreach ($personas->all() as $key => $value) {

            $vermas= "<div class='btn-group'><a class='btn btn-success btnvermas' href='index.php?ruta=vermas&idconductor=".$value->dni."' target='_blank'>ver<i class='fa fa-fw fa-plus'></i></a></div>";


        if($value->observacion != ""){

               $dni= "<span class='badge badge-warning ml-auto'>".$value->dni."</span>";

             }else{

              $dni = $value->dni;

            }

            $data[]=[
                      $value->fecha,
                      $dni,
                      $value->nombre,
                      $value->apellido,
                      $value->resultado,
                      $vermas
                    ];
        }
          echo json_encode(["data"=>$data]);


