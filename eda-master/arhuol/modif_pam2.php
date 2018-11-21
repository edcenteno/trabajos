      <link rel="shortcut icon" href="img/favicon.ico" type="image/ico" />
<title>ARHU Internacional</title>
        <link rel="shortcut icon" href="img/favicon.ico" type="image/ico" />
<?php

require 'modeloconductor.php';

    $soat = $_POST['soat'];


    $resultado = $_POST['resultado'];
    $placa = $_POST['placa'];
    $dni = $_POST['dni'];
    $fecha_inicio_soat = $_POST['fecha_inicio_soat'];
    $fecha_fin_soat = $_POST['fecha_fin_soat'];
    $nombrecompania = $_POST['nombrecompania'];
    $numeropoliza = $_POST['numeropoliza'];
    $NombreUsoVehiculo = $_POST['NombreUsoVehiculo'];
    $nombreclasevehiculo = $_POST['nombreclasevehiculo'];
    $fechacontrolpolicial = $_POST['fechacontrolpolicial'];
    $TipoCertificado = $_POST['TipoCertificado'];
    $color_vehiculo = $_POST['color_vehiculo'];
    $tipodoc = $_POST['tipodoc'];

        $conductores = ModeloConductor::one(['dni'=>$dni]);
        $conductores->update([
                          'placa'=>$placa,
                          'extr' => $tipodoc,
                          'resultado'=>$resultado,
                          'soat'=>$soat,
                          'fecha_inicio_soat'=>$fecha_inicio_soat,
                          'fecha_fin_soat'=>$fecha_fin_soat,
                          'nombrecompania'=>$nombrecompania,
                          'numeropoliza'=>$numeropoliza,
                          'NombreUsoVehiculo'=>$NombreUsoVehiculo,
                          'nombreclasevehiculo'=>$nombreclasevehiculo,
                          'fechacontrolpolicial'=>$fechacontrolpolicial,
                          'TipoCertificado'=>$TipoCertificado,
                          'color_vehiculo' => $color_vehiculo
                            ]);

                $conductores->save();
?>

<script type="text/javascript">

    alert("Datos Actualizados Exitosamante!!");
    window.location.href='listadomod.php';
</script>