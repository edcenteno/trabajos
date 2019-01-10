<?php
    $item = 'ruc';
    $valor = $_SESSION['empresa'];
    $items = ControladorClientes::ctrMostrarClientes($item,$valor);

?>
<div class="col p-md-0">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Administrar</a>
        </li>
        <li class="breadcrumb-item active">Configuración</li>
    </ol>
</div>
</div>


   <div class="card">
    <div class="card">
    <div class="card-body pb-0">
        <h4 class="card-title mb-5">Seleccione su configuración</h4>
        <form id="formconfig" method="post">


        <div class="row">
        <?php
        $a=0;
            foreach ($items as $key => $value) {
            $a++
        ?>
            <div class="col-sm-6 col-lg-4 col-xl">
                <div class="form-check mb-5 mr-5">
                    <input name="check[<?php echo $a ?>]" id="checkbox<?php echo $a ?>" class="form-check-input styled-checkbox" value="<?php echo $value['_id'] ?>" type="checkbox">
                    <label for="checkbox<?php echo $a ?>" class="form-check-label check-d-purple">
                        <?php echo $items->config ?></label>
                </div>
            </div>
        <?php
            }
        ?>


            <div class="col-sm-6 col-lg-4 col-xl"></div>

        </div>
        <span type="button" onclick="realizaProceso()" class="btn btn-rounded btn-ft btn-primary btn-ft">Guardar</span>

         </form>


<script>
function realizaProceso(){

        parametros=$('#formconfig').serialize()

        $.ajax({
                data:  parametros,
                url:   'vistas/modulos/configuracion/configuracion.php',
                type:  'post',

               success:function(r){

            if(r==1){
            swal({
                type: "success",
                title: "La Configuración ha sido guardado correctamente!",
                showConfirmButton: true,
                confirmButtonColor: "#8cd4f5",
                confirmButtonText: "Cerrar"

              }).then(function(result){

                if(result.value){

                  window.location = "configuracion";

                }

              });
          }
      }
      });
    };
</script>
