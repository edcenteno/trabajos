<?php require_once "scripts.php"; ?>
<title>ARHU Internacional</title>
<link rel="shortcut icon" href="img/favicon.ico" type="image/ico" />
<?php

$placa = $_POST['placa'];
$placaoriginal=$_POST['placaoriginal'];


    ModificarPersona($_POST['dni'], $_POST['color_vehiculo'], $_POST['placa'], $_POST['fecha_fab_veh']);

    function ModificarPersona($dni, $color_vehiculo, $placa, $fecha_fab_veh){
        include 'conexion.php';
         $sentencia="UPDATE conductores SET
                                       color_vehiculo='".$color_vehiculo."',
                                       placa='".$placa."',
                                       fecha_fab_veh='".$fecha_fab_veh."',
                                       fecha_placa = NOW()
                                       WHERE dni='".$dni."' ";
        $mysqli->query($sentencia) or die ("Error al actualizar datos".mysqli_error($mysqli));
    }
?>
<script type="text/javascript">

  placa = '<?php echo $placa ?>';
  placaoriginal = '<?php echo $placaoriginal ?>';

  if(placa != placaoriginal){

    $.ajax({
    type: "POST",
    url: 'https://captcharh.ddns.net/api/record',
    data: {
        type: '1', //tipo de documento
        documento: placa, //numero de documento
        datas: 'placa' //tipo de solicitud
    }

    }).done(function(msg){
       /* $("#resultado").html(msg);*/
        console.log(msg)
    });
  }



</script>
<script type="text/javascript">

    alert("Datos Actualizados Exitosamante!!");
    window.location.href='color.php';
</script>