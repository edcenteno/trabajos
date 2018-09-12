<?php
require_once("crv/src/autoload.php");

    $test = new \Pit\Pit();
    $out=$test->check( "BAR026" ); // Sin Requisitoria

$orden_captura = $out['message'];
?>