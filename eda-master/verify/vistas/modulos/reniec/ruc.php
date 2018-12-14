<?php
error_reporting(0);
$dni = $_POST['dni'];
$type = $_POST['type'];

require 'modelo/modeloconductor.php';
$conductores = ModeloConductor::one(['dni'=>$dni]);

if ($type != 1){


}else{
    require_once("srcsunat/autoload.php");

    $company = new \Sunat\Sunat( true, true );

    $search2 = $company->search( $dni );
    if($search2->success == true ){
       $ruc = $search2->result->ruc;
    }
    if($search2->message == "No se pudo conectar a sunat."){
        $ruc = "No se pudo conectar a sunat.";
    }
    if($search2->success != true && $search2->message != "No se pudo conectar a sunat."){
        $ruc = "No posee RUC.";
    }

    $conductores->update([
                          'ruc'=>$ruc
                        ]);
    $conductores->save();

echo "TRUE";

}
?>