<?php
$dni=$_POST['dni'];
include "conex.php";
  require_once("srchector/autoload.php" );

  $essalud = new \EsSalud\EsSalud();
  $mintra = new \MinTra\mintra();

    $search1 = $essalud->search( $dni );



    if( $search1->success == true )
    {
        $nombre = $search1->Nombres;
        $apellido = $search1->ApellidoPaterno;
        $apellidom = $search1->ApellidoMaterno;
        $fecha_nacimiento = $search1->FechaNacimiento;


        $nombres=$nombre . ' ' . $apellido. ' '.$apellidom;

        $sentencia="UPDATE historial SET
                 nombre = '".$nombres."',
                 fecha_nacimiento = '".$fecha_nacimiento."'
                 WHERE dni='".$dni."' ";

        $mysqli->query($sentencia) or die ("Error al actualizar datos".mysqli_error($mysqli));

    }else{
        $search2 = $mintra->search( $dni );


    if( $search2->success == true )
    {
        $nombre = $search2->nombre;
        $apellido = $search2->paterno;
        $apellidom = $search2->materno;
        $fecha_nacimiento = $search2->nacimiento;

       $nombres= $nombre . ' ' . $apellido. ' '.$apellidom;

        $sentencia="UPDATE historial SET
                 nombre = '".$nombres."',
                 fecha_nacimiento = '".$fecha_nacimiento."'
                 WHERE dni='".$dni."' ";

        $mysqli->query($sentencia) or die ("Error al actualizar datos".mysqli_error($mysqli));
    }
}
    if($search1->success==false && $search2->success==false)
    {
        echo "ERROR : " . $search->message;
    }



