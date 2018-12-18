<?php
//error_reporting(0);
$ruc = $_POST['ruc'];
$fecha_reg = date("Y-m-d H:i:s");

    require_once("srcsunat/autoload.php");
    require_once("../../../modelos/clientes.modelo.php");

    $company = new \Sunat\Sunat( true, true );

    if(buscaRepetido($ruc)==TRUE){
      echo 2;
    }else{
      if (is_numeric($ruc) && strlen($ruc) == 11) {
        if(substr($ruc,0,1)==20){

        $search2 = $company->search( $ruc );
          if($search2->success == true ){

             $cliente = new ModeloClientes([
                          'ruc' =>$ruc,
                          'razon_social' =>$search2->result->razon_social,
                          'condicion' =>$search2->result->condicion,
                          'nombre_comercial' =>$search2->result->nombre_comercial,
                          'tipo' =>$search2->result->tipo,
                          'fecha_inscripcion' =>$search2->result->fecha_inscripcion,
                          'estado' =>$search2->result->estado,
                          'direccion' =>$search2->result->direccion,             // Solo Empresas
                          'sistema_emision' =>$search2->result->sistema_emision,
                          'actividad_exterior' =>$search2->result->actividad_exterior,
                          'actividad_economica' =>$search2->result->actividad_economica,
                          'sistema_contabilidad' =>$search2->result->sistema_contabilidad,
                          'emision_electronica' =>$search2->result->emision_electronica,
                          'ple' =>$search2->result->ple,
                          'emision_electronica' =>$search2->result->emision_electronica,
                          'cantidad_trabajadores' =>$search2->result->cantidad_trabajadores,
                          'representantes_legales' =>$search2->result->representantes_legales,
                          'usuario_re' =>$_POST['usuario_reg'],
                          'fecha_registro'=>$fecha_reg
                                             ]);
              $cliente->save();

                $s = $search2->result->razon_social;

                  $s = str_replace('á', 'a', $s);
                  $s = str_replace('Á', 'A', $s);
                  $s = str_replace('é', 'e', $s);
                  $s = str_replace('É', 'E', $s);
                  $s = str_replace('í', 'i', $s);
                  $s = str_replace('Í', 'I', $s);
                  $s = str_replace('ó', 'o', $s);
                  $s = str_replace('Ó', 'O', $s);
                  $s = str_replace('Ú', 'U', $s);
                  $s = str_replace('ú', 'u', $s);
                  $s = str_replace('"', '', $s);
                  $s = str_replace(':', '', $s);
                  $s = str_replace('.', '', $s);
                  $s = str_replace(',', '', $s);
                  $s = str_replace(';', '', $s);
                  $s = str_replace(' ', '', $s);
                  $s = strtolower ($s);

              $result = $db->createCollection($s);

             echo 1;
          }

          if($search2->message == "No se pudo conectar a sunat."){

             echo 3;

          }

          if($search2->success != true && $search2->message != "No se pudo conectar a sunat."){
              $ruc = "RUC Erroneo.";
             echo 4;

          }
        }else{
          echo 6;
        }
      }else{
        echo 5;
      }
    }

    function buscaRepetido($ruc){
      $count = ModeloClientes::count(array('ruc'=>$ruc));

        if($count > 0){
          return TRUE;
        }else{
          return FALSE;
        }
    }

?>