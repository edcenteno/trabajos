# sunarp-vehiculos
busca datos de un vehículo en peru a partir de la Placa
```sh
<?php
    require ("curl.php");
    require ("sunarp.php");

    $search = new Sunarp();
    $placa="ABI453";
    header('Content-type: application/json');
    echo json_encode( $search->BuscaDatosSunarp($placa), JSON_PRETTY_PRINT );
?>
```
