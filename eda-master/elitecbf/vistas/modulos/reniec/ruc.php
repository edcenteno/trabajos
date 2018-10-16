<?php
error_reporting(0);
$dni = $_POST['dni'];
$type = $_POST['type'];

if ($type != 1){

    //echo "es un extranjero";

}else{
    require_once("srcsunat/autoload.php");

    $company = new \Sunat\Sunat( true, true );

    $search2 = $company->search( $dni );
    if($search2->success == true ){
       $ruc = $search2->result->ruc;
    }
    if($search2->message == "No se pudo conectar a sunat."){
        echo "No se pudo conectar a sunat.";
    }
    if($search2->success != true && $search2->message != "No se pudo conectar a sunat."){
        $ruc = "No posee RUC.";
    }


 include "conex.php";
 $sentencia="UPDATE conductores SET
                 ruc = '".$ruc."'
                 WHERE dni='".$dni."' ";

$mysqli->query($sentencia) or die ("Error al actualizar datos".mysqli_error($mysqli));
//echo $sentencia;
echo "rg";

}
?>