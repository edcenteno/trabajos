<?php require_once "scripts.php"; ?>
<title>ARHU Internacional</title>
<link rel="shortcut icon" href="img/favicon.ico" type="image/ico" />
<?php

require 'modeloconductor.php';


$placa = $_POST['placa'];
$dni = $_POST['dni'];
$fecha_fab_veh = $_POST['fecha_fab_veh'];
$color_vehiculo = $_POST['color_vehiculo'];
$fecha= date('d-m-Y H:i:s');
@$placanoex=$_POST['placanoex'];

if ($placanoex == 1) {
  $placanoex = "Placa no EXISTE";

        $conductores = ModeloConductor::one(['dni'=>$dni]);
        $conductores->update([
                              'color_vehiculo'=>$placanoex,
                              'fecha_placa' => $fecha
                            ]);

        $conductores->save();

} else {

        $conductores = ModeloConductor::one(['dni'=>$dni]);
        $conductores->update([
                              'color_vehiculo'=>$color_vehiculo,
                              'placa'=>$placa,
                              'fecha_fab_veh'=>$fecha_fab_veh,
                              'fecha_placa' => $fecha
                            ]);
        $conductores->save();

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