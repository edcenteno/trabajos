<?php
$dni=$_POST['dni'];
include "conex.php";
  //require_once("/srchector/autoload.php" );

  /*$essalud = new \EsSalud\EsSalud();
  $mintra = new \MinTra\mintra();

    $search1 = $essalud->search( $dni );
    $search2 = $mintra->search( $dni );


    if( $search1->success == true )
    {
        $nombre = $search1->nombre;
        $apellido = $search1->paterno;
        $apellidom = $search1->materno;
        $fecha_nacimiento = $search1->nacimiento;
        $nombre=$nombre . ' ' . $apellido. ' '.$apellidom;

        $sentencia="UPDATE historial SET
                 nombre = '".$nombres."',
                 fecha_nacimiento = '".$fecha_nacimiento."'
                 WHERE dni='".$dni."' ";

        $mysqli->query($sentencia) or die ("Error al actualizar datos".mysqli_error($mysqli));
    }

    if( $search2->success == true )
    {
        $nombre = $search1->nombre;
        $apellido = $search1->paterno;
        $apellidom = $search1->materno;
       $fecha_nacimiento = $search1->nacimiento;
       $nombres= $nombre . ' ' . $apellido. ' '.$apellidom;

        $sentencia="UPDATE historial SET
                 nombre = '".$nombres."',
                 fecha_nacimiento = '".$fecha_nacimiento."'
                 WHERE dni='".$dni."' ";

        $mysqli->query($sentencia) or die ("Error al actualizar datos".mysqli_error($mysqli));
    }

    if($search1->success==false && $search2->success==false)
    {
        echo "ERROR : " . $search->message;
    }*/

    require_once("srchector/autoload.php" );

    $essalud = new \EsSalud\EsSalud();
    $mintra = new \MinTra\mintra();

    $dni = "44274795";

    $search1 = $essalud->search( $dni );
    $search2 = $mintra->search( $dni );

    if( $search1->success == true )
    {
        echo PHP_EOL . "Hola: " . $search1->result->nombre;
    }

    if( $search2->success == true )
    {
        echo PHP_EOL . "Hola: " . $search2->result->nombre;
}

