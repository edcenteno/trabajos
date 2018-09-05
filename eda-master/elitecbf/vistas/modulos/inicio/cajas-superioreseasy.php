<?php

$item = null;
$valor = null;
$orden = "id";

$item2 = null;
$valor2 = null;

//$ventas = ControladorVentas::ctrSumaTotalVentas();


$clientes = ControladorConductor::ctrMostrarConductorhoyEasy($item, $valor);
$totalClientes = count($clientes);

$clientes2 = ControladorConductor::ctrMostrarConductorMesEasy($item2, $valor2);
$easy = count($clientes2);

$clientes3 = ControladorConductor::ctrMostrarConductorhoyeasyact($item2, $valor2);
$acteasy = count($clientes3);

$clientes4 = ControladorConductor::ctrMostrarConductorMeseasyact($item2, $valor2);
$acteasymes = count($clientes4);

$easy5 = ControladorConductor::ctrMostrarConductormigradosmeseasy($item2, $valor2);
$migradosmes = count($easy5);

$easy6 = ControladorConductor::ctrMostrarConductormigradosmesanterioreasy($item2, $valor2);
$migradosmesanterior = count($easy6);

$a = number_format($totalClientes);
$e = number_format($easy);
$fecha_actual = date("M-Y");
?>


<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12" style="width: 85%; height: 140px;">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h2><i class="icon-user-follow"></i></h2>
                        <h3 class="text-muted">Reporte de conductores EasyTaxis del mes </h3>
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
                 <div class="progress-bar bg-warning progress-bar-striped" role="progressbar" style="width: <?php echo intval($b) ?>%; height:35px;" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"> <?php echo intval($b) ?>%</div>
            </div>
        </div>
        <a href="conductoreseasy" class="small-box-footer">
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
                        <h3 class="text-muted">Reporte de conductores EasyTaxis</h3>
                    </div>
                    <div class="ml-auto">
                        <h2 class="counter text-info"><?php echo number_format($easy); ?></h2>
                        <?php
                         $etx = ($e *100)/20000;
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="progress">
                    <div class="progress-bar bg-info" role="progressbar" style="width:<?php echo intval($etx) ?>%; height: 25px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"> <?php echo intval($etx) ?>%</div>
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
                        <h3 class="text-muted">Reporte de conductores migrados del Mes <?php echo date('M-Y')  ?> de Cabify a EasyTaxi </h3>
                    </div>
                    <div class="ml-auto">
                        <h2 class="counter text-info"><?php echo number_format($migradosmes); ?></h2>
                        <?php
                         $easy = $acteasy;
                         $cbf = ($c *100)/20000;
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="progress">
                    <div class="progress-bar bg-info" role="progressbar" style="width:<?php echo intval($migradosmes) ?>%; height: 25px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"> <?php echo intval($migradosmes) ?></div>
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
                        <h3 class="text-muted">Reporte de conductores Actualizado EasyTaxis mes anterior</h3>
                    </div>
                    <div class="ml-auto">
                        <h2 class="counter text-info"><?php echo number_format($acteasymes); ?></h2>
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