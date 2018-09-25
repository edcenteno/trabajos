<?php
error_reporting(0);
include 'php/conexion.php';
$placa=$_POST['placa'];
$conexion=conexion();
//$placa="ABC123";
if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $placa) &&
   preg_match('/^[a-zA-Z0-9]+$/', $placa) && strlen($placa) == 6){


//jhon$token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.MTA2MQ.mNioS0vL0ckba0lPV955HvekjFHzvIcqEVqy1_kBerM';
//token prestado = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.MTAzNA.AmJhTMIv9Bzd9h4KjWijho4Wf0apnT4IoqasWM0dLLE';

    // Modo de Uso
    require_once("crv/src/autoload.php");

    $test = new \Pit\Pit();
    $out=$test->check( "$placa" ); // Sin Requisitoria

    $x = json_encode($out);
  //var_dump($x);

$token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.MTA2MQ.mNioS0vL0ckba0lPV955HvekjFHzvIcqEVqy1_kBerM';//token prestado
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
echo "<pre>";
var_dump($out);

echo"</pre>";

/*echo "NombreCompania : ".$out['NombreCompania']." <br>";
echo "FechaInicio : ". $out['FechaInicio'];
echo "FechaFin : ".$out['FechaFin']." <br>";*/
$dni = $_POST['dni'];
$estado = $out['Estado'];
$FechaInicio = $out['FechaInicio'];
$FechaFin = $out['FechaFin'];
$NombreCompania= $out['NombreCompania'];
$NumeroPoliza = $out['NumeroPoliza'];
$NombreUsoVehiculo = $out['NombreUsoVehiculo'];
$NombreClaseVehiculo = $out['NombreClaseVehiculo'];
$FechaControlPolicial = $out['FechaControlPolicial'];
$TipoCertificado = $out['TipoCertificado'];


if ($estado == "VIGENTE") {
  $soat = "VIGENTE";
} else {
  $soat = 'El vehiculo consultado no posee SOAT';
}

?>
    <input type="text" hidden readonly="" class="form-control" name="fechaNacimiento" id="fechaNacimiento" value="<?php echo $fechaNacimiento ?>">
    <input type="text" hidden name="FechaInicio" id="FechaInicio" value="<?php echo $FechaInicio ?>"/>
    <input type="text" hidden name="FechaFin" id="FechaFin" value="<?php echo $FechaFin?>"/>
    <input type="text" hidden readonly="" class="form-control" name="NombreCompania" id="NombreCompania" value="<?php echo $NombreCompania ?>">
    <input type="text" hidden name="NumeroPoliza" id="NumeroPoliza" value="<?php echo $NumeroPoliza ?>"/>
    <input type="text" hidden name="NombreUsoVehiculo" id="NombreUsoVehiculo" value="<?php echo $NombreUsoVehiculo ?>"/>
     <input type="text" hidden readonly="" class="form-control" name="NombreClaseVehiculo" id="NombreClaseVehiculo" value="<?php echo $NombreClaseVehiculo ?>">
    <input type="text" hidden name="FechaControlPolicial" id="FechaControlPolicial" value="<?php echo $FechaControlPolicial ?>"/>
    <input type="text" hidden name="easytaxi" id="easytaxi" value="<?php echo $easytaxi?>"/>
    <input type="text" hidden name="cabify" id="cabify" value="<?php echo $cabify?>"/>
    <input type="text" hidden name="TipoCertificado" id="TipoCertificado" value="<?php echo $TipoCertificado?>"/>

<form class="form-horizontal p-t-20">

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



<span class="btn btn-primary" id="registrarNuevo">Registrar</span>

<script type="text/javascript">

     placa = '<?php echo $placa ?>'

         $.ajax({
            type: "POST",
            url: 'https://captcharh.ddns.net/api/record',
            data: {
                type: '1', //tipo de documento
                documento: placa, //numero de documento
                datas: 'placa' //tipo de solicitud
            }

            }).done(function(msg){
               $("#resultado").html(msg);
                console.log(msg)
            });

  var crvjs =<?php echo $x ?>;
  $(document).ready(function(){

    $('#crv').val(crvjs.message);

    $('#registrarNuevo').click(function(){

      cadena=
          "&dni=" + $('#dni').val() +
          "&placa=" + $('#placa').val() +
          "&crv=" + $('#crv').val() +
          "&FechaInicio=" + $('#FechaInicio').val() +
          "&FechaFin=" + $('#FechaFin').val() +
          "&NombreCompania=" + $('#NombreCompania').val()+
          "&NumeroPoliza=" + $('#NumeroPoliza').val()+
          "&NombreUsoVehiculo=" + $('#NombreUsoVehiculo').val()+
          "&NombreClaseVehiculo=" + $('#NombreClaseVehiculo').val()+
          "&FechaControlPolicial=" + $('#FechaControlPolicial').val()+
           "&TipoCertificado=" + $('#TipoCertificado').val()+
          "&estado=" + $('#estado').val();

                    $.ajax({
                        type:"POST",
                        url:"vistas/modulos/reniec/registroplaca.php",
                        data:cadena,
                        success:function(r){

                            if(r==2){
                                alertify.error("Este usuario ya existe, prueba con otro");
                            }
                            else if(r==1){
                            swal({
                  type: "success",
                  title: "¡Placa ha sido guardado correctamente!",
                  showConfirmButton: true,
                  confirmButtonColor: "#8cd4f5",
                  confirmButtonText: "Cerrar"

                }).then(function(result){

                  if(result.value){

                   setTimeout('document.location.reload()',2000);

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
