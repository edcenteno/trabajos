<?php

  namespace DatosPeru;
error_reporting(0);
  include "php/conexion.php";
  $conexion=conexion();

$dni=$_POST['dni'];
$usuario_reg = $_POST['usuario_reg'];

if (is_numeric($dni) && strlen($dni) == 8) {

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

  if(buscaRepetido($dni,$conexion)==0){
 // $dni=$_POST['dni'];
  class Peru  {
    function __construct()
    {
      $this->reniec = new \Reniec\Reniec();
      $this->essalud = new \EsSalud\EsSalud();
      $this->mintra = new \MinTra\mintra();
    }
    function search( $dni )
    {

 /*     $response = $this->reniec->search( $dni );
      if($response->success == true)
      {
        $rpt = (object)array(
          "success"     => true,
          "source"    => "reniec",
          "result"    => $response->result
        );
        return $rpt;
      }*/
/*
        $response = $this->mintra->check( $dni );
        if( $response->success == true )
        {
          $rpt = (object)array(
            "success"     => true,
            "source"    => "mintra",
            "result"    => $response->result
          );
          return $rpt;
        }*/
 $response = $this->essalud->check( $dni );
      if($response->success == true)
      {
        $rpt = (object)array(
          "success"     => true,
          "source"    => "essalud",
          "result"    => $response->result
        );
        return $rpt;
      }




      $rpt = (object)array(
        "success"     => false,
        "msg"       => "No se encontraron datos"
      );
      return $rpt;
    }
  }


  require_once( __DIR__ . "/src/autoload.php" );

  $test = new \DatosPeru\Peru();

  $out=$test->search("$dni");
  $a = json_encode($out);
 // var_dump($a);

  if (strlen($a) < 150) {
     echo '<script>

                swal({
                    type: "error",
                    title: "¡Error de DNI, ingrese uno valido!",
                    showConfirmButton: true,
                    confirmButtonColor: "#dd6b55",
                    confirmButtonText: "Cerrar"
                    }).then(function(result) {
                      $("#consul")[0].reset();

                  })

                </script>';
  } else {

 echo '
 <div class="col-lg-12 col-xlg-10 col-md-7">
 <form class="form-horizontal p-t-20">
    <div class="form-group row">
        <label for="exampleInputuname3" class="col-sm-6 control-label">Nombre</label>
        <div class="col-sm-10">
            <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="ti-user"></i></span></div>
                <input type="text" readonly="" class="form-control" name="nombre" id="nombre">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="exampleInputEmail3" class="col-sm-6 control-label">Apellido</label>
        <div class="col-sm-10">
            <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="ti-user"></i></span></div>
                <input type="text" readonly="" class="form-control" name="apellidos" id="apellidos">
            </div>
        </div>
    </div>
   <div class="form-group row">
        <label for="exampleInputEmail3" class="col-sm-6 control-label">Fecha de Nacimiento</label>
        <div class="col-sm-10">
            <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="ti-user"></i></span></div>
                <input type="text" readonly="" class="form-control" name="fechaNacimiento" id="fechaNacimiento">
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
    <input type="text" hidden  class="form-control" name="usuario_reg" id="usuario_reg" value="'.$usuario_reg.'" />

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

<script type="text/javascript">
  var x =<?php echo $a ?>;

 $(document).ready(function(){
    $('#nombre').val(x.result.Nombres);
    $('#apellidos').val(x.result.ApellidoPaterno +' '+ x.result.ApellidoMaterno);
    $('#dni').val(x.result.DNI);
    $('#fechaNacimiento').val(x.result.FechaNacimiento);

  });

/*  $(document).ready(function(){
    $('#nombre').val(x.result.nombre);
    $('#apellidos').val(x.result.paterno +' '+ x.result.materno);
    $('#dni').val(x.result.DNI);
    $('#fechaNacimiento').val(x.result.nacimiento);

  });*/


/*  $(document).ready(function(){
    $('#nombre').val(x.result.Nombres);
    $('#apellidos').val(x.result.apellidos);
    $('#dni').val(x.result.DNI);
});*/

      /* type= $('#tipo').val();
        dni = $('#dni').val();

        $.ajax({
          type: "POST",
          url: 'https://captcharh.ddns.net/api/record',
          data: {
              type: type, //tipo de documento
              documento: dni, //numero de documento
              datas: 'record' //tipo de solicitud
          }

        }).done(function(msg){
         // $("#resultado").html(msg);
          //console.log(msg)

        });*/
</script>


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
          "&usuario_reg=" + $('#usuario_reg').val() +
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

      type= 1
      dni = $('#dni').val();

        $.ajax({
          type: "POST",
          url: 'https://captcharh.ddns.net/api/record',
          data: {
              type: type, //tipo de documento
              documento: dni, //numero de documento
              datas: 'record' //tipo de solicitud
          }

        }).done(function(msg){
         // $("#resultado").html(msg);
          //console.log(msg)

        });

      cadena="nombre=" + $('#nombre').val() +
          "&apellidos=" + $('#apellidos').val() +
          "&dni=" + $('#dni').val() +
          "&cabify=" + cabify +
          "&easytaxi=" + easytaxi +
          "&usuario_reg=" + $('#usuario_reg').val() +
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

