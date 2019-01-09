<?php
//error_reporting(0);
 include "conex.php";
$dni = $_POST['dni'];
$type = $_POST['type'];
$placa = $_POST['placa'];
$id = $_POST['id'];

    require_once("srcsunat/autoload.php");

    $company = new \Sunat\Sunat( true, true );

    $search2 = $company->search( $dni );
    if($search2->success == true ){
       $ruc = $search2->result->ruc;
    }
    if($search2->message == "No se pudo conectar a sunat."){
        $ruc= "No se pudo conectar a sunat.";
    }
    if($search2->success != true && $search2->message != "No se pudo conectar a sunat."){
        $ruc = "No posee RUC.";
    }

 $sentencia="UPDATE historial SET
                 ruc = '".$ruc."'
                 WHERE dni='".$dni."' ";

$mysqli->query($sentencia) or die ("Error al actualizar datos".mysqli_error($mysqli));
//echo $sentencia;
echo "TRUE";


