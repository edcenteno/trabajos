<script>
function realizaProceso(){

        parametros="&dni=" + $('#dni').val()+
                   "&provincia=" + '<?php echo $provincia ?>'+
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

<script>
  $(document).ready(function(){

       $('#personal').hide();
       $('#vehiculocarnet').hide();

    });
function realizaProcesocarnet(){

 $('#consultacarnet').hide();

    carnet = $('#carnet').val();

    fechaNacimientocarnet = $('#fechaNacimientocarnet').val();
    filter_number = /^[0-9]+$/;

    if (fechaNacimientocarnet.length < '10') {
      swal({
        type: "error",
        title: "¡Error de los campos no puede ir vacío o llevar caracteres especiales!",
        showConfirmButton: true,
        confirmButtonColor: "#dd6b55",
        confirmButtonText: "Cerrar"
        })

      }
      if (carnet.length > '9') {
      swal({
        type: "error",
        title: "¡Error el carné de Extranjeria debe tener Maximo de 9 digitos!",
        showConfirmButton: true,
        confirmButtonColor: "#dd6b55",
        confirmButtonText: "Cerrar"
        })


    }

    if (carnet.length < '9') {
      swal({
        type: "error",
        title: "¡Error el carné de Extranjeria debe tener Minimo de 9 digitos!",
        showConfirmButton: true,
        confirmButtonColor: "#dd6b55",
        confirmButtonText: "Cerrar"
        })
    }

    if (!filter_number.test(carnet)) {
      swal({
        type: "error",
        title: "¡Error el carné de Extranjeria NO puede llevar letras o caracteres especiales!",
        showConfirmButton: true,
        confirmButtonColor: "#dd6b55",
        confirmButtonText: "Cerrar"
        })
    }

    else{

    $.ajax({
          type: "POST",
          url: 'https://captcharh.ddns.net/api/record/principal/carnet',
          data: {
              carnet: carnet, //tipo de documento
          },
          beforeSend: function () {
            $("#resultadocarnet").html("Procesando, espere por favor...");
          },

        }).done(function(msg){
         // $("#resultado").html(msg);
          //console.log(msg)
        if (msg != 'Datos no Encontrados.') {
           $('#personal').show();
           $('#nombrecarnet').val(msg['Nombres']);
           $('#apellidoscarnet').val(msg['ApellidoPaterno'] + ' ' +msg['ApellidoMaterno']);

           $('#vehiculocarnet').show();
           $("#carnet").attr("readonly","readonly");
           $("#fechaNacimientocarnet").attr("readonly","readonly");
           $("#resultadocarnet").hide();

     }else{
        swal({
          type: "warning",
          title: "¡Atención, el numero de carné de extranjeria no encontro datos, verifique los digitos o llenar de forma manual y notificar a nuestro Equipo de soporte!",
          showConfirmButton: true,
          confirmButtonColor: "#dd6b55",
          confirmButtonText: "Cerrar"
        })
     }
      });
        }

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
            <h4 class="text-themecolor">Personas</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Administrar</a></li>
                    <li class="breadcrumb-item active">Personas</li>
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
                    <button type="button" class="btn btn-info d-none d-lg-block m-l-15" data-toggle="modal" data-target="#modalAgregarConductor"><i class="fa fa-plus-circle"></i> Nueva Persona </button>
                      <div class="table-responsive m-t-20">
                        <table class="display nowrap table table-hover table-striped table-bordered dt-responsive tablaPersonas" id = "condu" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>FECHA DE REGISTRO</th>
                                    <th>DNI</th>
                                    <th>NOMBRE</th>
                                    <th>APELLIDO</th>
                                    <th>RESULTADO</th>
                                    <th>VER MAS</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                   <th>FECHA DE REGISTRO</th>
                                   <th>DNI</th>
                                   <th>NOMBRE</th>
                                   <th>APELLIDO</th>
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

          <h4 class="modal-title">Agregar Persona</h4>

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