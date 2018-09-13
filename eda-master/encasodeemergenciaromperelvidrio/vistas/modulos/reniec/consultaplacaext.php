<?php
include 'php/conexion.php';
$nombre =$_POST['nombre'];
$fecha_nacimiento= $_POST['fechaNacimiento'];
$apellidos= $_POST['apellidos'];
$dni = $_POST['dni'];
$easytaxi=$_POST['easytaxi'];
$cabify=$_POST['cabify'];
$tipoext=$_POST['tipoext'];
$usuario_reg=$_POST['usuario_reg'];


$conexion=conexion();
function buscaRepetido($dni,$conexion){
    $sql="SELECT * from conductores where dni='$dni'";
    $result=mysqli_query($conexion,$sql);
    while($row = $result->fetch_array(MYSQLI_ASSOC)){
      $rows[] = $row;
    }

    if(mysqli_num_rows($result) > 0){
      return 1;
    }else{
      return 0;
    }
  }

if(buscaRepetido($dni,$conexion)==1){
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
if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $nombre) && preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $apellidos) && strlen($dni) >= 8  && strlen($fecha_nacimiento) == 10 && isset($_POST['si'])){


?>


<script type="text/javascript">

	function realizaProcesoplaca(){
        cadena="placa=" + $('#placa').val() +
        "&dni=" + $('#ptp').val() +
        "&nombre=" + $('#nombre').val() +
        "&fechaNacimiento=" + $('#fechaNacimiento').val()+
        "&cabify=" + cabify +
        "&easytaxi=" + easytaxi +
        "&tipoext=" + tipoext +
        "&usuario_reg=" + usuario_reg +
        "&apellidos=" + $('#apellidos').val();
        $.ajax({
                data:  cadena,
                url:   'vistas/modulos/reniec/placaext.php',
                type:  'post',
                beforeSend: function () {
                        $("#resultado2").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#resultado2").html(response);
                        var rsp=response;

                       if (rsp.length > "1000"){
                          $("#consultaplaca").hide("slow");
                          $("#x").hide("slow");
                       }
                }
        });
}
</script>
Introduce placa

<form class="form-horizontal p-t-20">
    <div class="form-group row" id="x">
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




<input type="text" hidden readonly="" class="form-control" name="nombre" id="nombre" value="<?php echo $nombre ?>">

<input type="text" hidden readonly="" class="form-control" name="apellidos" id="apellidos" value="<?php echo $apellidos ?>">

<input type="text" hidden readonly="" class="form-control" name="fechaNacimiento" id="fechaNacimiento" value="<?php echo $fecha_nacimiento ?>">

<input type="text" hidden readonly="" class="form-control" name="dni" id="dni" value="<?php echo $dni ?>" >
<input type="text" hidden readonly="" class="form-control" name="tipoext" id="tipoext" value="<?php echo $tipoext ?>" >
<input type="text" hidden readonly="" class="form-control" name="usuario_reg" id="usuario_reg" value="<?php echo $usuario_reg ?>" >

<span id="resultado2">
<?php
}else{
?>

<script>

    swal({
        type: "error",
        title: "¡Error de PTP/Carné de extranjeria, los campos no puede ir vacío o llevar caracteres especiales!",
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