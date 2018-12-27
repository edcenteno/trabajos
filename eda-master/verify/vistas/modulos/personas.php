 <div class="col p-md-0">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Administrar</a>
        </li>
        <li class="breadcrumb-item active">Personas</li>
    </ol>
</div>
</div>
</div>

    <!--=============================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-info d-none d-lg-block m-l-15" data-toggle="modal" data-target="#modalAgregarConductor"><i class="fa fa-plus-circle"></i> Nueva Persona </button>
                      <div class="table-responsive m-t-20">
                        <table class="display nowrap table table-hover table-striped table-bordered dt-responsive" id = "tablaConductores" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>FECHA DE REGISTRO</th>
                                    <th>PROVINCIA</th>
                                    <th>DNI</th>
                                    <th>NOMBRE</th>
                                    <th>APELLIDO</th>
                                    <th>PLACA</th>
                                    <th>EMPRESA</th>
                                    <th>RESULTADO</th>
                                    <th>VER MAS</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                   <th>FECHA DE REGISTRO</th>
                                   <th>PROVINCIA</th>
                                   <th>DNI</th>
                                   <th>NOMBRE</th>
                                   <th>APELLIDO</th>
                                   <th>PLACA</th>
                                   <th>EMPRESA</th>
                                   <th>RESULTADO</th>
                                   <th>VER MAS</th>
                                </tr>
                            </tfoot>

                        </table>
                    </div>
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

<div id="modalAgregarConductor" class="modal fade" role="dialog">

  <div class="modal-dialog ">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header">

          <h4 class="modal-title">Agregar Conductor</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <?php include 'reniec/reniec.php'; ?>

          </div>
      </div>


      </form>

    </div>

  </div>

</div>