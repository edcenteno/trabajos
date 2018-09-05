      <link rel="shortcut icon" href="img/favicon.ico" type="image/ico" />
<title>ARHU Internacional</title>
        <link rel="shortcut icon" href="img/favicon.ico" type="image/ico" />
<?php
$ant_judicial= $_POST['ant_judicial'];
$ant_penales = $_POST['ant_penales'];
$ant_policial = $_POST['ant_policial'];
$record_cond = $_POST['record_cond'];
$soat = $_POST['soat'];
@$blacklist = $_POST['blacklist'];


//strlen($pdf);
if ($ant_judicial == 'POSITIVO' ||
  $ant_judicial == '' ||
  $ant_penales == 'POSITIVO' ||
  $ant_penales == '' ||
  $ant_policial =='POSITIVO' ||
  $ant_policial =='' ||
  $record_cond >= '55' ||
  $soat == 'VENCIDO' ||
  $soat == 'El vehiculo consultado no posee SOAT'||
  $blacklist == '1') {

  $resultado = "NO APTO";

} else {

  $resultado = "APTO";

}

$placa = $_POST['placa'];

    ModificarPersona($_POST['dni'], $_POST['fecha_inicio_soat'], $_POST['fecha_fin_soat'], $_POST['nombrecompania'], $_POST['numeropoliza'],$_POST['NombreUsoVehiculo'], $_POST['nombreclasevehiculo'], $_POST['fechacontrolpolicial'], $_POST['TipoCertificado'], $_POST['soat'], $resultado);

    function ModificarPersona($dni, $fecha_inicio_soat, $fecha_fin_soat, $nombrecompania, $numeropoliza, $NombreUsoVehiculo, $nombreclasevehiculo, $fechacontrolpolicial, $TipoCertificado, $soat, $resultado){
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
                                       resultado='".$resultado."'
                                       WHERE dni='".$dni."' ";
        $mysqli->query($sentencia) or die ("Error al actualizar datos".mysqli_error($mysqli));
    }
?>

<script type="text/javascript">

    alert("Datos Actualizados Exitosamante!!");
    window.location.href='inicio.php';
</script>