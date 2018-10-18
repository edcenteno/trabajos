<?php

    require_once("./srchector/autoload.php");

    $essalud = new \EsSalud\EsSalud();
    $mintra = new \MinTra\mintra();

    $dni = "44274795";

    $search1 = $essalud->search( $dni );
    $search2 = $mintra->search( $dni );

    //var_dump($search1);
    var_dump($search2);

    if( $search1->success == true )
    {
        //echo "Hola: " . $search1->Nombres;
/*
        $nombre = $search1->Nombres;
        $apellido = $search1->ApellidoPaterno;
        $apellidom = $search1->ApellidoMaterno;
        $fecha_nacimiento = $search1->FechaNacimiento;


        $nombres=$nombre . ' ' . $apellido. ' '.$apellidom;

       echo $sentencia="UPDATE historial SET
                 nombre = '".$nombres."',
                 fecha_nacimiento = '".$fecha_nacimiento."'
                 WHERE dni='".$dni."' ";*/

      //  $mysqli->query($sentencia) or die ("Error al actualizar datos".mysqli_error($mysqli));
    }

    if( $search2->success == true )
    {

        $nombre = $search2->nombre;
        $apellido = $search2->paterno;
        $apellidom = $search2->materno;
        $fecha_nacimiento = $search1->nacimiento;

       $nombres= $nombre . ' ' . $apellido. ' '.$apellidom;

        echo $sentencia="UPDATE historial SET
                 nombre = '".$nombres."',
                 fecha_nacimiento = '".$fecha_nacimiento."'
                 WHERE dni='".$dni."' ";
}
