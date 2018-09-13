<?php

$item = null;
$valor = null;
$orden = "id";

$item2 = null;
$valor2 = null;

//$ventas = ControladorVentas::ctrSumaTotalVentas();


$clientes = ControladorConductor::ctrMostrarConductorhoyCabify($item, $valor);
$totalClientes = count($clientes);

$clientes2 = ControladorConductor::ctrMostrarConductorMesCabify($item2, $valor2);
$cabify = count($clientes2);

$clientes3 = ControladorConductor::ctrMostrarConductorhoyCabifyact($item2, $valor2);
$actcbf = count($clientes3);

$clientes4 = ControladorConductor::ctrMostrarConductorMesCabifyact($item2, $valor2);
$actcbfmes = count($clientes4);

$cbf5 = ControladorConductor::ctrMostrarConductormigradosmescbf($item2, $valor2);
$migradosmes = count($cbf5);

$cbf6 = ControladorConductor::ctrMostrarConductormigradosmesanteriorcbf($item2, $valor2);
$migradosmesanterior = count($cbf6);

$a = number_format($totalClientes);
$c = number_format($cabify);


$fecha_actual = date("M-Y");
?>


<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12" style="width: 85%; height: 140px;">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h2><i class="icon-user-follow"></i></h2>
                        <h3 class="text-muted">Reporte de conductores Cabify del mes </h3>
                    </div>
                    <div class="ml-auto">
                        <h2 class="counter text-purple"><?php echo $a ?></h2>
                    </div><br>
                    <?php
                     $b = ($a *100)/1500;
                     ?>
                </div>
            </div>
            <div class="col-12">
                <div class="progress">

                <div class="progress-bar bg-purple progress-bar-striped" role="progressbar" style="width: <?php echo intval($b) ?>%;height:35px;" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"> <?php echo intval($b) ?>%</div>
            </div>
        </div>
        <a href="conductorescabify" class="small-box-footer">
          Más info <i class="fa fa-arrow-circle-right"></i>
        </a>
    </div>
</div>
</div>
<hr>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12" style="width: 85%; height: 140px;">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h3><i class="icon-book-open"></i></h3>
                        <h3 class="text-muted">Reporte de conductores registrados Cabify</h3>
                    </div>
                    <div class="ml-auto">
                        <h2 class="counter text-info"><?php echo number_format($cabify); ?></h2>
                        <?php
                         $cbf = ($c *100)/20000;
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="progress">
                    <div class="progress-bar bg-info" role="progressbar" style="width:<?php echo intval($cbf) ?>%; height: 25px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"> <?php echo intval($cbf) ?>%</div>
                </div>
            </div>
        </div>
        <a href="busqueda" class="small-box-footer">
          Más info <i class="fa fa-arrow-circle-right"></i>
        </a>
    </div>
</div>
<hr>
 <div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12" style="width: 85%; height: 140px;">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h3><i class="ti-reload"></i></h3>
                        <h3 class="text-muted">Reporte de conductores migrados del Mes <?php echo date('M-Y')  ?> de EasyTaxi a Cabify</h3>
                    </div>
                    <div class="ml-auto">
                        <h2 class="counter text-info"><?php echo number_format($migradosmes); ?></h2>
                        <?php
                         $cbf = $actcbf;
                         $cbf = ($cbf *100)/$cbf;
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="progress">
                    <div class="progress-bar bg-info" role="progressbar" style="width:<?php echo number_format($migradosmes); ?>%; height: 25px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"> <?php echo intval($migradosmes) ?></div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- <hr>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12" style="width: 85%; height: 140px;">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h3><i class="ti-reload"></i></h3>
                        <h3 class="text-muted">Reporte de conductores Actualizado Cabify mes anterior</h3>
                    </div>
                    <div class="ml-auto">
                        <h2 class="counter text-info"><?php echo number_format($actcbfmes); ?></h2>
                        <?php
                         $cbf = $actcbfmes;
                         $cbf = ($c *100)/20000;
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="progress">
                    <div class="progress-bar bg-info" role="progressbar" style="width:<?php echo intval($cbf) ?>%; height: 25px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"> <?php echo intval($cbf) ?></div>
                </div>
            </div>
        </div>

    </div>
</div> -->