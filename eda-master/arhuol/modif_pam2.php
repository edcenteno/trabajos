      <link rel="shortcut icon" href="img/favicon.ico" type="image/ico" />
<title>ARHU Internacional</title>
        <link rel="shortcut icon" href="img/favicon.ico" type="image/ico" />
<?php

$soat = $_POST['soat'];


$resultado = $_POST['resultado'];

    ModificarPersona($_POST['dni'], $_POST['fecha_inicio_soat'], $_POST['fecha_fin_soat'], $_POST['nombrecompania'], $_POST['numeropoliza'],$_POST['NombreUsoVehiculo'], $_POST['nombreclasevehiculo'], $_POST['fechacontrolpolicial'], $_POST['TipoCertificado'], $_POST['soat'], $resultado, $_POST['color_vehiculo']);

    function ModificarPersona($dni, $fecha_inicio_soat, $fecha_fin_soat, $nombrecompania, $numeropoliza, $NombreUsoVehiculo, $nombreclasevehiculo, $fechacontrolpolicial, $TipoCertificado, $soat, $resultado, $color_vehiculo){
        include 'conexion.php';
         $sentencia="UPDATE conductores SET
                                       fecha_inicio_soat='".$fecha_inicio_soat."',
                                       fecha_fin_soat='".$fecha_fin_soat."',
                                       nombrecompania='".$nombrecompania."',
                                       numeropoliza='".$numeropoliza."',
                                       NombreUsoVehiculo='".$NombreUsoVehiculo."',
                                       nombreclasevehiculo='".$nombreclasevehiculo."',
                                       fechacontrolpolicial='".$fechacontrolpolicial."',
                                       soat='".$soat."',
                                       TipoCertificado='".$TipoCertificado."',
                                       color_vehiculo='".$color_vehiculo."',
                                       resultado='".$resultado."'
                                       WHERE dni='".$dni."' ";
        $mysqli->query($sentencia) or die ("Error al actualizar datos".mysqli_error($mysqli));
    }
?>

<script type="text/javascript">

    alert("Datos Actualizados Exitosamante!!");
    window.location.href='listadomod.php';
</script>