<?php
require_once("crv/src/autoload.php");

    $test = new \Pit\Pit();
    $out=$test->check( "F0L537" ); // Sin Requisitoria
echo "<pre>";
var_dump($out);

echo"</pre>";
$orden_captura = $out['message'];
?>