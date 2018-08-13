<?php
$nombre =$_POST['nombre'];
$fechaNacimiento= $_POST['fechaNacimiento'];
$apellidos= $_POST['apellidos'];
$dni = $_POST['dni'];

if ($easytaxi == "undefined") {
            $easytaxi = "0" ;
        }

        if ($cabify == "undefined") {
            $cabify = "0" ;
        }

if (isset($_POST['si'])){


?>

<script type="text/javascript">

	function realizaProcesoplaca(){
        cadena="placa=" + $('#placa').val() +
        "&dni=" + $('#dni').val() +
        "&nombre=" + $('#nombre').val() +
        "&fechaNacimiento=" + $('#fechaNacimiento').val()+
        "&apellidos=" + $('#apellidos').val();
        $.ajax({
                data:  cadena, 
                url:   'vistas/modulos/reniec/placa.php',
                type:  'post', 
                beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) { 
                        $("#resultado").html(response);
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

<input type="text" hidden readonly="" class="form-control" name="fechaNacimiento" id="fechaNacimiento" value="<?php echo $fechaNacimiento ?>">

<input type="text" hidden readonly="" class="form-control" name="dni" id="dni" value="<?php echo $dni ?>" >
            
<span id="resultado">
<?php
}
?>