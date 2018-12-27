<?php
$cabify = $_POST['cabify'];
$easytaxi = $_POST['easytaxi'];
$dni = $_POST['dni'];
$fecha_reg = date("Y-m-d H:i:s");

require 'modelo/modeloconductor.php';
$conductores = ModeloConductor::one(['dni'=>$dni]);

        if ($cabify == "") {
           $cabify = 1;

            $conductores->update([
                                  'migrarcabf'=>'1',
                                  'cabify'=>'1',
                                  'fechamigra'=>$fecha_reg
                                ]);
            $conductores->save();

        }

        if ($easytaxi == "") {

            $conductores->update([
                                  'migrarcabf'=>'1',
                                  'easytaxi'=>'1',
                                  'fechamigra'=>$fecha_reg
                                ]);
            $conductores->save();


        }

        if ($easytaxi == "undefined") {
            $easytaxi = 1;
        }
         if ($cabify == "undefined") {
            $cabify = 1;
        }


            echo "1";


 ?>