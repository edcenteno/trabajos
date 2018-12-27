<?php
require 'vendor/autoload.php';
use Modelo\Usuarios;

$busqueda = strval($_POST['query']);

  $users = Usuarios::find(array("nombre" => new MongoRegex("/$busqueda/")));

  $data=[];
         foreach ($users as $key => $value) {

            $data[]=[
                      $value->dni,
                      $value->nombre
                     ];
        }
          echo json_encode($data);