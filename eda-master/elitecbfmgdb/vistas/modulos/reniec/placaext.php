<?php

$placa=$_POST['placa'];

if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $placa) &&
   preg_match('/^[a-zA-Z0-9]+$/', $placa) && strlen($placa) == 6){


	require_once("crv/src/autoload.php");

	$test = new \Pit\Pit();
	$out=$test->check( "$placa" ); // Sin Requisitoria

	$x = json_encode($out);
  //var_dump($x);

$token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.MTA2MQ.mNioS0vL0ckba0lPV955HvekjFHzvIcqEVqy1_kBerM';
$query = "
query {
	soat(placa:\"$placa\") {
		NombreCompania
		FechaInicio
        FechaFin
        Estado
    }
}";


$body = json_encode($query);
$headers = [
	'Content-Type: application/json',
    'Content-Length: '.strlen($body),
	'Authorization: Bearer ' . $token,
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"http://quertium.com/api/v1/apeseg/soat/$placa");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$jsonString = curl_exec ($ch);
curl_close ($ch);
$out = json_decode($jsonString, true);

$nombre =$_POST['nombre'];
$apellidos= $_POST['apellidos'];
$dni = $_POST['dni'];
$estado = $out['Estado'];
$FechaInicio = $out['FechaInicio'];
$FechaFin = $out['FechaFin'];
$fechaNacimiento= $_POST['fechaNacimiento'];
$NombreCompania= $out['NombreCompania'];
$NumeroPoliza = $out['NumeroPoliza'];
$NombreUsoVehiculo = $out['NombreUsoVehiculo'];
$NombreClaseVehiculo = $out['NombreClaseVehiculo'];
$FechaControlPolicial = $out['FechaControlPolicial'];
$TipoCertificado = $out['TipoCertificado'];
$easytaxi=$_POST['easytaxi'];
$cabify=$_POST['cabify'];
$tipoext=$_POST['tipoext'];
$usuario_reg=$_POST['usuario_reg'];
$provincia=$_POST['provincia'];


if ($easytaxi == "undefined") {
    $easytaxi = "0" ;
}

if ($cabify == "undefined") {
    $cabify = "0" ;
}
if ($estado == "VIGENTE") {
  $soat = 'VIGENTE';
} else {
  $soat = 'El vehiculo consultado no posee SOAT';
}

?>

<form class="form-horizontal p-t-20">
    <div class="form-group row">
        <label for="exampleInputuname3" class="col-sm-3 control-label">Nombre</label>
        <div class="col-sm-9">
            <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="ti-user"></i></span></div>
                <input type="text" readonly="" class="form-control" name="nombre" id="nombre" value="<?php echo $nombre?>">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="exampleInputEmail3" class="col-sm-3 control-label">Apellido</label>
        <div class="col-sm-9">
            <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="ti-user"></i></span></div>
                <input type="text" readonly="" class="form-control" name="apellidos" id="apellidos" value="<?php echo $apellidos?>">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="web" class="col-sm-3 control-label">DNI</label>
        <div class="col-sm-9">
            <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="ti-id-badge"></i></span></div>
                <input type="text" readonly="" class="form-control" name="dni" id="dni" value="<?php echo $dni?>">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="web" class="col-sm-3 control-label">Placa</label>
        <div class="col-sm-9">
            <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="ti-car"></i></span></div>
                <input type="text" readonly="" class="form-control" name="placa" id="placa" value="<?php echo $placa?>">
            </div>
        </div>
    </div>
     <div class="form-group row">
        <label for="web" class="col-sm-3 control-label">SOAT</label>
        <div class="col-sm-9">
            <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="ti-id-badge"></i></span></div>
                <input type="text" readonly="" class="form-control" name="estado" id="estado" value="<?php echo $soat ?>">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="web" class="col-sm-3 control-label">Orden Captura</label>
        <div class="col-sm-9">
            <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="ti-location-pin"></i></span></div>
                <textarea name="crv" id="crv" readonly="" class="form-control"></textarea>

            </div>
        </div>
    </div>

</form>



<span class="btn btn-primary" id="registrarNuevo2">Registrar</span>

<script type="text/javascript">
   placa = $('#placa').val();
   placa = placa.toUpperCase();

         $.ajax({
            type: "POST",
            url: 'https://captcha.arhuantecedentes.com/api/record',
            data: {
                type: '1', //tipo de documento
                documento: placa, //numero de documento
                datas: 'placa' //tipo de solicitud
            }

            }).done(function(msg){
               $("#resultado").html(msg);
                //console.log(msg)
            });
  var crvjs =<?php echo $x ?>;
  $(document).ready(function(){

    $('#crv').val(crvjs.message);

    $('#registrarNuevo2').click(function(){
    $('#registrarNuevo2').hide();


      cadena="nombre=" + '<?php echo $nombre ?>' +
          "&apellidos=" + '<?php echo $apellidos ?>' +
          "&dni=" + '<?php echo $dni ?>' +
          "&placa=" + '<?php echo $placa ?>' +
          "&crv=" + $('#crv').val() +
          "&FechaInicio=" + '<?php echo $FechaInicio ?>' +
          "&FechaFin=" + '<?php echo $FechaFin ?>' +
          "&fechaNacimiento=" + '<?php echo $fechaNacimiento ?>' +
          "&NombreCompania=" + '<?php echo $NombreCompania ?>' +
          "&NumeroPoliza=" + '<?php echo $NumeroPoliza ?>' +
          "&NombreUsoVehiculo=" + '<?php echo $NombreUsoVehiculo ?>' +
          "&NombreClaseVehiculo=" + '<?php echo $NombreClaseVehiculo ?>' +
          "&FechaControlPolicial=" + '<?php echo $FechaControlPolicial ?>' +
          "&TipoCertificado=" + '<?php echo $TipoCertificado ?>' +
          "&tipoext=" + '<?php echo $tipoext ?>' +
          "&usuario_reg=" + '<?php echo $usuario_reg ?>' +
          "&provincia=" + '<?php echo $provincia ?>' +
          "&cabify=" + '<?php echo $cabify ?>' +
          "&easytaxi=" + '<?php echo $easytaxi ?>' +
          "&estado=" + '<?php echo $soat ?>';

					$.ajax({
						type:"POST",
						url:"vistas/modulos/reniec/registroext.php",
						data:cadena,
						success:function(r){

							if(r==2){
								swal({
                  type: "error",
                  title: "¡El Conductor ya Existe, ingrese otro conductor!",
                  showConfirmButton: true,
                  confirmButtonColor: "#8cd4f5",
                  confirmButtonText: "Cerrar"

                })
							}
							else if(r==1){
							swal({
                  type: "success",
                  title: "¡El Conductor ha sido guardado correctamente!",
                  showConfirmButton: true,
                  confirmButtonColor: "#8cd4f5",
                  confirmButtonText: "Cerrar"

                }).then(function(result){

                  if(result.value){

                    window.location = "conductores";

                  }

                });
							}else{
								swal({
                    type: "error",
                    title: "¡No pudimos registrar al conductor intente nuevamente!",
                    showConfirmButton: true,
                     confirmButtonColor: "#dd6b55",
                    confirmButtonText: "Cerrar"

                  }).then(function(result){

                    if(result.value){

                      window.location = "conductores";

                    }

                  });
							}
						}
					});
		});
	});
</script>



<?php
} else {
  echo '<script>

                swal({
                    type: "error",
                    title: "¡Introduzca unas placa valida!",
                    showConfirmButton: true,
                    confirmButtonColor: "#dd6b55",
                    confirmButtonText: "Cerrar"
                    })
                </script>';
}
?>
