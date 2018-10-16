<?php
    require_once("./srcsunat/autoload.php");

    $company = new \Sunat\Sunat( true, true );

    $dni = "41178516";

    $search2 = $company->search( $dni );


    var_dump($search2);

    if( $search2->success == true )
    {
        echo "ruc: " . $search2->result->ruc;
    }
    if( $search2->message == "No se pudo conectar a sunat." )
    {
        echo "No se pudo conectar a sunat.";
    }

    /*if( $search2->success == true )
    {
        echo "Persona: " . $search1->result->RazonSocial;
    }*/

    // Mostrar en formato XML/JSON
    /*echo $search1->json();
    echo $search1->xml('empresa');*/

?>
