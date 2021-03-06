<?php
require_once("srchector/autoload.php" );
require 'modelo/modeloconductor.php';

  $essalud = new \EsSalud\EsSalud();
  $mintra = new \MinTra\mintra();

  $dni=$_POST['dni'];
  $usuario_reg = $_POST['usuario_reg'];
  $provincia = $_POST['provincia'];

if (is_numeric($dni) && strlen($dni) == 8) {

  function buscaRepetido($dni){

      $count = ModeloConductor::count(array('dni'=>$dni));

      if($count > 0){
        return 1;
      }else{
        return 0;
      }
  }

  if(buscaRepetido($dni)==0){

  $search1 = $essalud->search( $dni );
    if( $search1->success == true ){
        $nombre = $search1->Nombres;
        $apellido = $search1->ApellidoPaterno;
        $apellidom = $search1->ApellidoMaterno;
        $fecha_nacimiento = $search1->FechaNacimiento;

    }else{
  $search2 = $mintra->search( $dni );
       if( $search2->success == true ){
            $nombre = $search2->nombre;
            $apellido = $search2->paterno;
            $apellidom = $search2->materno;
            $fecha_nacimiento = $search2->nacimiento;

        }
}
    if($search1->success==false && $search2->success==false)
    {
       echo '<script>

                swal({
                    type: "error",
                    title: "¡Error de Comunicación con el RENIEC!",
                    showConfirmButton: true,
                    confirmButtonColor: "#dd6b55",
                    confirmButtonText: "Cerrar"
                    }).then(function(result) {
                      $("#consul")[0].reset();

                  })

                </script>';
}else {

 echo '
 <div class="col-lg-12 col-xlg-10 col-md-7">
 <form class="form-horizontal p-t-20">
    <div class="form-group row">
        <label for="exampleInputuname3" class="col-sm-6 control-label">Nombre</label>
        <div class="col-sm-10">
            <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="ti-user"></i></span></div>
                <input type="text" readonly="" class="form-control" name="nombre" id="nombre" value="'.$nombre.'">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="exampleInputEmail3" class="col-sm-6 control-label">Apellido</label>
        <div class="col-sm-10">
            <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="ti-user"></i></span></div>
                <input type="text" readonly="" class="form-control" name="apellidos" id="apellidos" value="'.$apellido.' '.$apellidom.'">
            </div>
        </div>
    </div>
   <div class="form-group row">
        <label for="exampleInputEmail3" class="col-sm-6 control-label">Fecha de Nacimiento</label>
        <div class="col-sm-10">
            <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="ti-user"></i></span></div>
                <input type="text" readonly="" class="form-control" name="fechaNacimiento"
                id="fechaNacimiento" value="'.$fecha_nacimiento.'">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="web" class="col-sm-6 control-label">DNI</label>
        <div class="col-sm-10">
            <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="ti-id-badge"></i></span></div>
                <input type="text" readonly="" class="form-control" name="dni" id="dni" value="'.$dni.'">
            </div>
        </div>
    </div>

    <div class="form-check-inline">
      <label class="custom-control custom-checkbox">
        <input type="checkbox" name="cabify" id="cabify" class="form-check-input" value="1">Cabify

      </label>
    </div>
    <div class="form-check-inline">
      <label class="custom-control custom-checkbox">
        <input type="checkbox" name="easytaxi" id="easytaxi" class="form-check-input" value="1">Easy Taxi
      </label>
    </div>
   <!-- <div class="form-check-inline">
      <label class="custom-control custom-checkbox">
        <input type="checkbox" name="easyeconomy" id="easyeconomy" class="form-check-input" value="1">Easy Economy
      </label>
    </div>-->


</form>
<span id="resultado">
';
echo '

<form class="form-horizontal p-t-20" id="form">
    <div class="form-group row">
        <label for="exampleInputuname3" class="col-sm-4 control-label">¿Posee Vehiculo?</label>
        <div class="col-sm-8">
            <div class="input-group">

                <span style="width:80px" class="btn btn-success waves-effect waves-light" id="consultarPlaca"">SI</span>

                <input type="text" hidden class="form-control" name="si" id="si" value="Si">

                <span style="width:80px" class="btn btn-danger waves-effect waves-light" id="registrarNuevo">NO</span>


            </div>
        </div>



    </div>

</form>
<!-- <input type="button" href="javascript:;" onclick="realizaProcesoplaca();return false;" value="enviar2" pattern="[A-Z0-9]{5,40}" title="Letras y números. Tamaño mínimo: 5. Tamaño máximo: 40"/> -->


';

?>



<script>
  $(document).ready(function(){
  $("#consultarPlaca").click(function () {
    easytaxi = ($('input:checkbox[name=easytaxi]:checked').val());
    cabify = ($('input:checkbox[name=cabify]:checked').val());
  });
});
$(document).ready(function(){

      $('#consultarPlaca').click(function(){


    cadena="nombre=" + $('#nombre').val() +
          "&apellidos=" + $('#apellidos').val() +
          "&dni=" + $('#dni').val() +
          "&cabify=" + cabify +
          "&easytaxi=" + easytaxi +
          "&si=" + $('#si').val() +
          "&usuario_reg=" + '<?php echo $usuario_reg ?>' +
          "&provincia=" + '<?php echo $provincia ?>' +
          "&fechaNacimiento=" + $('#fechaNacimiento').val();


    $.ajax({
            data:  cadena,
            url:   'vistas/modulos/reniec/consultaplaca.php',
            type:  'post',
            beforeSend: function () {
                    $("#resultado").html("Procesando, espere por favor...");
            },
            success:  function (response) {
                   // alert(response);
                    $("#resultado").html(response);
                    //console.log(response)

                   // consultadni.style.display = 'none'; // No ocupa espacio
                   //   $("#form").hide("slow");

            }
    });
});
});
</script>

<script type="text/javascript">
   $(document).ready(function(){

  $("#registrarNuevo").click(function () {
  easytaxi = ($('input:checkbox[name=easytaxi]:checked').val());
  cabify = ($('input:checkbox[name=cabify]:checked').val());
    //$("#formulario").submit();
  });
});

  $(document).ready(function(){

    $('#registrarNuevo').click(function(){
      $('#registrarNuevo').hide();
      $('#si').hide();
      type= 1
      dni = $('#dni').val();

        $.ajax({
          type: "POST",
          url: 'https://captcha.arhuantecedentes.com/api/record',
          data: {
              type: type, //tipo de documento
              documento: dni, //numero de documento
              datas: 'record' //tipo de solicitud
          }

        }).done(function(msg){
         // $("#resultado").html(msg);
          //console.log(msg)

        });

          param="&dni=" + dni;

          $.ajax({
            data:  param,
            url:   'vistas/modulos/reniec/ruc.php',
            type:  'post',
            success:  function (response) {

            }
            });

      cadena="nombre=" + $('#nombre').val() +
          "&apellidos=" + $('#apellidos').val() +
          "&dni=" + $('#dni').val() +
          "&cabify=" + cabify +
          "&easytaxi=" + easytaxi +
          "&usuario_reg=" + '<?php echo $usuario_reg ?>' +
          "&provincia=" + '<?php echo $provincia ?>' +
          "&fechaNacimiento=" + $('#fechaNacimiento').val();

          $.ajax({
            type:"POST",
            url:"vistas/modulos/reniec/registrosinplaca.php",
            data:cadena,
            success:function(r){
              if(r==4){
              swal({
                  type: "warning",
                  title: "¡Debe seleccionar una opción!",
                  showConfirmButton: true,
                  confirmButtonColor: "#8cd4f5",
                  confirmButtonText: "Cerrar"

                }).then(function(result){

                });
              }

              if(r==1){
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
              }
            }
          });
    });
  });



</script>

<?php

}
}else{
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
}


/*if ($out == 0) {

} else {

echo 'Temporalmente el sistema no esta prestando servicios';

}*/

} else {
 echo $valido = '<script>

                swal({
                    type: "error",
                    title: "¡Introduzca un DNI valido!",
                    showConfirmButton: true,
                    confirmButtonColor: "#dd6b55",
                    confirmButtonText: "Cerrar"
                    }).then(function(result) {

                  })

                </script>';

}
?>

