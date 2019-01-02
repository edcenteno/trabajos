<?php
    $item = null;
    $valor = null;
    $items = ControladorItems::ctrMostrarItems($item,$valor);

?>
<div class="col p-md-0">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Administrar</a>
        </li>
        <li class="breadcrumb-item active">Configuración</li>
    </ol>
</div>
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
                    <input name="check[<?php echo $a ?>]" id="checkbox<?php echo $a ?>" class="form-check-input styled-checkbox" value="<?php echo $value->_id ?>" checked type="checkbox">
                    <label for="checkbox<?php echo $a ?>" class="form-check-label check-d-purple"><?php echo $value->descripcion ?></label>
                </div>
            </div>
        <?php
            }
        ?>


            <div class="col-sm-6 col-lg-4 col-xl"></div>

        </div>
        <span type="button" onclick="realizaProceso()" class="btn btn-primary btn-ft">Guardar</span>

         </form>


<script>
function realizaProceso(){

        parametros=$('#formconfig').serialize()

        $.ajax({
                data:  parametros,
                url:   'vistas/modulos/configuracion/configuracion.php',
                type:  'post',

                success:  function (response) {
                       // alert(response);
                        $("#resultado").html(response);
                        //console.log(response)

                       }
        });
}

</script>
