<div class="col p-md-0">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Empresas</a>
        </li>
        <li class="breadcrumb-item active">Usuarios</li>
    </ol>
</div>
</div>
</div>
<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <button type="button" class="btn btn-rounded btn-ft btn-info d-none d-lg-block m-l-15" data-toggle="modal" data-target="#modalAgregarUsuario"><i class="fa fa-plus-circle"></i> Nuevo Usuario </button>
                      <div class="table-responsive m-t-20">
                        <table class="display nowrap table table-hover table-striped table-bordered dt-responsive" id="tablaUsuario" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                   <th style="width:10px">#</th>
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
                                   <th style="width:10px">#</th>
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
                            <?php

                            $item = null;
                            $valor = null;

                            $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
                            $contador=0;
                            foreach ($usuarios as $key => $value){

                            $contador++;
                              echo ' <tr>
                                      <td>'.($contador).'</td>
                                      <td>'.$value->nombre.'</td>
                                      <td>'.$value->usuario.'</td>';

                                      if($value->foto != ""){

                                        echo '<td><img src="'.$value->foto.'" class="img-thumbnail" width="40px"></td>';

                                      }else{

                                        echo '<td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>';

                                      }

                                      echo '<td>'.$value->perfil.'</td>';

                                      $item = 'ruc';
                                      $valor = $value->empresa;
                                      $clientes = ControladorClientes::ctrMostrarClientes($item, $valor);

                                      foreach ($clientes as $key => $valueclientes) {
                                        echo '<td>'.$valueclientes['razon_social'].'</td>';
                                      }


                                      if($value->estado != 0){

                                        echo '<td><button class="btn btn-rounded btn-ft btn-success btn-xs btnActivar" idUsuario="'.$value->usuario.'" estadoUsuario="0">Activado</button></td>';

                                      }else{

                                        echo '<td><button class="btn btn-rounded btn-ft btn-danger btn-xs btnActivar" idUsuario="'.$value->usuario.'" estadoUsuario="1">Desactivado</button></td>';


                                      }

                                      echo '<td>'.$value->ultimo_login.'</td>
                                      <td>

                                        <div class="btn-group">

                                          <button class="btn btn-rounded btn-ft btn-warning btnEditarUsuario" idUsuario="'.$value->usuario.'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil"></i></button>


                                        </div>

                                      </td>

                                    </tr>';
                            }


                            ?>

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

        <div class="modal-header">

          <h4 class="modal-title">Agregar usuario</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">
        <div class="box-body">
            <div class="row">
            <div class="col-6 col-sm-6">

                <!-- ENTRADA PARA EL DNI -->

                 <div class="form-group">
                    <label for="dni">DNI</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                         <span class="input-group-text" id="basic-addon2"><i class="fa fa-id-card"></i></span>
                        </div>
                    <input type="text" class="form-control" name="nuevoDni" placeholder="Ingresar DNI" id="nuevoDni" aria-label="DNI" aria-describedby="basic-addon2" required pattern="[0-9]{8-12}" minlength="8" maxlength="12">
                    </div>
                </div>

                <!-- ENTRADA PARA EL NOMBRE -->

                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                         <span class="input-group-text" id="basic-addon2"><i class="fa fa-user"></i></span>
                        </div>
                    <input type="text" class="form-control" name="nuevoNombre" placeholder="Ingresar nombre" required aria-label="Nombre" aria-describedby="basic-addon2">
                    </div>
                </div>

                <!-- ENTRADA PARA EL USUARIO -->

                <div class="form-group">
                    <label for="Usuario">Usuario</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                         <span class="input-group-text" id="basic-addon2"><i class="fa fa-key"></i></span>
                        </div>
                    <input type="text" class="form-control" name="nuevoUsuario" placeholder="Ingresar usuario" id="nuevoUsuario" required aria-label="Usuario" aria-describedby="basic-addon2">
                    </div>
                </div>

              <div class="form-group">
              <label for="Empresa">Empresa</label>
              <div class="input-group">
               <div class="input-group-prepend">
                     <span class="input-group-text" id="basic-addon2"><i class="fa fa-building"></i></span>
                    </div>

                <select class="form-control input-lg" name="nuevoEmpresa">


                  <?php

                    if ($_SESSION['empresa'] == "20557675052") {
                      $item=null;
                      $valor=null;
                    } else {
                      $item='ruc';
                      $valor=$_SESSION['empresa'];
                    }

                    $clientes = ControladorClientes::ctrMostrarClientes($item, $valor);

                   foreach ($clientes as $key => $value){

                    if ($_SESSION['empresa'] == "20557675052") {

                      echo '<option value="'.$value->ruc.'" readonly> '.$value->razon_social .' </option>';
                    } else {

                      echo '<option value="'.$value['ruc'].'" readonly> '.$value['razon_social'].'</option>';
                    }


                    }
                  ?>
                </select>

              </div>

            </div>



            </div>
            <div class="col-6 col-sm-6">

                <!-- ENTRADA PARA LA CONTRASEÑA -->

                <div class="form-group">
                    <label for="Contraseña">Contraseña</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                         <span class="input-group-text" id="basic-addon2"><i class="fa fa-lock"></i></span>
                        </div>
                    <input type="password" class="form-control" name="nuevoPassword" placeholder="Ingresar contraseña" required aria-label="Contraseña" aria-describedby="basic-addon2">
                    </div>
                </div>

              <!-- ENTRADA PARA EL CORREO -->

                <div class="form-group">
                    <label for="Correo">Correo</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                         <span class="input-group-text" id="basic-addon2"><i class="fa fa-at"></i></span>
                        </div>
                    <input type="email" class="form-control" name="nuevoCorreo" placeholder="Ingresar Correo" required aria-label="Correo" id="nuevoCorreo" aria-describedby="basic-addon2">
                    </div>
                </div>

               <!-- ENTRADA PARA EL Telefono -->

                <div class="form-group">
                    <label for="Telefono">Telefono</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                         <span class="input-group-text" id="basic-addon2"><i class="fa fa-phone"></i></span>
                        </div>
                    <input type="text" class="form-control" name="nuevoTelefono" placeholder="Ingresar telefono" required aria-label="Telefono" id="nuevoTelefono" aria-describedby="basic-addon2" data-mask="999999999">
                    </div>
                </div>

                <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->


              <div class="form-group">
              <label for="Perfil">Perfil</label>

              <div class="input-group">
               <div class="input-group-prepend">
                     <span class="input-group-text" id="basic-addon2"><i class="fa fa-lock"></i></span>
                    </div>





                  <?php

                    switch ($_SESSION["id_rol"]) {
                      case "5c2f826ea6bbfc38cc6478d1": //administrador arhu
                        $item='descripcion';
                        $valor='Administrador';

                      break;

                      case "5c2f8290a6bbfc38cc6478d2": //administrador empresa
                        $item='descripcion';
                        $valor='Operador';

                      break;

                      }

                    $rol = ControladorRoles::ctrMostrarRoles($item, $valor);


                   foreach ($rol as $key => $value){

                  ?>


                    <input type="text" class="form-control" name="" value="<?php echo $value['descripcion'] ?>" required aria-label="" id="" aria-describedby="basic-addon2" readonly>

                  <?php

                    }
                  ?>

                </select>

              </div>

            </div>
            </div>
            </div>
            <!-- ENTRADA PARA SUBIR FOTO -->

             <div class="form-group">

              <div class="panel">SUBIR FOTO</div>

                <input type="file" name="nuevaFoto" class="nuevaFoto" />

              <p class="help-block">*Peso máximo de la foto 2MB </p>
              </div>


        </div>
        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-rounded btn-ft btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-rounded btn-ft btn-primary">Guardar usuario</button>

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

          <button type="button" class="btn btn-rounded btn-ft btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-rounded btn-ft btn-primary">Modificar usuario</button>

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