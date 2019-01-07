<?php

    $suma = ModeloConductor::count([
                                  'fecha_act' => new MongoRegex("/$mes/")
                                ]);
?>


<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12" style="width: 85%; height: 140px;">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h2><i class="icon-refresh"></i></h2>
                        <h3 class="text-muted">Reporte de conductores Actualizados del mes <?php echo date('M-Y');?></h3>
                    </div>
                    <div class="ml-auto">
                        <h2 class="counter text-info"><?php echo $suma ?></h2>
                    </div><br>

                </div>
            </div>
    </div>
</div>
</div>
