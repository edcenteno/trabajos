<?php

$item = "fecha";
$valor = date('Y-m');
$fecha_actual = date("Y-m-d");

$valor2 = date("Y-m",strtotime($fecha_actual."- 1 month"));

//$ventas = ControladorVentas::ctrSumaTotalVentas();
$ruc=$_SESSION['empresa'];

$totalPersonas = ControladorPersonas::ctrMostrarPersonashoy($item, $valor,$ruc);
$totalPersonas2 = ControladorPersonas::ctrMostrarPersonasMes($item, $valor2,$ruc);


?>



<div class="col-sm-6 col-xl-3">
                <div class="card bg-dpink text-white widget-media-bordered">
                    <div class="card-body">
                        <div class="media py-3 align-items-center media-colored">
                            <img class="mr-3" src="vistas/assets/images/icons/55.png" alt="">
                            <div class="media-body">
                                <p class=" mb-1">Reporte de consultas del mes <?php echo date('M-Y');?></p>
                                <h2 class="text-white m-0"><?php echo $totalPersonas;?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card widget-media-bordered">
                    <div class="card-body">
                        <div class="media py-3 align-items-center">
                            <img class="mr-3" src="vistas/assets/images/icons/56.png" alt="">
                            <div class="media-body">
                                <p class="text-pale-sky mb-1">Reporte de consultas mes <?php echo date("M-Y",strtotime($fecha_actual."- 1 month"));?></p>
                                <h2 class="text-dpink m-0"><?php echo $totalPersonas2;?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card bg-lgreen text-white widget-media-bordered">
                    <div class="card-body">
                        <div class="media py-3 align-items-center media-colored">
                            <img class="mr-3" src="vistas/assets/images/icons/57.png" alt="">
                            <div class="media-body">
                                <p class=" mb-1">Reporte de consultas del mes <?php echo date('M-Y');?></p>
                                <h2 class="text-white m-0">55250</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card widget-media-bordered">
                    <div class="card-body">
                        <div class="media py-3 align-items-center">
                            <img class="mr-3" src="vistas/assets/images/icons/58.png" alt="">
                            <div class="media-body">
                                <p class="text-pale-sky mb-1">Reporte de consultas del mes <?php echo date('M-Y');?></p>
                                <h2 class="text-lgreen m-0">250</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>