<?php
error_reporting(0);
$dni = $_POST['dni'];

  require_once("srcsunat/autoload.php");

    $company = new \Sunat\Sunat( true, true );

    $search2 = $company->search( $dni );
    if( $search2->success == true )
    {
       $ruc = $search2->result->ruc;
    }
 include "conex.php";
 $sentencia="UPDATE conductores SET
                 ruc = '".$ruc."'
                 WHERE dni='".$dni."' ";

$mysqli->query($sentencia) or die ("Error al actualizar datos".mysqli_error($mysqli));
//echo $sentencia;
?>