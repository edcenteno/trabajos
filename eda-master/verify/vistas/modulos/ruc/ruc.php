<?php
//error_reporting(0);
$ruc = $_POST['ruc'];

    require_once("srcsunat/autoload.php");

    $company = new \Sunat\Sunat( true, true );

    $search2 = $company->search( $ruc );
    if($search2->success == true ){
       $ruc = $search2->result->ruc;
       echo 1;



    }

    if($search2->message == "No se pudo conectar a sunat."){
        $ruc = "No se pudo conectar a sunat.";
       echo 2;

    }

    if($search2->success != true && $search2->message != "No se pudo conectar a sunat."){
        $ruc = "No posee RUC.";
       echo 3;

    }


?>