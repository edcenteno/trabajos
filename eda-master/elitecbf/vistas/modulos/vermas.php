<?php 
    
    $idconductor = $_GET['idconductor'];
    $item = null;
    $valor = null;

    $unconductor = ControladorConductor::ctrMostrarunConductor($item, $valor, $idconductor);
    //var_dump($unconductor); 
    foreach ($unconductor as $key => $value){

    if ($value['blacklist'] == 0) {
      $bl="No se encuentra en lista negra";
    } else {
      $bl="Si se encuentra en lista negra";
    }
$placa=$value['placa'];
?>

<script type="text/javascript">
    
    var dni = '<?php echo $idconductor ?>'
    var placa = '<?php echo $placa ?>'

    $.ajax({
    type: "GET",
    url: 'https://captcharh.ddns.net/api/record/principal/'+ dni
    
    }).done(function(msg){
        //$("#resultado").html(msg);
        console.log(msg)
        //
        $('.licencia')[0].innerText = msg['var_direccion'];
        $('.licencia')[1].innerText = msg['var_departamento'];
        $('.licencia')[2].innerText = msg['var_distrito'];
        $('.licencia')[3].innerText = msg['var_estado_licencia'];
        $('.licencia')[4].innerText = msg['dat_fecha_expedicion'];
        $('.licencia')[5].innerText = msg['dat_fecha_revalidacion'];
        $('.licencia')[6].innerText = msg['num_cod_administrado'];
        $('.licencia')[7].innerText = msg['var_num_licencia'];
        $('.licencia')[8].innerText = msg['var_restricciones1'];
        $('.licencia')[9].innerText = msg['var_restricciones2'];

        

    });

    $.ajax({
    type: "GET",
    url: 'https://captcharh.ddns.net/api/record/multas/'+ dni
    
    }).done(function(msg){
        //$("#resultado").html(msg);
        console.log(msg)

        $('.multas')[0].innerText = msg[0]['dat_fecha_firme'];
        $('.multas')[1].innerText = msg[0]['dat_fecha_papeleta'];
        $('.multas')[2].innerText = msg[0]['dat_fecha_registro'];
        $('.multas')[3].innerText = msg[0]['falta'];
        $('.multas')[4].innerText = msg[0]['fec_infraccion'];
        $('.multas')[5].innerText = msg[0]['papeleta'];
        $('.multas')[6].innerText = msg[0]['str_entidad'];
        $('.multas')[7].innerText = msg[0]['str_estado'];
        $('.multas')[8].innerText = msg[0]['str_fec_firme'];

    });

    
    $.ajax({
    type: "GET",
    url: 'https://captcharh.ddns.net/api/record/placa/'+placa
    
    }).done(function(msg){
        //$("#resultado").html(msg);
        console.log(msg)
        $('.vehiculo')[0].innerText = msg['Vin']['continent']; //msg.vin.co
    
    });

</script>
<div class="container-fluid">

    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Información del Conductor</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Conductores</a></li>
                    <li class="breadcrumb-item active">Ver+</li>
                </ol>
                
            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- Row -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-2 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body">
                    <center class="m-t-30"> 
                        <?php
                        if ($value['foto'] == "") {
                            echo '<img src="vistas/img/conductores/conductor.png" class="img-circle" width="150" />';
                        } else {
                            echo '<img src="vistas/img/conductores/'.$value['foto'].'" class="img-circle" width="150" />';
                        }
                        
                        ?>
                        <h4 class="card-title m-t-10"><?php echo $value['nombre'] ." " . $value['apellido']; ?></h4>
                        <h5 class="card-subtitle">DNI <?php echo $value['dni']; ?></h5>
                        <h6 class="card-subtitle">Conductor</h6>
                        <div class="row text-center justify-content-md-center">
                           <!--  <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium">254</font></a></div>
                           <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i> <font class="font-medium">54</font></a></div> -->
                        </div>
                    </center>
                </div>
                <!-- <div>
                    <hr> </div> -->
                <!-- <div class="card-body"> <small class="text-muted">Email address </small>
                    <h6>hannagover@gmail.com</h6> <small class="text-muted p-t-30 db">Phone</small>
                    <h6>+91 654 784 547</h6> <small class="text-muted p-t-30 db">Address</small>
                    <h6>71 Pilgrim Avenue Chevy Chase, MD 20815</h6>
                    <div class="map-box">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d470029.1604841957!2d72.29955005258641!3d23.019996818380896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e848aba5bd449%3A0x4fcedd11614f6516!2sAhmedabad%2C+Gujarat!5e0!3m2!1sen!2sin!4v1493204785508" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div> <small class="text-muted p-t-30 db">Social Profile</small>
                    <br/>
                    <button class="btn btn-circle btn-secondary"><i class="fa fa-facebook"></i></button>
                    <button class="btn btn-circle btn-secondary"><i class="fa fa-twitter"></i></button>
                    <button class="btn btn-circle btn-secondary"><i class="fa fa-youtube"></i></button>
                </div> -->
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-10 col-xlg-9 col-md-7">
            <div class="card">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs profile-tab" role="tablist">
                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#datosperso" role="tab"><i class="ti-user"></i> DNI-Datos Personales</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#antecedentes" role="tab"><i class="icon-docs"></i> Antecedentes</a> </li>
                    <!-- <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#soat" role="tab"><i class="ti-id-badge"></i> SOAT</a> </li> 
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#resultado" role="tab"><i class="ti-id-badge"></i> Resultados</a> </li>-->
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#lice" role="tab"><i class="ti-car"></i> Licencia de Conducir</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#datosveh" role="tab"><i class="ti-car"></i> Datos del Vehiculo</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#soat" role="tab"><i class="ti-id-badge"></i> SOAT</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#resultado" role="tab"><i class="ti-id-badge"></i> Resultados</a> </li>
                    <li class="nav-item"> <a class="nav-link btnreporte"  href="extensiones/tcpdf/pdf/reporte.php?idconductor='.$idconductor.'" target="_blank" role="tab"><i class="ti-download"></i> PDF</a> </li>
                               
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="datosperso" role="tabpanel">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2 col-xs-6 b-r"> <strong>Nombres</strong>
                                    <br>
                                    <p class="text-muted"><?php echo $value['nombre']; ?></p>
                                </div>
                                <div class="col-md-2 col-xs-6 b-r"> <strong>Apellidos</strong>
                                    <br>
                                    <p class="text-muted"><?php echo $value['apellido']; ?></p>
                                </div>
                                <div class="col-md-2 col-xs-6 b-r"> <strong>DNI</strong>
                                    <br>
                                    <p class="text-muted"><?php echo $value['dni']; ?></p>
                                </div>
                                <div class="col-md-2 col-xs-6 b-r"> <strong>Fecha de Nacimiento</strong>
                                    <br>
                                    <p class="text-muted"><?php echo $fechanac = $value['fecha_nacimiento']; ?></p>
                                </div>
                                <div class="col-md-2 col-xs-6"> <strong>Edad</strong>
                                    <br>
                                    <p class="text-muted">
                                        <?php  $rest = substr("$fechanac", 6); 
                                               $fecha = date('Y');
                                               $edad = $fecha-$rest;

                                             if ($edad == $fecha) {
                                                 # code...
                                             }else{
                                                echo $edad;
                                             }
                                        ?></p>
                                </div>
                                <div class="col-md-2 col-xs-6"> <strong>Empresa</strong>
                                    <br>
                                    <p class="text-muted">
                                        <?php 
                                            $cbf = $value['cabify'];
                                            $easy = $value['easytaxi'];

                                            if ($cbf == 1) {
                                                echo 'Cabify &nbsp&nbsp   <img width="30" src="vistas/img/plantilla/favicon.ico">';
                                            } 

                                            if($easy == 1){
                                                echo '<br>EasyTaxi <img width="30" src="vistas/img/plantilla/easy.png">';
                                            }

                                        ?>
                                    </p>
                                </div>
                               
                            </div>

                            <hr>
                             <div class="row">
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Direccion</strong>
                                    <br>
                                    <p class="text-muted licencia"></p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Departamento</strong>
                                    <br>
                                    <p class="text-muted licencia"></p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Distrito</strong>
                                    <br>
                                    <p class="text-muted licencia"></p>
                                </div>
                            </div>
                           
                            
                        </div>
                        
                    </div>
                    <!--second tab-->
                    <div class="tab-pane" id="antecedentes" role="tabpanel">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Antecedentes Penales</strong>
                                    <br>
                                    <p class="text-muted"><?php echo $value['ant_penales']; ?></p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Antecedentes Judiciales</strong>
                                    <br>
                                    <p class="text-muted"><?php echo $value['ant_judicial']; ?></p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Antecedentes Policiales</strong>
                                    <br>
                                    <p class="text-muted"><?php echo $value['ant_policial']; ?></p>
                                </div>
                                <div class="col-md-2 col-xs-6"> <strong>Observación</strong>
                                    <br>
                                    <p class="text-muted"><?php echo $value['observacion']; ?></p>
                                </div>
                            </div>

                                <hr>
                            <div class="row">
                                <div class="col-md-3 col-xs-6"> <strong>Lista Negra</strong>
                                    <br>
                                    <p class="text-muted"><?php echo $bl; ?></p>
                                </div>
                           
                            </div>
                         </div>
                    </div>

                    <div class="tab-pane" id="resultado"  role="tabpanel">
                        <div class="card-body">
                            <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12" style="width: 105%; height: 40px;">
                                        <div class="d-flex no-block align-items-center">
                                            <div>
                                                <h2><i class="icon-trophy"></i></h2>
                                                <h3 class="text-muted">Record del conductor</h3>
                                            </div>
                                            <div class="ml-auto">
                                                <?php
                                                if ($value['record_cond'] <= "55") {
                                                    echo '<h2 class="counter text-success">'.$value['record_cond'].'%</h2>';
                                                } else {
                                                   echo '<h2 class="counter text-danger">'.$value['record_cond'].'%</h2>';
                                                }
                                            ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12" style="width: 105%; height: 40px;">
                                        <div class="d-flex no-block align-items-center">
                                            <div>
                                                <?php
                                                 if ($value['resultado'] == "APTO") {
                                                    echo '<h2><i class="icon-user-following"></i></h2>';
                                                }else{
                                                    echo '<h2><i class="icon-user-unfollow"></i></h2>';
                                                }
                                                ?>
                                                <h3 class="text-muted">Resultado</h3>
                                            </div>
                                            <div class="ml-auto">
                                                <?php
                                                    if ($value['resultado'] == "APTO") {
                                                        echo '
                                                        <h2 class="counter text-success">'.$value['resultado'].'</h2>';
                                                    }else{
                                                        echo '
                                                        <h2 class="counter text-danger">'.$value['resultado'].'</h2>';
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                    <div class="tab-pane" id="datosveh" role="tabpanel">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Placa</strong>
                                    <br>
                                    <p class="text-muted"><?php echo $value['placa']; ?></p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Marca</strong>
                                    <br>
                                    <p class="text-muted">marca<?php /*echo $value['ant_judicial'];*/ ?></p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Modelo</strong>
                                    <br>
                                    <p class="text-muted">modelo<?php //echo $value['ant_policial']; ?></p>
                                </div>
                                <div class="col-md-3 col-xs-6"> <strong>Año</strong>
                                    <br>
                                    <p class="text-muted">año<?php //echo $value['observacion']; ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Nro. Serie </strong>
                                    <br>
                                    <p class="text-muted">Nro Serie <?php //echo $value['placa']; ?></p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Placa Anterior</strong>
                                    <br>
                                    <p class="text-muted">Placa Anterior<?php /*echo $value['ant_judicial'];*/ ?></p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Fecha Entrega</strong>
                                    <br>
                                    <p class="text-muted">Fecha Entrega<?php //echo $value['ant_policial']; ?></p>
                                </div>
                                <div class="col-md-3 col-xs-6"> <strong>Propietario</strong>
                                    <br>
                                    <p class="text-muted">Propietario<?php //echo $value['observacion']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="soat" role="tabpanel">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Estado</strong>
                                    <br>
                                    <p class="text-muted"><?php echo $value['soat']; ?></p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Fecha de inicio</strong>
                                    <br>
                                    <p class="text-muted"><?php echo $value['fecha_inicio_soat']; ?></p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Fecha de fin</strong>
                                    <br>
                                    <p class="text-muted"><?php echo $value['fecha_fin_soat']; ?></p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Compañia Aseguradora</strong>
                                    <br>
                                    <p class="text-muted"><?php echo $value['nombrecompania']; ?></p>
                                </div>
                                
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Orden de Captura</strong>
                                    <br>
                                    <p class="text-muted"><?php echo $value['orden_captura']; ?></p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Numero de Poliza</strong>
                                    <br>
                                    <p class="text-muted"><?php echo $value['numeropoliza']; ?></p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Nombre de Clase de Vehiculo</strong>
                                    <br>
                                    <p class="text-muted"><?php echo $value['nombreclasevehiculo']; ?></p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Nombre Uso Vehiculo</strong>
                                    <br>
                                    <p class="text-muted"><?php echo $value['NombreUsoVehiculo']; ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Fecha Control Policial</strong>
                                    <br>
                                    <p class="text-muted"><?php echo $value['fechacontrolpolicial']; ?></p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Tipo de Certificado</strong>
                                    <br>
                                    <p class="text-muted"><?php echo $value['TipoCertificado']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="lice" role="tabpanel">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Estado</strong>
                                    <br>
                                    <p class="text-muted licencia ">var_estado_licencia</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>dat_fecha_expedicion</strong>
                                    <br>
                                    <p class="text-muted licencia">dat_fecha_expedicion</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>dat_fecha_revalidacion</strong>
                                    <br>
                                    <p class="text-muted licencia">dat_fecha_revalidacion</p>
                                </div>
                            </div>
                            <hr>
                             <div class="row">
                                <div class="col-md-3 col-xs-6 b-r"> <strong>num_cod_administrado</strong>
                                    <br>
                                    <p class="text-muted licencia">num_cod_administrado</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>var_num_licencia</strong>
                                    <br>
                                    <p class="text-muted licencia">var_num_licencia</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>var_restricciones1</strong>
                                    <br>
                                    <p class="text-muted licencia">var_restricciones1</p>
                                </div>
                            </div>
                            <hr>
                            <b><font color="#fb9678">Multas</font></b>
                            <hr>
                             <div class="row">
                                <div class="col-md-3 col-xs-6 b-r"> <strong>dat_fecha_firme</strong>
                                    <br>
                                    <p class="text-muted multas">dat_fecha_firme</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>dat_fecha_papeleta</strong>
                                    <br>
                                    <p class="text-muted multas">dat_fecha_papeleta</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>dat_fecha_registrofalta</strong>
                                    <br>
                                    <p class="text-muted multas">dat_fecha_registro</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>dat_fecha_registrofalta</strong>
                                    <br>
                                    <p class="text-muted multas">dat_fecha_registrofalta</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3 col-xs-6 b-r"> <strong>fec_infraccionpapeletas</strong>
                                    <br>
                                    <p class="text-muted multas">fec_infraccionpapeletas</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>tr_entidadstr_estados</strong>
                                    <br>
                                    <p class="text-muted multas">tr_entidadstr_estados</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>tr_fec_firmes</strong>
                                    <br>
                                    <p class="text-muted multas">tr_fec_firmes</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>tr_fec_firmes</strong>
                                    <br>
                                    <p class="text-muted multas">tr_fec_firmes</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>tr_fec_firmes</strong>
                                    <br>
                                    <p class="text-muted multas">tr_fec_firmes</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
<!-- Column -->
    </div>
    <!-- Row -->
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
   
</div>

</div>

<?php
}
?>

