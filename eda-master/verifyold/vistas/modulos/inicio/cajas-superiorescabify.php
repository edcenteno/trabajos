<?php
$mes = date('Y-m');
$mesact = date("Y-m",strtotime($mes."- 1 month"));

//$ventas = ControladorVentas::ctrSumaTotalVentas();


$totalClientes = ModeloConductor::count([
                                  'cabify'=>'1',
                                  'fecha' => new MongoRegex("/$mes/")
                                ]);

$cabify = ModeloConductor::count([
                                  'cabify'=>'1'
                                ]);

$actcbf = ModeloConductor::count([
                                  'cabify'=>'1',
                                  'fecha' => new MongoRegex("/$mes/")
                                ]);


$migradosmes =  ModeloConductor::count([
                                  'migrarcabf'=>'1',
                                  'fechamigra' => new MongoRegex("/$mes/")
                                ]);


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
                        <h2 class="counter text-purple"><?php echo $totalClientes ?></h2>
                    </div><br>
                    <?php
                    $totalClientes = str_replace(',','',$a);
                     $b = ($totalClientes *100)/2500;
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
                         $ac = str_replace(',','',$cabify);
                         $cbf = ($ac *100)/20000;
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