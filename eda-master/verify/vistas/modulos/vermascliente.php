<?php

    $idcliente =$_GET['idcliente'];
    $item = "ruc";
    $valor = $idcliente;

    $uncliente = ControladorClientes::ctrMostrarClientes($item, $valor);

    foreach ($uncliente as $key => $value){

    echo $value['config'][1];
?>

 <div class="col p-md-0">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Empresas</a>
        </li>
        <li class="breadcrumb-item active">Cliente</li>
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
                        <img src="vistas/img/conductores/conductor.png" class="img-circle" width="100" height="100" />
                         <h4 class="card-title m-t-10"><?php echo $value['razon_social']; ?></h4>
                        <h5 class="card-subtitle">RUC <?php echo $value['ruc']; ?></h5>
                        <h6 class="card-subtitle">Cliente</h6>



                    </center>
                </div>

            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-10 col-xlg-9 col-md-7">
            <div class="card">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs profile-tab" role="tablist">
                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#datosperso" role="tab"><i class="ti-user"></i> RUC-Datos de la empresa</a> </li>
                    <!-- <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#antecedentes" role="tab"><i class="icon-docs"></i> Antecedentes</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#soat" role="tab"><i class="ti-id-badge"></i> SOAT</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#resultado" role="tab"><i class="ti-id-badge"></i> Resultados</a> </li> -->

                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="datosperso" role="tabpanel">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2 col-xs-6 b-r"> <strong>Representante legal</strong>
                                    <br>
                                    <p class="text-muted datosperso">
                                        <?php
                                        if ($value['representantes_legales'] != NULL) {
                                          $nombre= $value['representantes_legales']['r1']['nombre'];
                                        } else {
                                          $nombre= $value['razon_social'];
                                        }

                                            echo $nombre;
                                    ?></p>
                                </div>
                                <div class="col-md-2 col-xs-6 b-r"> <strong>Condicion</strong>
                                    <br>
                                    <p class="text-muted datosperso"><?php echo $value['condicion']; ?></p>
                                </div>
                                <div class="col-md-2 col-xs-6 b-r"> <strong>RUC</strong>
                                    <br>
                                    <p class="text-muted"><?php echo $value['ruc']; ?></p>
                                </div>
                                <div class="col-md-2 col-xs-6 b-r"> <strong>Fecha de Inscripcion</strong>
                                    <br>
                                    <p class="text-muted"><?php echo $fechanac = $value['fecha_inscripcion']; ?></p>
                                </div>
                                <div class="col-md-2 col-xs-6 b-r"> <strong>Años constituida</strong>
                                    <br>
                                    <p class="text-muted">
                                        <?php

                                        $rest = substr("$fechanac", 6);
                                               $fecha = date('Y');
                                               $edad = $fecha-$rest;

                                             if ($edad == $fecha) {
                                                 # code...
                                             }else{
                                                echo $edad;
                                             }
                                        ?></p>
                                </div>

                                <div class="col-md-2 col-xs-6 b-r"> <strong>Nombre de Empresa</strong>
                                    <br>
                                    <p class="text-muted"><?php echo $value['razon_social']; ?></p>
                                </div>

                            </div>

                            <hr>
                             <div class="row">
                                <div class="col-md-6 col-xs-6 b-r inf"> <strong>Direccion</strong>
                                    <br>
                                    <p class="text-muted"><?php echo $value['direccion']; ?></p>
                                </div>
                                <div class="col-md-2 col-xs-6 b-r inf"> <strong>Sistema contabilidad</strong>
                                    <br>
                                    <p class="text-muted"><?php echo $value['sistema_contabilidad']; ?></p>
                                </div>
                                <div class="col-md-2 col-xs-6 b-r inf"> <strong>RUC</strong>
                                    <br>
                                    <p class="text-muted"><?php echo $value['ruc']; ?></p>
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
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Antecedentes Penales</strong>
                                    <br>
                                    <p class="text-muted"><?php echo $value['observacionPenales']; ?></p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Antecedentes Judiciales</strong>
                                    <br>
                                    <p class="text-muted"><?php echo $value['observacionJudicial']; ?></p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Antecedentes Policiales</strong>
                                    <br>
                                    <p class="text-muted"><?php echo $value['observacionPolicial']; ?></p>
                                </div>
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
                                                <h2 class="counter"><?php echo $value['record_cond'];?></h2>
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
                                                    if ($value['ant_policial'] == "" || $value['ant_judicial'] == "" || $value['ant_penales'] == "" || $value['soat'] == "undefined") {

                                                    } else {
                                                       if ($value['resultado'] == "APTO") {
                                                        echo '
                                                        <h2 class="counter text-success">'.$value['resultado'].'</h2>';
                                                    }else{
                                                        echo '
                                                        <h2 class="counter text-danger">'.$value['resultado'].'</h2>';
                                                    }
                                                    }


                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <?php

                             if ($value['status_licencia'] != "VIGENTE" && $value['status_licencia'] != "VERIFICADO" && $value['status_licencia'] != "" && $value['status_licencia'] != "NULL") {
                            echo '
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12" style="width: 105%; height: 40px;">
                                                <div class="d-flex no-block align-items-center">
                                                    <div>
                                                        <h2><i class="icon-user-unfollow"></i></h2>

                                                        <h3 class="text-muted">Estado de Licencia</h3>
                                                    </div>
                                                    <div class="ml-auto">
                                                        <h2 class="counter text-danger">'.$value['status_licencia'].'</h2>
                                                         </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    ' ;
                                }/*else{
                                                        echo '
                                                        <h2 class="counter text-danger">'.$value['status_licencia'].'</h2>';
                                                    }*/



                                                ?>
                                           <!--  </div>
                                                                                   </div>
                                                                               </div>
                                                                           </div>
                                                                       </div>
                                                                   </div> -->


                    </div>
                </div>

                    <div class="tab-pane" id="datosveh" role="tabpanel">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Placa</strong>
                                    <br>
                                    <p class="text-muted"><?php echo $placa; ?></p>
                                </div>
                                <?php
                                    if ($color_vehiculo == "Placa no EXISTE") {
                                      echo' <div class="col-md-3 col-xs-6 b-r"> <strong>Placa</strong>
                                            <br>
                                            <p class="text-danger">Placa no EXISTE</p>
                                        </div>';
                                    }
                                    if ($color_vehiculo == "") {
                                      echo' <div class="col-md-3 col-xs-6 b-r"> <strong>Placa</strong>
                                            <br>
                                            <p class="text-success">EN PROCESO</p>
                                        </div>';
                                    }
                                    if ($color_vehiculo != "" && $color_vehiculo != "Placa no EXISTE") {
                                        echo '<div class="col-md-3 col-xs-6 b-r"> <strong>Marca</strong>
                                            <br>
                                            <p class="text-muted vehiculo"></p>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>Modelo</strong>
                                            <br>
                                            <p class="text-muted vehiculo"></p>
                                        </div>
                                        <div class="col-md-3 col-xs-6"> <strong>Año de Modelo</strong>
                                            <br>
                                            <p class="text-muted vehiculo"></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>Nro. Serie </strong>
                                            <br>
                                            <p class="text-muted vehiculo"></p>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>Placa Anterior</strong>
                                            <br>
                                            <p class="text-muted vehiculo"></p>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>Fecha Entrega</strong>
                                            <br>
                                            <p class="text-muted vehiculo"></p>
                                        </div>
                                        <div class="col-md-2 col-xs-6"> <strong>Propietario</strong>
                                            <br>
                                            <p class="text-muted vehiculo"></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>Estado</strong>
                                            <br>
                                            <p class="text-muted vehiculo"></p>
                                        </div>
                                        <!-- <div class="col-md-3 col-xs-6 b-r"> <strong>Punto de Entrega</strong>
                                            <br>
                                            <p class="text-muted vehiculo"></p>
                                        </div> -->
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>Tipo Uso</strong>
                                            <br>
                                            <p class="text-muted vehiculo"></p>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>Tipo de Sol</strong>
                                            <br>
                                            <p class="text-muted vehiculo"></p>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>Color de Vehiculo</strong>
                                            <br>
                                            <p class="text-muted">'.$value['color_vehiculo'].'</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>Continente</strong>
                                            <br>
                                            <p class="text-muted vehiculo"></p>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>País</strong>
                                            <br>
                                            <p class="text-muted vehiculo"></p>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>Fabrica</strong>
                                            <br>
                                            <p class="text-muted vehiculo"></p>
                                        </div>
                                        <div class="col-md-3 col-xs-6"> <strong>Números secuenciales</strong>
                                            <br>
                                            <p class="text-muted vehiculo"></p>
                                        </div>
                                    </div>
                                     <hr>
                                    <div class="row">
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>Clase</strong>
                                            <br>
                                            <p class="text-muted vehiculo"></p>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>Asientos</strong>
                                            <br>
                                            <p class="text-muted vehiculo"></p>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>Puertas</strong>
                                            <br>
                                            <p class="text-muted vehiculo"></p>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>Año de Fabricación</strong>
                                            <br>
                                            <p class="text-muted">'.$value['fecha_fab_veh'].'</p>
                                        </div>';
                                    }

                                ?>


                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="soat" role="tabpanel">
                        <div class="card-body">
                            <?php
                                if ($placa == "NINGUNO") {
                                 echo '<div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12" style="width: 105%; height: 40px;">
                                                        <div class="d-flex no-block align-items-center">
                                                            <div>
                                                                <h2><i class="icon-trophy"></i></h2>
                                                                <h3 class="text-muted"></h3>
                                                            </div>
                                                            <div class="ml-auto">
                                                                <h2 class="counter">NO POSEE VEHICULO</h2>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';
                                } else {
                                    # code...
                                }

                            ?>
                            <div class="row">
                                <?php
                            if ($value['soat']== "VIGENTE"){
                                echo '<div class="col-md-3 col-xs-6 b-r"> <strong>Estado</strong>
                                        <br>
                                        <p class="text-muted">'.$value['soat'].'</p>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>Fecha de inicio</strong>
                                            <br>
                                            <p class="text-muted">'.$value['fecha_inicio_soat'].'</p>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>Fecha de fin</strong>
                                            <br>
                                            <p class="text-muted">'.$value['fecha_fin_soat'].'</p>
                                        </div>';
                            }else{
                                echo '<div class="col-md-3 col-xs-6 b-r"> <strong>Estado</strong>
                                        <br>
                                        <p class="text-danger">'.$value['soat'].'</p>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>Fecha de inicio</strong>
                                            <br>
                                            <p class="text-danger">'.$value['fecha_inicio_soat'].'</p>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>Fecha de fin</strong>
                                            <br>
                                            <p class="text-danger">'.$value['fecha_fin_soat'].'</p>
                                        </div>';
                            }
                            ?>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Compañia Aseguradora</strong>
                                    <br>
                                    <p class="text-muted">
                                    <?php
                                    if ($value['nombrecompania']== "Mapfre PerÃº") {
                                        echo '<img width="90" src="vistas/img/plantilla/mapfre.png">';
                                    }

                                    if ($value['nombrecompania']== "Mapfre Perú") {
                                        echo '<img width="90" src="vistas/img/plantilla/mapfre.png">';
                                    }

                                    if ($value['nombrecompania']== "La Positiva") {
                                        echo '<img width="90" src="vistas/img/plantilla/lapositiva.png">';
                                    }
                                    if ($value['nombrecompania']== "Interseguro") {
                                        echo '<img width="90" src="vistas/img/plantilla/interbank.png">';
                                    }
                                    if ($value['nombrecompania']== "INTERSEGURO") {
                                        echo '<img width="90" src="vistas/img/plantilla/interbank.png">';
                                    }
                                    if ($value['nombrecompania']== "Pacifico Seguros") {
                                        echo '<img width="90" src="vistas/img/plantilla/pacifico.png">';
                                    }
                                    if ($value['nombrecompania']== "Rimac Seguros") {
                                        echo '<img width="90" src="vistas/img/plantilla/rimac.png">';
                                    }
                                    if ($value['nombrecompania']== "Bnp Paribas Cardif") {
                                        echo '<img width="90" src="vistas/img/plantilla/bnpparibascardif.png">';
                                    }


                                    if ($value['nombrecompania']== "Protecta") {
                                        echo '<img width="90" src="vistas/img/plantilla/protecta.png">';
                                    }

                                    ?></p>
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
                                <div class="col-md-2 col-xs-6"> <strong>Titular del SOAT</strong>
                              <!--  <h5 class="card-subtitle">Fecha de actualización '.$value['fecha_act'].'</h5> -->

                                    <br>
                                    <p class="text-muted vehiculo"></p>
                                </div>
                               <?php
                                $fecha_actual = date('d/m/Y');
                             //   echo $fecha_actual;
                               if ($value['soat'] == "VENCIDO" || $value['soat'] == "El vehiculo consultado no posee SOAT" || $value['fecha_inicio_soat'] == "" ||$value['soat'] == "undefined" ) {
                                    if ($value['ant_penales'] == "NEGATIVO" && $value['ant_policial'] == "NEGATIVO" && $value['ant_policial'] == "NEGATIVO") {
                                       echo '<div class="col-md-2 col-xs-6"> <strong>Actualizar SOAT</strong>
                                                <br>
                                                <button class="btn btn-info" onclick="actualizarsoats()">Actualizar</button>
                                            </div>';
                                    }
                                }
                               ?>
                            </div>
                            <!-- <button class="btn btn-info" onclick="actualizarsoats()">Actualizar</button> -->
                        </div>
                    </div>

                    <script>
                            function actualizarsoats(){

                                        placa = '<?php echo $placa ?>'
                                        type= '<?php echo $extr ?>'
                                        dni = '<?php echo $idconductor ?>'
                                        cabify= '<?php echo $cabify ?>'
                                        easy = '<?php echo $easy ?>'

                               swal({
                                      title: 'Actualizar SOAT, ¿esta seguro?',
                                      text: "¡No podrás revertir esto!",
                                      type: 'warning',
                                      showCancelButton: true,
                                      confirmButtonColor: '#3085d6',
                                      cancelButtonColor: '#d33',
                                      confirmButtonText: '¡Si, actualizar!',
                                      cancelButtonText: '¡No actualizar!',
                                    }).then((result) => {
                                      if (result.value) {
                                        swal(
                                          'Solicitado!',
                                          'La actualización puede tardar par de minutos.',
                                          'success'
                                        )


                                    parametros= "&dni=" + dni+
                                                "&placa=" + placa+
                                                "&cabify=" + cabify+
                                                "&easy=" + easy;

                                      $.ajax({
                                        data:  parametros,
                                        url:   'vistas/modulos/reniec/actsoat.php',
                                        type:  'post',
                                        success:  function (response) {

                                        }
                                });
                                setTimeout('document.location.reload()',5000);

                                  }
                                    })


                            }
                        </script>


                    <div class="tab-pane" id="lice" role="tabpanel">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Estado</strong>
                                    <br>
                                    <p class="text-muted licencia "></p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r inf"> <strong>Fecha de Expedicion</strong>
                                    <br>
                                    <p class="text-muted licencia"></p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Fecha de Revalidacion</strong>
                                    <br>
                                    <p class="text-muted licencia"></p>
                                </div>
                                 <div class="col-md-3 col-xs-6 b-r"> <strong>Nº de Licencia Correlativo</strong>
                                    <br>
                                    <p class="text-muted licencia"></p>
                                </div>
                            </div>
                            <hr>
                             <div class="row">
                                <div class="col-md-3 col-xs-6 b-r inf"> <strong>Codigo Administrado</strong>
                                    <br>
                                    <p class="text-muted licencia"></p>
                                </div>

                                <div class="col-md-3 col-xs-6 b-r inf"> <strong>Restricciones</strong>
                                    <br>
                                    <p class="text-muted licencia"></p>
                                </div>
                            </div>
                            <hr>
                            <div id="multa" style="display: none">
                            <b><font color="#fb9678">Multas</font></b>
                            <hr>
                             <div class="row" >


                                <div class="col-md-3 col-xs-6 b-r"> <strong>Fecha de Firme</strong>
                                    <br>
                                    <p class="text-muted multas"></p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Fecha de Papeleta</strong>
                                    <br>
                                    <p class="text-muted multas"></p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Fecha de Registro</strong>
                                    <br>
                                    <p class="text-muted multas">Falta</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Falta</strong>
                                    <br>
                                    <p class="text-muted multas"></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Fecha Infraccion</strong>
                                    <br>
                                    <p class="text-muted multas"></p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Papeleta</strong>
                                    <br>
                                    <p class="text-muted multas"></p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Entidad</strong>
                                    <br>
                                    <p class="text-muted multas"></p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Firmes</strong>
                                    <br>
                                    <p class="text-muted multas"></p>
                                </div>
                                </div>
                                <hr>

                                <div class="row">
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Fecha Firmes</strong>
                                    <br>
                                    <p class="text-muted multas"></p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>N° de Infraccion</strong>
                                    <br>
                                    <p class="text-muted multas"></p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>N° de Entidad</strong>
                                    <br>
                                    <p class="text-muted multas"></p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Puntos</strong>
                                    <br>
                                    <p class="text-muted multas"></p>
                                </div>
                            </div>
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


<div class="modal fade" id="agregarplaca" tabindex="-1" role="dialog" aria-labelledby="agregarplacaLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="agregarplacaLabel">Agregar Placa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal p-t-20">
            <div class="form-group row" id="x">
                <label for="exampleInputuname3" class="col-sm-3 control-label">Placa</label>
                <div class="col-sm-9">
                    <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="ti-car"></i></span></div>
                        <input style="text-transform: uppercase;" maxlength="6" minlength="6" type="text" name="caja_texto" id="placa" value="" class="form-control" pattern="[A-Z0-9]{6}"/>
                    </div>
                </div>



            </div>

        </form>

      </div>
      <div id="placaactliz"></div>
      <div class="modal-footer">
       <button type="button" href="javascript:;" class="btn btn-success waves-effect waves-light" onclick="realizaProcesoplaca();return false;" id="consultaplaca" name="consultaplaca">Consultar</button>
      </div>

    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="migrar" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Migrar Conductor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <?php
            if ($value['easytaxi'] == 0) {
                echo '<img width="30" src="vistas/img/plantilla/easy.png" id="easytaxi" value="1"> EasyTaxi';
            }
            if ($value['cabify'] == 0) {
                echo '<img width="30" src="vistas/img/plantilla/favicon.ico" id="cabify" value="1"> Cabify';
            }

         ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="realizamigrar()" id="migrarcond">Migrar</button>


      </div>
    </div>
  </div>
</div>
<script type="text/javascript">


    function realizamigrar(){
    dni = '<?php echo $idconductor ?>'

      cadena="cabify=" + $('#cabify').val() +
             "&easytaxi=" + $('#easytaxi').val()+
             "&dni=" + dni;

          $.ajax({
            type:"POST",
            url:"vistas/modulos/reniec/migrar.php",
            data:cadena,
            success:function(r){

              if(r==1){
              swal({
                  type: "success",
                  title: "¡El Conductor ha sido migrado correctamente!",
                  showConfirmButton: true,
                  confirmButtonColor: "#8cd4f5",
                  confirmButtonText: "Cerrar"

                }).then(function(result){

                  if(result.value){

                    setTimeout('document.location.reload()',100);
                  }
             });
 }
              }
 });

}


</script>
<?php
}
?>

<script type="text/javascript">

    function realizaProcesoplaca(){

        placa = $('#placa').val();
        placa = placa.toUpperCase();

        dni = '<?php echo $idconductor ?>'

         $.ajax({
            type: "POST",
            url: 'https://captcharh.ddns.net/api/record',
            data: {
                type: '1', //tipo de documento
                documento: placa, //numero de documento
                datas: 'placa' //tipo de solicitud
            }

            }).done(function(msg){
               $("#resultado").html(msg);
                console.log(msg)
            });

        cadena="&dni=" + dni +
               "&placa=" + $('#placa').val()

        $.ajax({
                data:  cadena,
                url:   'vistas/modulos/reniec/placaact.php',
                type:  'post',
                beforeSend: function () {
                        $("#placaactliz").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#placaactliz").html(response);
                        var rsp=response;
                       if (rsp.length > "1000"){
                          $("#consultaplaca").hide("slow");
                          $("#x").hide("slow");
                       }
                }
        });
}

</script>