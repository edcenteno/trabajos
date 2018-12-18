
<script>
function realizaProceso(){
  var filter_number = /^[0-9]+$/;

  ruc="&ruc=" +$('#ruc').val()

  $.ajax({
          data:  ruc,
          url:   'vistas/modulos/ruc/ruc.php',
          type:  'post',

          beforeSend: function () {
                  $("#resultado").html("Procesando, espere por favor...");
          },
          success: function (r) {
             if(r==1){
              swal({
                  type: "success",
                  title: "¡El Cliente ha sido guardado correctamente!",
                  showConfirmButton: true,
                  confirmButtonColor: "#8cd4f5",
                  confirmButtonText: "Cerrar"

                }).then(function(result){

                  if(result.value){

                    window.location = "clientes";

                  }

                });
              }else if(r==2){
                swal({
                    type: "warning",
                    title: "¡No se pudo conectar a sunat!",
                    showConfirmButton: true,
                     confirmButtonColor: "#dd6b55",
                    confirmButtonText: "Cerrar"

                  }).then(function(result){

                    if(result.value){

                      window.location = "clientes";

                    }

                  });
              }else if(r==3){
                swal({
                    type: "warning",
                    title: "¡No se pudo conectar a sunat!",
                    showConfirmButton: true,
                     confirmButtonColor: "#dd6b55",
                    confirmButtonText: "Cerrar"

                  }).then(function(result){

                    if(result.value){

                      window.location = "clientes";

                    }

                  });
              }else if(r==3){
               swal({
                    type: "error",
                    title: "¡RUC no encontrado!",
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
}

</script>
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Usuarios</h4>

        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Clientes</li>
                </ol>

            </div>
        </div>
    </div>
     <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-info d-none d-lg-block m-l-15" data-toggle="modal" data-target="#modalAgregarUsuario"><i class="fa fa-plus-circle"></i> Nuevo Usuario </button>
                      <div class="table-responsive m-t-20">
                        <table class="display nowrap table table-hover table-striped table-bordered dt-responsive tablaConductores" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                   <th>Nombre</th>
                                   <th>Usuario</th>
                                   <th>Foto</th>
                                   <th>Perfil</th>
                                   <th>Empresa</th>
                                   <th>Estado</th>
                                   <th>Último login</th>
                                   <th>Acciones</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                   <th>Nombre</th>
                                   <th>Usuario</th>
                                   <th>Foto</th>
                                   <th>Perfil</th>
                                   <th>Empresa</th>
                                   <th>Estado</th>
                                   <th>Último login</th>
                                   <th>Acciones</th>
                                </tr>
                            </tfoot>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->

<!--=====================================
MODAL AGREGAR USUARIO
======================================-->

<div id="modalAgregarUsuario" class="modal fade" tabindex="-1" role="dialog" style="display: none;">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">


        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#6f42c1; color:white">

          <h4 class="modal-title">Agregar Cliente</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="tab-content">
                    <div class="tab-pane active" id="peru" role="tabpanel">
                        <div class="card-body">
                            <div class="row">
                                <form class="form-horizontal p-t-20" id="consul">
                                  <div class="form-group row" id="x">
                                      <label for="exampleInputuname3" id="algo" class="col-sm-3 control-label" id="label">Introduce RUC</label>
                                      <div class="col-sm-9">
                                          <div class="input-group">
                                              <div class="input-group-prepend" id="div"><span class="input-group-text"><i id="ico" class="ti-id-badge"></i></span></div>
                                              <input type="text" class="form-control" pattern="[0-9]{11}" minlength="11" maxlength="11" name="ruc" id="ruc" value="" placeholder="RUC" />
                                              <input type="text" hidden class="form-control" name="usuario_reg" id="usuario_reg" value="<?php  echo $usuario_reg ?>" />
                                          </div>

                                      </div>
                                  </div>

                                  <div class="form-group row m-b-0">
                                      <div class="offset-sm-3 col-sm-9">
                                          <button type="button" href="javascript:;" class="btn btn-success waves-effect waves-light" onclick="realizaProceso()" id="consultaruc" name="consultaruc">Consultar</button>
                                      </div>
                                  </div>
                                </form>
                                <span id="resultado"></span>
                            </div>
                          </div>
                        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar usuario</button>

        </div>

        <?php

          $crearUsuario = new ControladorUsuarios();
          $crearUsuario -> ctrCrearUsuario();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR USUARIO
======================================-->

<div id="modalEditarUsuario" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#6f42c1; color:white">


          <h4 class="modal-title">Editar usuario</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

             <!-- ENTRADA PARA EL NOMBRE -->

                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                         <span class="input-group-text" id="basic-addon2"><i class="fa fa-user"></i></span>
                        </div>
                    <input type="text" class="form-control" id="editarNombre" name="editarNombre" required" aria-label="Nombre" aria-describedby="basic-addon2">
                    </div>
                </div>

                <!-- ENTRADA PARA EL USUARIO -->

                <div class="form-group">
                    <label for="Usuario">Usuario</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                         <span class="input-group-text" id="basic-addon2"><i class="fa fa-key"></i></span>
                        </div>
                    <input type="text" class="form-control" id="editarUsuario" name="editarUsuario" required" aria-label="Usuario" aria-describedby="basic-addon2" readonly="">
                    </div>
                </div>


            <!-- ENTRADA PARA LA CONTRASEÑA -->


            <div class="form-group">
                <label for="Contraseña">Contraseña</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                     <span class="input-group-text" id="basic-addon2"><i class="fa fa-lock"></i></span>
                    </div>
                <input type="password" class="form-control" name="editarPassword" placeholder="Escriba la nueva contraseña" required" aria-label="Contraseña" aria-describedby="basic-addon2">

                <input type="hidden" id="passwordActual" name="passwordActual">

                </div>
                <b><font color ="red" size="1,5">*NO UTILIZAR CARACTERES ESPECIALES</font></b>
            </div>


            <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

            <div class="form-group">

              <div class="input-group">
               <div class="input-group-prepend">
                     <span class="input-group-text" id="basic-addon2"><i class="fa fa-lock"></i></span>
                    </div>

                <select class="form-control input-lg" name="editarPerfil">

                  <option value="" id="editarPerfil"></option>

                  <option value="Administrador">Administrador</option>

                  <option value="Operador">Operador</option>

                  <option value="RRHH">RRHH</option>

                  <option value="CallCenter">Call Center</option>

                </select>

              </div>

            </div>

            <div class="form-group">
              <label for="Empresa">Empresa</label>
              <div class="input-group">
               <div class="input-group-prepend">
                     <span class="input-group-text" id="basic-addon2"><i class="fa fa-building"></i></span>
                    </div>

                <select class="form-control input-lg" name="editarEmpresa">
                  <option value="" id="editarEmpresa"></option>
                  <option value="cabify">Cabify</option>

                  <option value="easytaxi">EasyTaxy</option>

                 <!--  <option value="EasyTaxyEconomy">Easy Taxy Economy</option> -->

                </select>

              </div>

            </div>

            <!-- <div class="form-group">
              <label for="Ubicación">Ubicación</label>
              <div class="input-group">
               <div class="input-group-prepend">
                     <span class="input-group-text" id="basic-addon2"><i class="fa fa-map-marker"></i></span>
                    </div>

                <select class="form-control input-lg" name="nuevoUbicacion">
                  <option value="" id="editarProvincia"></option>
                  <?php


                    $provincia = ModeloProvincias::all();
                  //  var_dump($provincia);
                   foreach ($provincia as $key => $value){
                  ?>
                    <option value="<?php echo $value->id  ?>"><?php echo $value->descripcion ?></option>
                  <?php

                    }
                  ?>
                </select>

              </div>

            </div> -->

            <!-- ENTRADA PARA SUBIR FOTO -->

             <div class="form-group">

              <div class="panel">SUBIR FOTO</div>

              <input type="file" class="nuevaFoto" name="editarFoto">

              <p class="help-block">Peso máximo de la foto 2MB</p>

              <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

              <input type="hidden" name="fotoActual" id="fotoActual">

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar usuario</button>

        </div>

     <?php

          $editarUsuario = new ControladorUsuarios();
          $editarUsuario -> ctrEditarUsuario();

        ?>

      </form>

    </div>

  </div>

</div>

<?php

  $borrarUsuario = new ControladorUsuarios();
  $borrarUsuario -> ctrBorrarUsuario();

?>
