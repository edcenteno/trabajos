<?php
$nombre =$_POST['nombre'];
$fecha_nacimiento= $_POST['fechaNacimiento'];
$apellidos= $_POST['apellidos'];
$dni = $_POST['dni'];


if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $nombre) && preg_match('/^[a-zA-Z]+$/', $nombre) &&
   preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $apellidos) && preg_match('/^[a-zA-Z]+$/', $apellidos) &&
   strlen($dni) >= 8  && strlen($fecha_nacimiento) == 10 && isset($_POST['si'])){

strlen($nombre);
strlen($fecha_nacimiento);
strlen($apellidos);
strlen($dni);

?>

<script type="text/javascript">

	function realizaProcesoplaca(){
        cadena="placa=" + $('#placa').val() +
        "&dni=" + $('#ptp').val() +
        "&nombre=" + $('#nombre').val() +
        "&fechaNacimiento=" + $('#fechaNacimiento').val()+
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


<!-- <input type="button" href="javascript:;" onclick="realizaProcesoplaca();return false;" value="enviar2" pattern="[A-Z0-9]{5,40}" title="Letras y números. Tamaño mínimo: 5. Tamaño máximo: 40"/> -->

<input type="text" hidden readonly="" class="form-control" name="nombre" id="nombre" value="<?php echo $nombre ?>">

<input type="text" hidden readonly="" class="form-control" name="apellidos" id="apellidos" value="<?php echo $apellidos ?>">

<input type="text" hidden readonly="" class="form-control" name="fechaNacimiento" id="fechaNacimiento" value="<?php echo $fecha_nacimiento ?>">

<input type="text" hidden readonly="" class="form-control" name="dni" id="dni" value="<?php echo $dni ?>" >
            
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
?>