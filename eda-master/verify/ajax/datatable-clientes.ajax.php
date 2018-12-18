<?php

require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";

use Purekid\Mongodm\Model;

    $item = null;
    $valor = null;

    $clientes = ControladorClientes::ctrMostrarClientes($item, $valor);

          $data=[];
         foreach ($clientes as $key => $value) {
            $vermas= "<div class='btn-group'><a class='btn btn-success btnvermas' href='index.php?ruta=vermascliente&idcliente=".$value->ruc."' target='_blank'>ver<i class='fa fa-fw fa-plus'></i></a></div>";

            $data[]=[
                      $value->ruc,
                      $value->razon_social,
                      $value->representantes_legales['r1']['nombre'],
                      $vermas
                     ];
        }
          echo json_encode(["data"=>$data]);
