<script>
function realizaProceso(){

  $('#consultaruc').hide();

  ruc="&ruc=" +$('#ruc').val()+
      "&usuario_reg=" +$('#usuario_reg').val()

        $('#resultado').html('<div class="loading"><img src="vistas/img/plantilla/loader.gif" alt="loading" /><br/>Un momento, por favor...</div>');


  $.ajax({
          data:  ruc,
          url:   'vistas/modulos/ruc/ruc.php',
          type:  'post',
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
                    title: "¡Cliente ya existe en la base de datos, intenar con otro!",
                    showConfirmButton: true,
                     confirmButtonColor: "#dd6b55",
                    confirmButtonText: "Cerrar"

                  }).then(function(result){

                    if(result.value){

                            $('#ruc').val('');
                            $("#resultado").hide('');
                            $('#consultaruc').show();


                    }

                  });
              }else if(r==3){
               swal({
                    type: "error",
                    title: "¡No se pudo conectar a sunat!",
                    showConfirmButton: true,
                    confirmButtonColor: "#dd6b55",
                    confirmButtonText: "Cerrar"
                    }).then(function(result) {
                       $('#ruc').val('');
                       $("#resultado").hide('');
                       $('#consultaruc').show();


                  })
              }if(r==4){
              swal({
                  type: "warning",
                  title: "¡RUC Erroneo!",
                  showConfirmButton: true,
                  confirmButtonColor: "#8cd4f5",
                  confirmButtonText: "Cerrar"

                }).then(function(result){

                    $('#ruc').val('');
                    $("#resultado").hide('');
                    $('#consultaruc').show();


                });
              }if(r==5){
              swal({
                  type: "warning",
                  title: "¡No puede ir vacio, solo númericos!",
                  showConfirmButton: true,
                  confirmButtonColor: "#8cd4f5",
                  confirmButtonText: "Cerrar"

                }).then(function(result){

                    $('#ruc').val('');
                    $("#resultado").hide('');
                    $('#consultaruc').show();

                });
              }
          }
  });
}

</script>
<div class="col p-md-0">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Empresas</a>
        </li>
        <li class="breadcrumb-item active">Clientes</li>
    </ol>
</div>
</div>
</div>
<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <button type="button" class="btn btn-rounded btn-ft btn-info d-none d-lg-block m-l-15" data-toggle="modal" data-target="#modalAgregarClientes"><i class="fa fa-plus-circle"></i> Nuevo Conductor </button>
                      <div class="table-responsive m-t-20">
                        <table class="display nowrap table table-hover table-striped table-bordered dt-responsive" style="min-width: 845px" id = "tablaClientes" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>FECHA DE REGISTRO</th>
                                    <th>RUC</th>
                                    <th>RAZON SOCIAL</th>
                                    <th>REPRESENTANTE LEGAL </th>
                                    <th>VER MAS</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                   <th>FECHA DE REGISTRO</th>
                                   <th>RUC</th>
                                   <th>RAZON SOCIAL</th>
                                   <th>REPRESENTANTE LEGAL </th>
                                   <th>VER MAS</th>
                                </tr>
                            </tfoot>

                        </table>
                    </div>
                </div>
            </div>
        </div>

<!--=====================================
MODAL AGREGAR USUARIO
======================================-->

<div id="modalAgregarClientes" class="modal fade" tabindex="-1" role="dialog" style="display: none;">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">


        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header">

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
                                          <button type="button" href="javascript:;" class="btn btn-rounded btn-ft btn-success waves-effect waves-light" onclick="realizaProceso()" id="consultaruc" name="consultaruc">Consultar</button>
                                      </div>
                                  </div>
                                </form>
                                <span id="resultado"></span>
                            </div>
                          </div>
                        </div>

      </form>

    </div>

  </div>

</div>
