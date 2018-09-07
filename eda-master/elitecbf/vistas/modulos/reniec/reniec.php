<html>
<head>
<?php
$usuario_reg = $_SESSION["nombre"];
$usuario_reg2 = $_SESSION["nombre"];
?>

<script>
function realizaProceso(){

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

        parametros="&dni=" + $('#dni').val()+
                   "&usuario_reg=" + $('#usuario_reg').val();

        $.ajax({
                data:  parametros,
                url:   'vistas/modulos/reniec/consulta.php',
                type:  'post',
                beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                       // alert(response);
                        $("#resultado").html(response);
                        //console.log(response)
                        var rsp=response;
                       // consultadni.style.display = 'none'; // No ocupa espacio
                       if (rsp.length > "1000"){
                          $("#consultadni").hide("slow");
                          $("#x").hide("slow");
                       }


                }
        });
}

</script>
</head>
<body>

<div class="col-lg-12 col-xlg-9 col-md-7">
            <div class="card">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs profile-tab" role="tablist">
                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#peru" role="tab"><i class="flag-icon flag-icon-pe"></i> DNI</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#extranjero" role="tab"><i class="ti-world"></i> Extranjeros</a> </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="peru" role="tabpanel">
                        <div class="card-body">
                            <div class="row">
                                <form class="form-horizontal p-t-20" id="consul">
                                  <div class="form-group row" id="x">
                                      <label for="exampleInputuname3" id="algo" class="col-sm-3 control-label" id="label">Introduce DNI</label>
                                      <div class="col-sm-9">
                                          <div class="input-group">
                                              <div class="input-group-prepend" id="div"><span class="input-group-text"><i id="ico" class="ti-id-badge"></i></span></div>
                                              <input type="text" class="form-control" pattern="[0-9]{8}" minlength="8" maxlength="8" name="dni" id="dni" value="" placeholder="DNI" />
                                              <input type="text" hidden="" class="form-control" name="tipo" id="tipo" value="1" />
                                              <input type="text" hidden class="form-control" name="usuario_reg" id="usuario_reg" value="<?php  echo $usuario_reg ?>" />
                                          </div>

                                      </div>
                                  </div>

                                  <div class="form-group row m-b-0">
                                      <div class="offset-sm-3 col-sm-9">
                                          <button type="button" href="javascript:;" class="btn btn-success waves-effect waves-light" onclick="realizaProceso()" id="consultadni" name="consultadni">Consultar</button>
                                      </div>
                                  </div>
                                </form>
                                <span id="resultado"></span>
                            </div>
                          </div>
                        </div>

                    <!--second tab-->
                    <div class="tab-pane" id="extranjero" role="tabpanel">
                        <div class="card-body">
                            <div class="row">
                                <form class="form-horizontal p-t-20" id="">
                                  <div class="form-group row" id="extr">
                                    <div class="form-group row">
                                        <label for="exampleInputEmail3" class="col-sm-4 control-label">PTP/Carné</label>
                                        <div class="col-sm-10">
                                          <div class="input-group">
                                            <select id="tipoext" class="form-control">
                                              <option value="0">SELECCIONE</option>
                                              <option value="2">CARNE DE EXTRANJERIA</option>
                                              <option value="3">CARNE DE SOLICITANTE</option>
                                              <option value="4">TARJETA DE IDENTIDAD</option>
                                              <option value="5">PERMISO TEMPORAL DE PERMANENCIA</option>
                                            </select>

                                            <div class="input-group-prepend"><span class="input-group-text"><i class="ti-id-badge"></i></span></div>
                                            <input type="text" class="form-control" pattern="[0-9]{9-11}" minlength="9" maxlength="11" name="ptp" id="ptp" value="" placeholder="PTP-Carné de Extranjeria" />

                                          </div>
                                        </div>
                                      </div>

                                     <div class="form-group row">
                                      <label for="exampleInputuname3" class="col-sm-3 control-label">Nombre</label>
                                      <div class="col-sm-10">
                                        <div class="input-group">
                                          <div class="input-group-prepend"><span class="input-group-text"><i class="ti-user"></i></span></div>
                                          <input type="text" style="text-transform: uppercase;" class="form-control" name="nombreext" id="nombreext" placeholder="Nombre">
                                        </div>
                                      </div>
                                    </div>

                                    <div class="form-group row">
                                      <label for="web" class="col-sm-3 control-label">Apellido</label>
                                      <div class="col-sm-10">
                                        <div class="input-group">
                                          <div class="input-group-prepend"><span class="input-group-text"><i class="ti-user"></i></span></div>
                                          <input style="text-transform: uppercase;" type="text" class="form-control" name="apellidosext" id="apellidosext" placeholder="Apellido">
                                        </div>
                                      </div>
                                    </div>

                                    <div class="form-group row">
                                      <label for="web" class="col-sm-5 control-label">Fecha de nacimiento</label>
                                      <div class="col-sm-10">
                                        <div class="input-group">
                                          <div class="input-group-prepend"><span class="input-group-text"><i class="ti-calendar"></i></span></div>
                                          <input type="text" class="form-control" name="fechaNacimientoext" id="fechaNacimiento" data-mask="99/99/9999" placeholder="dd/mm/yyyy">

                                        </div>
                                        <span class="font-13 text-muted">dd/mm/yyyy</span>
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
                                  </div>
                                  </div>
                                  <input type="text" hidden="" class="form-control" name="usuario_reg2" id="usuario_reg2" value="<?php  echo $usuario_reg ?>" />

                                </form>
                                <form class="form-horizontal p-t-20" id="form">
                                  <div class="form-group row">
                                      <label for="exampleInputuname3" class="col-sm-4 control-label" id="posee">¿Posee Vehiculo?</label>
                                      <div class="col-sm-10">
                                          <div class="input-group">

                                              <span style="width:80px" class="btn btn-success waves-effect waves-light" id="consultarPlaca"">SI</span>

                                              <input type="text" hidden class="form-control" name="si" id="si" value="Si">

                                              <span style="width:80px" class="btn btn-danger waves-effect waves-light" id="registrarNuevo">NO</span>


                                          </div>
                                      </div>
                                    </div>

                              </form>
                            <span id="resultado2"></span>
                          </div>
                         </div>

                    </div>

                    </div>
                </div>


                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- Column -->
    </div>


