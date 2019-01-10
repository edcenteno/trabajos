<?php

require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";

use Purekid\Mongodm\Model;

    $item = null;
    $valor = null;

   $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
          $contador=0;
          $data=[];
         foreach ($usuarios as $key => $value){

            $editar= '<button class="btn btn-rounded btn-ft btn-warning btnEditarUsuario" idUsuario="'.$value->usuario.'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil"></i></button>';



            if($value->foto != ""){

              $foto = '<img src="'.$value->foto.'" class="img-thumbnail" width="40px">';

            }else{

              $foto = '<img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px">';

            }

             if($value->estado != 0){

                echo '<td><button class="btn btn-rounded btn-ft btn-success btn-xs btnActivar" idUsuario="'.$value->usuario.'" estadoUsuario="0">Activado</button></td>';

              }else{

                echo '<td><button class="btn btn-rounded btn-ft btn-danger btn-xs btnActivar" idUsuario="'.$value->usuario.'" estadoUsuario="1">Desactivado</button></td>';


              }

            $item = 'ruc';
            $valor = $value->empresa;
            $clientes = ControladorClientes::ctrMostrarClientes($item, $valor);

            foreach ($clientes as $key => $valueclientes) {
              $empresa = $valueclientes['razon_social'];
            }

            $data[]=[
                      ($contador),
                      $value->nombre,
                      $value->usuario,
                      $foto,
                      $value->perfil,
                      $empresa,
                      $value->ultimo_login,
                      $editar
                    ];
        }
          echo json_encode(["data"=>$data]);
?>