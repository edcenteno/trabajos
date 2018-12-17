<?php

require 'vendor/autoload.php'; //

use Purekid\Mongodm\Model;

    class ModeloProvincias extends Model {
        static $collection = "provincias";

        /** use specific config section **/
        public static $config = 'default';
}
?>
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
                    <li class="breadcrumb-item active">Usuarios</li>
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
                        <table class="display nowrap table table-hover table-striped table-bordered dt-responsive tablas" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                   <th style="width:10px">#</th>
                                   <th>Nombre</th>
                                   <th>Usuario</th>
                                   <th>Foto</th>
                                   <th>Perfil</th>
                                   <th>Empresa</th>
                                   <th>Provincia</th>
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
                                   <th>Provincia</th>
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

                            $provincias = ModeloProvincias::one(['id'=>$value->id_provincia
                                          ]);

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
                                      echo '<td>'.$value->empresa.'</td>';
                                      echo '<td>'.$provincias->descripcion.'</td>';

                                      if($value->estado != 0){

                                        echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$value->usuario.'" estadoUsuario="0">Activado</button></td>';

                                      }else{

                                        echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="'.$value->usuario.'" estadoUsuario="1">Desactivado</button></td>';


                                      }

                                      echo '<td>'.$value->ultimo_login.'</td>
                                      <td>

                                        <div class="btn-group">

                                          <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value->usuario.'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil"></i></button>

                                          <button class="btn btn-danger" fotoUsuario="'.$value->foto.'" usuario="'.$value->usuario.'"><i class="fa fa-times"></i></button>

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

        <div class="modal-header" style="background:#6f42c1; color:white">

          <h4 class="modal-title">Agregar usuario</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->


        <link rel="stylesheet" href="estilo.css">

          </head>
          <body>

        <div class="txt1">CUENTA SUSPENDIDA TEMPORALMENTE</div>
        <div class="txt2">Esta cuenta ha sido suspendida temporalmente.</div>
        <div class="logo"><img src="vistas/img/plantilla/arhuint.jpg" width="200px"></div>
        <div id="orbit-system">
          <div class="system">
            <div class="satellite-orbit">
              <div class="satellite">SUSPENDIDO</div>
            </div>
            <div class="planet"><img src="http://orig02.deviantart.net/69ab/f/2013/106/0/4/sad_man_by_agiq-d61wk0d.png" height="200px"> </div>
          </div>
        </div>
        <div class="txt3">Para mas informacion por favor </div>
        <a href="#"><div class="button">Contactar con nosotros</div></a>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        </div>

      </form>

    </div>

  </div>

</div>