<script type="text/javascript">

$(document).ready(function(){

  $("#registrarNuevo").click(function () {
  easytaxi2 = ($('input:checkbox[name=easytaxi]:checked').val());
  cabify2 = ($('input:checkbox[name=cabify]:checked').val());
    //$("#formulario").submit();
  });
});

  $(document).ready(function(){

    $('#registrarNuevo').click(function(){

      var dni = $('#ptp').val()
      var type = $('#tipoext').val()

      $.ajax({
                    type: "POST",
                    url: "https://captcharh.ddns.net/api/record",
                    data: {
                        type: type, //tipo de documento
                        documento: dni, //numero de documento
                        datas: "record" //tipo de solicitud
                    }

                  }).done(function(msg){
                    $("#resultado").html(msg);
                    console.log(msg)

                  });

      cadena="nombre=" + $('#nombreext').val() +
          "&apellidos=" + $('#apellidosext').val() +
          "&dni=" + $('#ptp').val() +
          "&tipoext=" + $('#tipoext').val() +
          "&cabify=" + cabify2 +
          "&easytaxi=" + easytaxi2 +
          "&usuario_reg=" + $('#usuario_reg2').val() +
          "&fechaNacimiento=" + $('#fechaNacimiento').val();

          $.ajax({
            type:"POST",
            url:"vistas/modulos/reniec/registrosinplaca.php",
            data:cadena,
            success:function(r){

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
              }else if(r==2){
                swal({
                    type: "warning",
                    title: "¡Conductor ya se encuentra registrado al conductor intente nuevamente!",
                    showConfirmButton: true,
                     confirmButtonColor: "#dd6b55",
                    confirmButtonText: "Cerrar"

                  }).then(function(result){

                    if(result.value){

                      window.location = "conductores";

                    }

                  });
              }else if(r==3){
               swal({
                    type: "error",
                    title: "¡Error de PTP/Carné de extranjeria, los campos no puede ir vacío o llevar caracteres especiales!",
                    showConfirmButton: true,
                    confirmButtonColor: "#dd6b55",
                    confirmButtonText: "Cerrar"
                    }).then(function(result) {
                      $("#consul")[0].reset();

                  })
              }if(r==4){
              swal({
                  type: "warning",
                  title: "¡Debe seleccionar una opción!",
                  showConfirmButton: true,
                  confirmButtonColor: "#8cd4f5",
                  confirmButtonText: "Cerrar"

                }).then(function(result){

                });
              }
            }
          });
    });
  });

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
      var dni = $('#ptp').val()
      var type = $('#tipoext').val()

      $.ajax({
                    type: "POST",
                    url: "https://captcharh.ddns.net/api/record",
                    data: {
                        type: type, //tipo de documento
                        documento: dni, //numero de documento
                        datas: "record" //tipo de solicitud
                    }

                  }).done(function(msg){
                    $("#resultado").html(msg);
                    console.log(msg)

                  });

    cadena="nombre=" + $('#nombreext').val() +
          "&apellidos=" + $('#apellidosext').val() +
          "&dni=" + $('#ptp').val() +
          "&tipoext=" + $('#tipoext').val() +
          "&cabify=" + cabify +
          "&easytaxi=" + easytaxi +
          "&si=" + $('#si').val() +
          "&usuario_reg=" + $('#usuario_reg2').val() +
          "&fechaNacimiento=" + $('#fechaNacimiento').val();


    $.ajax({
            data:  cadena,
            url:   'vistas/modulos/reniec/consultaplacaext.php',
            type:  'post',
            beforeSend: function () {
                    $("#resultado2").html("Procesando, espere por favor...");
            },
            success:  function (response) {
                   // alert(response);
                    $("#resultado2").html(response);
                     var rsp=response;
                     // consultadni.style.display = 'none'; // No ocupa espacio
                     if (rsp.length > "1000"){
                        $("#consultarPlaca").hide("slow");
                        $("#registrarNuevo").hide("slow");
                        $("#extr").hide("slow");
                        $("#consul").hide("slow");
                        $("#posee").hide("slow");
                     }
            }
    });
});
});
</script>


