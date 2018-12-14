<?php
$consulta="SELECT SUM(act) as sumaact FROM conductores WHERE act >0";
$resultado=$con -> query($consulta);
$fila=$resultado->fetch_assoc(); //que te devuelve un array asociativo con el nombre del campo

$TotalPrecios=$fila['sumaact']; //Este es el valor que acabas de calcular en la consulta
?>
408129

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
                        <h2 class="counter text-purple"><?php echo $cabify ?></h2>
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
                        <h2 class="counter text-info"><?php echo number_format($easy); ?></h2>
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
