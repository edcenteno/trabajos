<?php

require_once "../controladores/personas.controlador.php";
require_once "../modelos/personas.modelo.php";

use Purekid\Mongodm\Model;

    $item = null;
    $valor = null;

    $personas = ControladorPersonas::ctrMostrarPersonas($item, $valor);

          $data=[];
         foreach ($personas as $key => $value) {

            $vermas= "<div class='btn-group'><a class='btn btn-success btnvermas' href='index.php?ruta=vermas&idpersonas=".$value->dni."' target='_blank'>ver<i class='fa fa-fw fa-plus'></i></a></div>";


            $data[]=[
                      $value->fecha,
                      $value->dni,
                      $value->nombre,
                      $value->apellido,
                      $value->resultado,
                      $vermas
                     ];
        }
          echo json_encode(["data"=>$data]);
?>