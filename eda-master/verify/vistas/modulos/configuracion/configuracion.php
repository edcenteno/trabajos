<?php


require '../../../modelos/clientes.modelo.php';


$form = $_POST['check'];
//$ruc = $_POST['ruc'];
$ruc = "20557675052";

$clientes = ModeloClientes::one(['ruc'=>$ruc]);


     $clientes ->update([
                'config' =>$form
                    ]);
     $clientes->save();

echo 1;
?>