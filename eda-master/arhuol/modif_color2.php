      <link rel="shortcut icon" href="img/favicon.ico" type="image/ico" />
<title>ARHU Internacional</title>
        <link rel="shortcut icon" href="img/favicon.ico" type="image/ico" />
<?php


    ModificarPersona($_POST['dni'], $_POST['color_vehiculo']);

    function ModificarPersona($dni, $color_vehiculo){
        include 'conexion.php';
         $sentencia="UPDATE conductores SET
                                       color_vehiculo='".$color_vehiculo."'
                                       WHERE dni='".$dni."' ";
        $mysqli->query($sentencia) or die ("Error al actualizar datos".mysqli_error($mysqli));
    }
?>

<script type="text/javascript">

    alert("Datos Actualizados Exitosamante!!");
    window.location.href='color.php';
</script>