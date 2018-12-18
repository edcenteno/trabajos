<?php

$item = "fecha";
$valor = date('Y-m');
$fecha_actual = date("Y-m-d");

$valor2 = date("Y-m",strtotime($fecha_actual."- 1 month"));

//$ventas = ControladorVentas::ctrSumaTotalVentas();


$totalClientes = ControladorConductor::ctrMostrarConductorhoy($item, $valor);
$totalClientes2 = ControladorConductor::ctrMostrarConductorMes($item, $valor2);

$a = number_format($totalClientes);


?>


<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12" style="width: 85%; height: 140px;">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h2><i class="icon-user-follow"></i></h2>
                        <h3 class="text-muted">Reporte de conductores mes <?php echo date('M-Y');?></h3>
                    </div>
                    <div class="ml-auto">
                        <h2 class="counter text-info"><?php echo $a ?></h2>
                    </div><br>
                    <?php
                     $ab = str_replace(',','',$a);
                     $b = (intval($ab) *100)/3500;
                     ?>
                </div>
            </div>
            <div class="col-12">
                <div class="progress">

                <div class="progress-bar bg-success progress-bar-striped" role="progressbar" style="width: <?php echo intval($b) ?>%;height:35px;" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"> <?php echo intval($b) ?>%</div>
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
                        <h3 class="text-muted">Reporte de conductores mes <?php echo date("M-Y",strtotime($fecha_actual."- 1 month"));?></h3>
                    </div>
                    <div class="ml-auto">
                        <h2 class="counter text-info"><?php echo number_format($totalClientes2); ?></h2>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="progress">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 85%; height: 25px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
        <a href="busqueda" class="small-box-footer">
          Más info <i class="fa fa-arrow-circle-right"></i>
        </a>
    </div>
</div>