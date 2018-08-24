<?php

$item = null;
$valor = null;
$orden = "id";

$item2 = null;
$valor2 = null;

//$ventas = ControladorVentas::ctrSumaTotalVentas();


$clientes = ControladorConductor::ctrMostrarConductorhoyact($item, $valor);
$totalClientes = count($clientes);

$clientes2 = ControladorConductor::ctrMostrarConductorMesact($item2, $valor2);
$act = count($clientes2);
$a = number_format($totalClientes);
$e = number_format($act);
$fecha_actual = date("M-Y");
?>


<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12" style="width: 85%; height: 140px;">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h2><i class="icon-user-follow"></i></h2>
                        <h3 class="text-muted">Reporte de Actualizados del mes</h3>
                    </div>
                    <div class="ml-auto">
                        <h2 class="counter text-warning"><?php echo $a ?></h2>
                    </div><br>
                    <?php
                     $b = ($a *100)/1500;
                     ?>
                </div>
            </div>
            <div class="col-12">
                <div class="progress">

                <div class="progress-bar bg-warning progress-bar-striped" role="progressbar" style="width: <?php echo intval($b) ?>%;height:35px;" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"> <?php echo intval($b) ?>%</div>
            </div>
        </div>
        <a href="conductores" class="small-box-footer">
          Más info <i class="fa fa-arrow-circle-right"></i>
        </a>
    </div>
</div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12" style="width: 85%; height: 140px;">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h3><i class="icon-book-open"></i></h3>
                        <h3 class="text-muted">Reporte de actualizado mes anterior</h3>
                    </div>
                    <div class="ml-auto">
                        <h2 class="counter text-info"><?php echo number_format($act); ?></h2>
                        <?php
                         $etx = ($e *100)/20000;
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="progress">
                    <div class="progress-bar bg-info" role="progressbar" style="width:<?php echo intval($etx) ?>%; height: 25px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"> <?php echo intval($etx) ?></div>
                </div>
            </div>
        </div>
        <a href="busqueda" class="small-box-footer">
          Más info <i class="fa fa-arrow-circle-right"></i>
        </a>
    </div>
</div>