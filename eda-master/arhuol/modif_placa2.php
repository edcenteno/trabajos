      <link rel="shortcut icon" href="img/favicon.ico" type="image/ico" />
<title>ARHU Internacional</title>
        <link rel="shortcut icon" href="img/favicon.ico" type="image/ico" />
<?php

//strlen($pdf);
$placa = $_POST['placa'];

    ModificarPersona($_POST['dni'], $_POST['fecha_inicio_soat'], $_POST['fecha_fin_soat'], $_POST['nombrecompania'], $_POST['numeropoliza'],$_POST['NombreUsoVehiculo'], $_POST['nombreclasevehiculo'], $_POST['fechacontrolpolicial'], $_POST['TipoCertificado'], $_POST['soat']);

    function ModificarPersona($dni, $fecha_inicio_soat, $fecha_fin_soat, $nombrecompania, $numeropoliza, $NombreUsoVehiculo, $nombreclasevehiculo, $fechacontrolpolicial, $TipoCertificado, $soat){
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
                                       TipoCertificado='".$TipoCertificado."'
                                       WHERE dni='".$dni."' ";
        $mysqli->query($sentencia) or die ("Error al actualizar datos".mysqli_error($mysqli));
    }
?>

<script type="text/javascript">
  placa = '<?php echo $placa ?>';
  $.ajax({
            type: "POST",
            url: 'https://captcharh.ddns.net/api/record',
            data: {
                type: '1', //tipo de documento
                documento: placa, //numero de documento
                datas: 'placa' //tipo de solicitud
            }

            }).done(function(msg){
               /* $("#resultado").html(msg);
                console.log(msg)*/
            });
    alert("Datos Actualizados Exitosamante!!");
    window.location.href='inicio.php';
</script>