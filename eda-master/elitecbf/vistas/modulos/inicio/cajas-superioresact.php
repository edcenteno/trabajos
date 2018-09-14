<?php
require 'conexion.php';
$sql="SELECT SUM(act) as sumaact FROM conductores";
    $result=mysqli_query($conexion,$sql);
    while($row = $result->fetch_array(MYSQLI_ASSOC)){
      $rows[] = $row;
    }
    foreach ($rows as $key => $value) {
        $suma = $value['sumaact'];
    }
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
                        <h2 class="counter text-info"><?php echo $suma -15 ?></h2>
                    </div><br>

                </div>
            </div>
    </div>
</div>
</div>
