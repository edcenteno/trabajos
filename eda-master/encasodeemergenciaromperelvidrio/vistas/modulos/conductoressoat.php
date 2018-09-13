<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Conductores Cabify</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Administrar</a></li>
                    <li class="breadcrumb-item active">Conductores</li>
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
                    <!-- <button type="button" class="btn btn-info d-none d-lg-block m-l-15" data-toggle="modal" data-target="#modalAgregarConductor"><i class="fa fa-plus-circle"></i> Nuevo Conductor </button> -->
                      <div class="table-responsive m-t-20">
                        <table class="display nowrap table table-hover table-striped table-bordered dt-responsive tablaConductoresSoat" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>FECHA DE REGISTRO</th>
                                    <th>DNI</th>
                                    <th>NOMBRE</th>
                                    <th>APELLIDO</th>
                                    <th>PLACA</th>
                                    <th>EMPRESA</th>
                                    <th>RESULTADO</th>
                                    <th>SOAT</th>
                                    <th>VER MAS</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                   <th>FECHA DE REGISTRO</th>
                                   <th>DNI</th>
                                   <th>NOMBRE</th>
                                   <th>APELLIDO</th>
                                   <th>PLACA</th>
                                   <th>EMPRESA</th>
                                   <th>RESULTADO</th>
                                   <th>SOAT</th>
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