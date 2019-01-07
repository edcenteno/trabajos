<?php
$mesatras = date("Y-m",strtotime($fecha_actual."- 1 month"));

$totalConductores =ModeloConductor::count([
                                  'fecha' => new MongoRegex("/$mesatras/")
                                ]);

$cabify = ModeloConductor::count([
                                'cabify'=>'1',
                                'fecha' => new MongoRegex("/$mesatras/")
                                ]);

$easy = ModeloConductor::count([
                                'easytaxi'=>'1',
                                'fecha' => new MongoRegex("/$mesatras/")
                                ]);

$actcabify = ModeloConductor::count([
                                  'cabify'=>'1',
                                  'fecha_act' => new MongoRegex("/$mesatras/")
                                ]);

$cabifycallcenter = ModeloConductor::count([
                                'cabify'=>'1',
                                'id_provincia'=>'11',
                                'fecha' => new MongoRegex("/$mesatras/")
                                ]);


$acteasy = ModeloConductor::count([
                                  'easytaxi'=>'1',
                                  'fecha_act' => new MongoRegex("/$mesatras/")
                                ]);

$easyarequipa = ModeloConductor::count([
                                'easytaxi'=>'1',
                                'id_provincia'=>'1',
                                'fecha' => new MongoRegex("/$mesatras/")
                                ]);
$easychiclayo = ModeloConductor::count([
                                'easytaxi'=>'1',
                                'id_provincia'=>'2',
                                'fecha' => new MongoRegex("/$mesatras/")
                                ]);
$easycusco = ModeloConductor::count([
                                'easytaxi'=>'1',
                                'id_provincia'=>'3',
                                'fecha' => new MongoRegex("/$mesatras/")
                                ]);
$easylima1 = ModeloConductor::count([
                                'easytaxi'=>'1',
                                'id_provincia'=>'8',
                                'fecha' => new MongoRegex("/$mesatras/")
                                ]);
$easylima2 = ModeloConductor::count([
                                'easytaxi'=>'1',
                                'id_provincia'=>'9',
                                'fecha' => new MongoRegex("/$mesatras/")
                                ]);
$easypiura = ModeloConductor::count([
                                'easytaxi'=>'1',
                                'id_provincia'=>'5',
                                'fecha' => new MongoRegex("/$mesatras/")
                                ]);
$easytrujillo = ModeloConductor::count([
                                'easytaxi'=>'1',
                                'id_provincia'=>'6',
                                'fecha' => new MongoRegex("/$mesatras/")
                                ]);
$easyapp = ModeloConductor::count([
                                'easytaxi'=>'1',
                                'id_provincia'=>'7',
                                'fecha' => new MongoRegex("/$mesatras/")
                                ]);
$easycallcenter = ModeloConductor::count([
                                'easytaxi'=>'1',
                                'id_provincia'=>'11',
                                'fecha' => new MongoRegex("/$mesatras/")
                                ]);


$acteasyarequipa = ModeloConductor::count([
                                'easytaxi'=>'1',
                                'id_provincia'=>'1',
                                'fecha_act' => new MongoRegex("/$mesatras/")
                                ]);
$acteasychiclayo = ModeloConductor::count([
                                'easytaxi'=>'1',
                                'id_provincia'=>'2',
                                'fecha_act' => new MongoRegex("/$mesatras/")
                                ]);
$acteasycusco = ModeloConductor::count([
                                'easytaxi'=>'1',
                                'id_provincia'=>'3',
                                'fecha_act' => new MongoRegex("/$mesatras/")
                                ]);
$acteasylima1 = ModeloConductor::count([
                                'easytaxi'=>'1',
                                'id_provincia'=>'8',
                                'fecha_act' => new MongoRegex("/$mesatras/")
                                ]);
$acteasylima2 = ModeloConductor::count([
                                'easytaxi'=>'1',
                                'id_provincia'=>'9',
                                'fecha_act' => new MongoRegex("/$mesatras/")
                                ]);
$acteasypiura = ModeloConductor::count([
                                'easytaxi'=>'1',
                                'id_provincia'=>'5',
                                'fecha_act' => new MongoRegex("/$mesatras/")
                                ]);
$acteasytrujillo = ModeloConductor::count([
                                'easytaxi'=>'1',
                                'id_provincia'=>'6',
                                'fecha_act' => new MongoRegex("/$mesatras/")
                                ]);
$acteasyapp = ModeloConductor::count([
                                'easytaxi'=>'1',
                                'id_provincia'=>'7',
                                'fecha_act' => new MongoRegex("/$mesatras/")
                                ]);
$acteasycallcenter = ModeloConductor::count([
                                'easytaxi'=>'1',
                                'id_provincia'=>'11',
                                'fecha_act' => new MongoRegex("/$mesatras/")
                                ]);
