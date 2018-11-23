<?php
require 'modelo/modeloconductor.php';
$nombre =$_POST['nombre'];
$fecha_nacimiento= $_POST['fechaNacimiento'];
$apellidos= $_POST['apellidos'];
$dni = $_POST['dni'];
$easytaxi=$_POST['easytaxi'];
$cabify=$_POST['cabify'];
$tipoext=$_POST['tipoext'];
$usuario_reg=$_POST['usuario_reg'];
$provincia=$_POST['provincia'];

function buscaRepetido($dni){

     $count = ModeloConductor::count(array('dni'=>$dni));

        if($count > 0){
          return 1;
        }else{
          return 0;
        }
  }

if(buscaRepetido($dni)==1){
      echo '<script>

                swal({
                    type: "warning",
                    title: "¡Conductor ya existe, intente con otro DNI!",
                    showConfirmButton: true,
                    confirmButtonColor: "#fec107",
                    confirmButtonText: "Cerrar"
                    }).then(function(result) {
                      $("#consul")[0].reset();

                  })

                </script>';
    }else{

    if ($easytaxi == "undefined") {
        $easytaxi = "0" ;
    }

    if ($cabify == "undefined") {
        $cabify = "0" ;
    }
if ($cabify == "0" && $easytaxi == "0") {
            echo '<script type="text/javascript">
                     swal({
                          type: "warning",
                          title: "¡Debe seleccionar una opción!",
                          showConfirmButton: true,
                          confirmButtonColor: "#8cd4f5",
                          confirmButtonText: "Cerrar"

                        }).then(function(result){

                        });
                </script>';
        } else {
if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $nombre) && preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $apellidos) && strlen($dni) >= 5  && is_numeric($dni) && strlen($fecha_nacimiento) == 10 && isset($_POST['si'])){


?>


<script type="text/javascript">

	function realizaProcesoplaca(){
        cadena="placa=" + $('#placa').val() +
        "&dni=" + '<?php echo $dni ?>' +
        "&nombre=" + '<?php echo $nombre ?>' +
        "&fechaNacimiento=" + '<?php echo $fecha_nacimiento ?>' +
        "&cabify=" + '<?php echo $cabify ?>' +
        "&easytaxi=" + '<?php echo $easytaxi ?>' +
        "&tipoext=" + '<?php echo $tipoext ?>' +
        "&usuario_reg=" + '<?php echo $usuario_reg ?>' +
        "&provincia=" + '<?php echo $provincia ?>' +
        "&apellidos=" + '<?php echo $apellidos ?>';
        $.ajax({
                data:  cadena,
                url:   'vistas/modulos/reniec/placaext.php',
                type:  'post',
                beforeSend: function () {
                        $("#resultadoplaca").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#resultadoplaca").html(response);
                        var rsp=response;

                       if (rsp.length > "1000"){
                          $("#consultaplaca").hide("slow");
                          $("#xplaca").hide("slow");
                       }
                }
        });
}
</script>


<form class="form-horizontal p-t-20">
    <div class="form-group row" id="xplaca">
      Introduce placa
        <label for="exampleInputuname3" class="col-sm-3 control-label">Placa</label>
        <div class="col-sm-9">
            <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="ti-car"></i></span></div>
                <input style="text-transform: uppercase;" maxlength="6" minlength="6" type="text" name="caja_texto" id="placa" value="" class="form-control" pattern="[A-Z0-9]{6}"/>
            </div>
        </div>

      <button type="button" href="javascript:;" class="btn btn-success waves-effect waves-light" onclick="realizaProcesoplaca();return false;" id="consultaplaca" name="consultaplaca">Consultar</button>

    </div>

</form>

<span id="resultadoplaca">
<?php
}else{
?>

<script>

    swal({
        type: "error",
        title: "¡Error de Carné de extranjeria, los campos no puede ir vacío o llevar caracteres especiales!",
        showConfirmButton: true,
        confirmButtonColor: "#dd6b55",
        confirmButtonText: "Cerrar"
        }).then(function(result) {

      })

</script>
<?php
}
}
}
?>