$conjunto = ModeloConductor::count([
                                'easytaxi'=>'1',
                                'cabify'=>'1',
                                'fecha_act' => new MongoRegex("/$mesatras/")
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
                        <h3 class="text-muted">TOTAL de consultas realizadas del mes Anterior </h3>
                    </div>
                    <div class="ml-auto">
                        <h2 class="counter text-info"><?php echo $totalConductores ?></h2>
                    </div><br>

                </div>
            </div>

    </div>
</div>
</div>


<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12" style="width: 85%; height: 140px;">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h2><i class="icon-user-follow"></i></h2>
                        <h3 class="text-muted">Reporte de consultas realizadas CABIFY</h3>
                    </div>
                    <div class="ml-auto">
                        <h2 class="counter text-danger"><?php echo $cabify ?></h2>
                    </div><br>

                </div>
            </div>

    </div>
</div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12" style="width: 85%; height: 140px;">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h2><i class="icon-user-follow"></i></h2>
                        <h3 class="text-muted">Reporte de consultas ACTUALIZADAS CABIFY</h3>
                    </div>
                    <div class="ml-auto">
                        <h2 class="counter text-danger"><?php echo $actcabify ?></h2>
                    </div><br>

                </div>
            </div>

    </div>
</div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12" style="width: 85%; height: 140px;">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h2><i class="icon-user-follow"></i></h2>
                        <h3 class="text-muted">Reporte de consultas consultas realizadas CABIFY CALLCENTER</h3>
                    </div>
                    <div class="ml-auto">
                        <h2 class="counter text-danger"><?php echo $cabifycallcenter ?></h2>
                    </div><br>

                </div>
            </div>

    </div>
</div>
</div>


<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12" style="width: 85%; height: 140px;">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h2><i class="icon-user-follow"></i></h2>
                        <h3 class="text-muted">Reporte de consultas realizadas EASYTAXI</h3>
                    </div>
                    <div class="ml-auto">
                        <h2 class="counter text-warning"><?php echo $easy ?></h2>
                    </div><br>

                </div>
            </div>

    </div>
</div>
</div>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12" style="width: 85%; height: 140px;">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h2><i class="icon-user-follow"></i></h2>
                        <h3 class="text-muted">Reporte de consultas ACTUALIZADAS EASYTAXI</h3>
                    </div>
                    <div class="ml-auto">
                        <h2 class="counter text-warning"><?php echo $acteasy ?></h2>
                    </div><br>

                </div>
            </div>

    </div>
</div>
</div>


<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12" style="width: 85%; height: 140px;">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h2><i class="icon-user-follow"></i></h2>
                        <h3 class="text-muted">Reporte de consultas realizadas EASYTAXI AREQUIPA</h3>
                    </div>
                    <div class="ml-auto">
                        <h2 class="counter text-success"><?php echo $easyarequipa ?></h2>
                    </div><br>

                </div>
            </div>

    </div>
</div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12" style="width: 85%; height: 140px;">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h2><i class="icon-user-follow"></i></h2>
                        <h3 class="text-muted">Reporte de consultas realizadas EASYTAXI CHICLAYO</h3>
                    </div>
                    <div class="ml-auto">
                        <h2 class="counter text-success"><?php echo $easychiclayo ?></h2>
                    </div><br>

                </div>
            </div>

    </div>
</div>
</div>


<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12" style="width: 85%; height: 140px;">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h2><i class="icon-user-follow"></i></h2>
                        <h3 class="text-muted">Reporte de consultas realizadas EASYTAXI CUSCO</h3>
                    </div>
                    <div class="ml-auto">
                        <h2 class="counter text-success"><?php echo $easycusco ?></h2>
                    </div><br>

                </div>
            </div>

    </div>
</div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12" style="width: 85%; height: 140px;">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h2><i class="icon-user-follow"></i></h2>
                        <h3 class="text-muted">Reporte de consultas realizadas EASYTAXI LIMA 1</h3>
                    </div>
                    <div class="ml-auto">
                        <h2 class="counter text-success"><?php echo $easylima1 ?></h2>
                    </div><br>

                </div>
            </div>

    </div>
</div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12" style="width: 85%; height: 140px;">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h2><i class="icon-user-follow"></i></h2>
                        <h3 class="text-muted">Reporte de consultas realizadas EASYTAXI LIMA 2</h3>
                    </div>
                    <div class="ml-auto">
                        <h2 class="counter text-success"><?php echo $easylima2 ?></h2>
                    </div><br>

                </div>
            </div>

    </div>
</div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12" style="width: 85%; height: 140px;">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h2><i class="icon-user-follow"></i></h2>
                        <h3 class="text-muted">Reporte de consultas realizadas EASYTAXI PIURA</h3>
                    </div>
                    <div class="ml-auto">
                        <h2 class="counter text-success"><?php echo $easypiura ?></h2>
                    </div><br>

                </div>
            </div>

    </div>
</div>
</div>


<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12" style="width: 85%; height: 140px;">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h2><i class="icon-user-follow"></i></h2>
                        <h3 class="text-muted">Reporte de consultas realizadas EASYTAXI TRUJILLO</h3>
                    </div>
                    <div class="ml-auto">
                        <h2 class="counter text-success"><?php echo $easytrujillo ?></h2>
                    </div><br>

                </div>
            </div>

    </div>
</div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12" style="width: 85%; height: 140px;">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h2><i class="icon-user-follow"></i></h2>
                        <h3 class="text-muted">Reporte de consultas realizadas EASYTAXI APP</h3>
                    </div>
                    <div class="ml-auto">
                        <h2 class="counter text-success"><?php echo $easyapp ?></h2>
                    </div><br>

                </div>
            </div>

    </div>
</div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12" style="width: 85%; height: 140px;">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h2><i class="icon-user-follow"></i></h2>
                        <h3 class="text-muted">Reporte de consultas realizadas EASYTAXI CALLCENTER</h3>
                    </div>
                    <div class="ml-auto">
                        <h2 class="counter text-success"><?php echo $easycallcenter ?></h2>
                    </div><br>

                </div>
            </div>

    </div>
</div>
</div>




<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12" style="width: 85%; height: 140px;">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h2><i class="icon-user-follow"></i></h2>
                        <h3 class="text-muted">Reporte de consultas ACTUALIZADAS EASYTAXI AREQUIPA</h3>
                    </div>
                    <div class="ml-auto">
                        <h2 class="counter text-primary"><?php echo $acteasyarequipa ?></h2>
                    </div><br>

                </div>
            </div>

    </div>
</div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12" style="width: 85%; height: 140px;">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h2><i class="icon-user-follow"></i></h2>
                        <h3 class="text-muted">Reporte de consultas ACTUALIZADAS EASYTAXI CHICLAYO</h3>
                    </div>
                    <div class="ml-auto">
                        <h2 class="counter text-primary"><?php echo $acteasychiclayo ?></h2>
                    </div><br>

                </div>
            </div>

    </div>
</div>
</div>


<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12" style="width: 85%; height: 140px;">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h2><i class="icon-user-follow"></i></h2>
                        <h3 class="text-muted">Reporte de consultas ACTUALIZADAS EASYTAXI CUSCO</h3>
                    </div>
                    <div class="ml-auto">
                        <h2 class="counter text-primary"><?php echo $acteasycusco ?></h2>
                    </div><br>

                </div>
            </div>

    </div>
</div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12" style="width: 85%; height: 140px;">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h2><i class="icon-user-follow"></i></h2>
                        <h3 class="text-muted">Reporte de consultas ACTUALIZADAS EASYTAXI LIMA 1</h3>
                    </div>
                    <div class="ml-auto">
                        <h2 class="counter text-primary"><?php echo $acteasylima1 ?></h2>
                    </div><br>

                </div>
            </div>

    </div>
</div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12" style="width: 85%; height: 140px;">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h2><i class="icon-user-follow"></i></h2>
                        <h3 class="text-muted">Reporte de consultas ACTUALIZADAS EASYTAXI LIMA 2</h3>
                    </div>
                    <div class="ml-auto">
                        <h2 class="counter text-primary"><?php echo $acteasylima2 ?></h2>
                    </div><br>

                </div>
            </div>

    </div>
</div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12" style="width: 85%; height: 140px;">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h2><i class="icon-user-follow"></i></h2>
                        <h3 class="text-muted">Reporte de consultas ACTUALIZADAS EASYTAXI PIURA</h3>
                    </div>
                    <div class="ml-auto">
                        <h2 class="counter text-primary"><?php echo $acteasypiura ?></h2>
                    </div><br>

                </div>
            </div>

    </div>
</div>
</div>


<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12" style="width: 85%; height: 140px;">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h2><i class="icon-user-follow"></i></h2>
                        <h3 class="text-muted">Reporte de consultas ACTUALIZADAS EASYTAXI TRUJILLO</h3>
                    </div>
                    <div class="ml-auto">
                        <h2 class="counter text-primary"><?php echo $acteasytrujillo ?></h2>
                    </div><br>

                </div>
            </div>

    </div>
</div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12" style="width: 85%; height: 140px;">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h2><i class="icon-user-follow"></i></h2>
                        <h3 class="text-muted">Reporte de consultas ACTUALIZADAS EASYTAXI APP</h3>
                    </div>
                    <div class="ml-auto">
                        <h2 class="counter text-primary"><?php echo $acteasyapp ?></h2>
                    </div><br>

                </div>
            </div>

    </div>
</div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12" style="width: 85%; height: 140px;">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h2><i class="icon-user-follow"></i></h2>
                        <h3 class="text-muted">Reporte de consultas ACTUALIZADAS EASYTAXI CALLCENTER</h3>
                    </div>
                    <div class="ml-auto">
                        <h2 class="counter text-primary"><?php echo $acteasycallcenter ?></h2>
                    </div><br>

                </div>
            </div>

    </div>
</div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12" style="width: 85%; height: 140px;">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h2><i class="icon-user-follow"></i></h2>
                        <h3 class="text-muted">Reporte de consultas TOTAL EN CONJUNTO EASYTAXI & CABIFY</h3>
                    </div>
                    <div class="ml-auto">
                        <h2 class="counter text-info"><?php echo $conjunto ?></h2>
                    </div><br>

                </div>
            </div>

    </div>
</div>
</div>
