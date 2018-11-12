<?php
//use Controladores\ControladorConductor;
    $idconductor =$_GET['idconductor'];
    $item = "dni";
    $valor = $idconductor;

    $unconductor = ControladorConductor::ctrMostrarConductor($item, $valor);
    //var_dump($unconductor);


    foreach ($unconductor as $key => $value){

    if ($value['blacklist'] == 0) {
      $bl="No se encuentra en lista negra";
    }
    if ($value['blacklist'] == "") {
      $bl="";
    }
    if ($value['blacklist'] == 1) {
      $bl="Si se encuentra en lista negra";
    }

    @$cabify = $value['cabify'];

    @$easy = $value['easytaxi'];

$placa=$value['placa'];
$placa = str_replace("-","",$placa);
$placa = str_replace(" ","",$placa);
$extr=$value['extr'];
$color_vehiculo=$value['color_vehiculo'];


?>

<script type="text/javascript">

    var dni = '<?php echo $idconductor ?>'
    var placa = '<?php echo $placa ?>'

    $.ajax({
    type: "GET",
    url: 'https://captcharh.ddns.net/api/record/principal/'+ dni

    }).done(function(msg){
        //$("#resultado").html(msg);
       // console.log(msg)

        if (typeof msg[0] == "undefined") {
        $('.licencia')[3].innerText = msg['slc'][0]['ESTADO_DE_LA_LICENCIA'];
        $('.licencia')[5].innerText = msg['slc'][0]['VIGENTE_HASTA'];
        $('.licencia')[6].innerText = msg['slc'][0]['NRO_DE_LICENCIA'];
        $(".inf").hide();

       /*  }elseif (typeof msg['slc'] == "undefined") {
        $("#prue").hide();*/
        }else{
            //$('#puntos')[0].innerText = msg['slc']['PUNTOS'];
        $('.datosperso')[0].innerText = msg[0]['var_nombre'];
        $('.datosperso')[1].innerText = msg[0]['var_apellido_paterno']+ ' ' +msg[0]['var_apellido_materno'];
        $('.licencia')[0].innerText = msg[0]['var_direccion'];
        $('.licencia')[1].innerText = msg[0]['var_departamento'];
        $('.licencia')[2].innerText = msg[0]['var_distrito'];
        $('.licencia')[3].innerText = msg[0]['var_estado_licencia'];
        $('.licencia')[4].innerText = msg[0]['dat_fecha_expedicion'];
        $('.licencia')[5].innerText = msg[0]['dat_fecha_revalidacion'];
        $('.licencia')[6].innerText = msg[0]['num_cod_administrado'];
        $('.licencia')[7].innerText = msg[0]['var_num_licencia'];
        $('.licencia')[8].innerText = msg[0]['var_restricciones1'];
        $('.licencia')[9].innerText = msg[0]['var_restricciones2'];

        $("#acthoy").hide();

         }
         if (typeof msg[0] == "El record/placa no recaudo datos. intente de nuevo.") {
        $("#acthoy").hide();
         }
    });

    $.ajax({
    type: "GET",
    url: 'https://captcharh.ddns.net/api/record/multas/'+ dni

    }).done(function(msg){
        //$("#resultado").html(msg);
        //console.log(msg)
        if (typeof msg[0]['dat_fecha_firme']!= "undefined") {
        $('#multa').show();
        $('.multas')[0].innerText = msg[0]['dat_fecha_firme'];
        $('.multas')[1].innerText = msg[0]['dat_fecha_papeleta'];
        $('.multas')[2].innerText = msg[0]['dat_fecha_registro'];
        $('.multas')[3].innerText = msg[0]['falta'];
        $('.multas')[4].innerText = msg[0]['fec_infraccion'];
        $('.multas')[5].innerText = msg[0]['papeleta'];
        $('.multas')[6].innerText = msg[0]['str_entidad'];
        $('.multas')[7].innerText = msg[0]['str_estado'];
        $('.multas')[8].innerText = msg[0]['str_fec_firme'];
        $('.multas')[9].innerText = msg[0]['str_num_infraccion'];
        $('.multas')[10].innerText = msg[0]['str_num_entidad'];
//        $('.multas')[11].innerText = msg[0]['str_puntos'];
        }

    });

    var color = '<?php echo $color_vehiculo ?>';
        if (color == "Placa no EXISTE") {

        }if (color == "") {

        }else{
            $.ajax({
            type: "GET",
            url: 'https://captcharh.ddns.net/api/record/placa/'+placa

            }).done(function(msg){
                //$("#resultado").html(msg);
               //console.log(msg['Especificaciones'][0]['class'])//msg.vin.co
               if (msg != "No existe la placa, intente mas tarde.") {
                $('.vehiculo')[0].innerText = msg['Marca'];
                $('.vehiculo')[1].innerText = msg['Modelo'];
                $('.vehiculo')[2].innerText = msg['Vin']['modelYear'];
                $('.vehiculo')[3].innerText = msg['Nro_Serie'];
                $('.vehiculo')[4].innerText = msg['Placa_Anterior'];
                $('.vehiculo')[5].innerText = msg['Fecha_Entrega'];
                $('.vehiculo')[6].innerText = msg['Propietario'];
                $('.vehiculo')[7].innerText = msg['Estado'];
                $('.vehiculo')[8].innerText = msg['Tipo_Uso'];
                $('.vehiculo')[9].innerText = msg['Tipo_de_Sol'];
                $('.vehiculo')[10].innerText = msg['Vin']['continent'];
                $('.vehiculo')[11].innerText = msg['Vin']['countries'];
                $('.vehiculo')[12].innerText = msg['Vin']['manufacture'];
                $('.vehiculo')[13].innerText = msg['Vin']['sequentialNumber'];
                $('.vehiculo')[14].innerText = msg['Especificaciones'][0]['class'];
                $('.vehiculo')[15].innerText = msg['Especificaciones'][0]['places'];
                $('.vehiculo')[16].innerText = msg['Especificaciones'][0]['doors'];



        }
    });
        }

</script>
<script type="text/javascript">

empresa = '<?php echo $_SESSION["empresa"] ?>'

if(empresa =="easytaxi"){
   $(document).ready(function(){
    url = 'recibearchivo.php';
    url2 = 'recibearchivo2.php';
    $('#modalcapture').captureDevice([dni, dni], [url, url2])

})
}

if(empresa =="cabify"){
   $(document).ready(function(){
    direccion = 'recibearchivocbf.php';
    direccion2 = 'recibearchivo2cbf.php';
    $('#modalcapturecabify').captureDevicecbf([dni, dni], [direccion, direccion2])

})

}
</script>
<style type="text/css" media="screen">
.btn-cbf {
  color: #fff;
  background-color: #9675ce;
  border-color: #9675ce; }
  .btn-cbf:hover {
    color: #fff;
    background-color: #735a9e;
    border-color: #735a9e; }

</style>

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

                        $foto = $value['foto'];

                            $nombre_fichero ='extensiones/tcpdf/pdf/images/conductores/'.$foto;
                            $nombre_ficherocbf ='extensiones/tcpdf/pdf/images/conductorescbf/'.$foto;

                            if (file_exists($nombre_fichero)){
                                echo '<a class="image-popup-vertical-fit" href="extensiones/tcpdf/pdf/images/conductores/'.$foto.'">
                                    <img src="extensiones/tcpdf/pdf/images/conductores/'.$foto.'" class="img-circle" width="100" height="100" />
                                    </a> ';
                            }else{
                                echo '
                                    <img src="vistas/img/conductores/conductor.png" class="img-circle" width="100" height="100" />
                                    ';
                            }

                            if (file_exists($nombre_ficherocbf)) {

                            echo '<a class="image-popup-vertical-fit" href="extensiones/tcpdf/pdf/images/conductorescbf/'.$foto.'">
                                <img src="extensiones/tcpdf/pdf/images/conductorescbf/'.$foto.'" class="img-circle" width="100" height="100" />
                                </a> ';
                            }else{
                                echo '
                                    <img src="vistas/img/conductores/conductor.png" class="img-circle" width="100" height="100" />
                                    ';
                            }






                        ?>
                        <div id="modalcapture"></div>


                        <div id="modalcapturecabify"></div>

                        <h4 class="card-title m-t-10"><?php echo $value['nombre'] ." " . $value['apellido']; ?></h4>
                        <h5 class="card-subtitle">DNI <?php echo $value['dni']; ?></h5>
                        <h6 class="card-subtitle">Conductor</h6>
                        <?php
                            if ($value['fecha_act'] != "") {
                                echo '<h5 class="card-subtitle">Fecha de actualización '.$value['fecha_act'].'</h5>';
                            } else {

                            }

                        ?>

                        <div class="row text-center justify-content-md-center">
                            <?php

                           /* if($_SESSION["empresa"] =="easytaxi"){*/
                                echo '<button class="btn btn-warning" data-toggle="modal" data-target="#modalcapture"><i class="ti-camera"></i> EasyTaxi </button>';
                            /*}*/
                            /* echo '<button class="btn btn-success" data-toggle="modal" data-target="#modalcapture"><i class="ti-camera"></i> </button>';*/

                            /*if($_SESSION["empresa"] =="cabify"){*/
                                echo '<button class="btn btn-cbf" data-toggle="modal" data-target="#modalcapturecabify"><i class="ti-camera"></i> Cabify </button>';
                           /* }*/


                            if($_SESSION["empresa"] =="arhu"){
                                echo '<button class="btn btn-success" onclick="actualizararhu()" data-toggle="tooltip" data-placement="top" title="Tooltip on top">Actualizar</button>';
                            }

                            if($_SESSION["usuario"] =="edcenteno"){
                                echo '<button class="btn btn-info" onclick="actualizared()" data-toggle="tooltip" data-placement="top" title="Tooltip on top">Actualizar</button>';
                            }

                            ?>



                        <?php
                            $fecha_actual = date("Y-m-d");
                            $mes = date("Y-m-d",strtotime($fecha_actual."- 20 day"));
                            /*$date = date('Y-m-d h:i:s A');
                            echo $date;*/
                                if ($value['fecha'] < $mes) {
                                    echo '<button class="btn btn-warning" onclick="deshabilitar_btnEnviar()">Actualizar</button>';
                                } else {

                                    echo '<button class="btn btn-default" disabled="true">Actualizar</button>';
                                }

                        ?>

                        <?php
                            if($value['foto']){

                                if(file_exists($nombre_ficherocbf)){
                                    echo '
                                    <a download="'.$foto.'" href="extensiones/tcpdf/pdf/images/conductorescbf/'.$foto.'"><button class="btn btn-cbf" data-toggle="modal" data-target="#">
                                    Descargar Foto Cabify</button></a>';
                                }
                                if(file_exists($nombre_fichero)){
                                     echo '
                                    <a download="'.$foto.'" href="extensiones/tcpdf/pdf/images/conductores/'.$foto.'"><button class="btn btn-warning" data-toggle="modal" data-target="#">
                                    Descargar Foto EasyTaxi</button></a>';
                                }
                            }
                        ?>

                        </div>

                     <?php
                     if ($value['placa'] == "NINGUNO" || $value['placa'] == ""  || $value['placa'] == "NINGUNO " ||   $value['placa'] == "NINGUNA") {
                         echo '<button type="button" class="btn btn-info" data-toggle="modal" data-target="#agregarplaca" data-whatever="@getbootstrap">Agregar Placa</button>';
                     }else{
                         echo '<button type="button" class="btn btn-info" data-toggle="modal" data-target="#agregarplaca" data-whatever="@getbootstrap">Cambiar Placa</button>';
                     }
                    ?>
                    <hr>
                    <div class="card-body"> <small class="text-muted">DNI Digital</small></br>
                    <?php
                            if($value['dni_digital']){
                                $foto = $value['dni_digital'];

                                echo '
                                    <a class="image-popup-vertical-fit" href="vistas/img/dni/'.$foto.'">
                                    <img src="vistas/img/dni/'.$foto.'" class="img-responsive radius" width="200" height="200" />
                                    </a> ';
                                echo '
                                    <a download="'.$foto.'" href="vistas/img/dni/'.$foto.'"><button class="btn btn-primary" data-toggle="modal" data-target="#">
                                    Descargar DNI Frontal</button></a>';
                            }
                        ?>
                    <?php
                            if($value['dni_digital_r']){
                                $foto_r = $value['dni_digital_r'];
                                echo '
                                    <a class="image-popup-vertical-fit" href="vistas/img/dni/'.$foto_r.'">
                                    <img src="vistas/img/dni/'.$foto_r.'" class="img-responsive radius" width="200" height="200" />
                                    </a> ';
                                echo '
                                    <a download="'.$foto_r.'" href="vistas/img/dni/'.$foto_r.'"><button class="btn btn-info" data-toggle="modal" data-target="#">
                                    Descargar DNI Reverso</button></a>';
                            }
                        ?>

                        </div>

                    <br/>


                        <script>
                            function deshabilitar_btnEnviar(){

                                        placa = '<?php echo $placa ?>'
                                        placa = placa.toUpperCase();
                                        type= '<?php echo $extr ?>'
                                        dni = '<?php echo $idconductor ?>'
                                        cabify= '<?php echo $cabify ?>'
                                        easy = '<?php echo $easy ?>'
                                        if (type == 0){
                                            type =1;
                                        }

                               swal({
                                      title: 'Actualizar tiene un costo adicional, ¿esta seguro?',
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

                                        $.ajax({
                                          type: "POST",
                                          url: 'https://captcharh.ddns.net/api/record',
                                          data: {
                                              type: type, //tipo de documento
                                              documento: dni, //numero de documento
                                              datas: 'record' //tipo de solicitud
                                          }

                                        }).done(function(msg){
                                         // $("#resultado").html(msg);
                                          //console.log(msg)

                                        });


                                        $.ajax({
                                            type: "POST",
                                            url: 'https://captcharh.ddns.net/api/record',
                                            data: {
                                                type: '1', //tipo de documento
                                                documento: placa, //numero de documento
                                                datas: 'placa' //tipo de solicitud
                                            }

                                            }).done(function(msg){
                                               /* $("#resultado").html(msg);
                                                console.log(msg)*/
                                            });

                                    parametros="&dni=" + dni+
                                                "&placa=" + placa+
                                                "&cabify=" + cabify+
                                                "&easy=" + easy+
                                                "&type=" + type;

                                      $.ajax({
                                        data:  parametros,
                                        url:   'vistas/modulos/reniec/act.php',
                                        type:  'post',
                                        success:  function (response) {

                                          }
                                        });

                                    /*   param="&dni=" + dni;

                                     $.ajax({
                                        data:  param,
                                        url:   'vistas/modulos/reniec/ruc.php',
                                        type:  'post',
                                        success:  function (response) {

                                        }
                                        });*/
                             //  setTimeout('document.location.reload()',5000);

                                  }
                                    })


                            }

                            function actualizararhu(){

                                        placa = '<?php echo $placa ?>'
                                        placa = placa.toUpperCase();
                                        type= '<?php echo $extr ?>'
                                        dni = '<?php echo $idconductor ?>'
                                        cabify= '<?php echo $cabify ?>'
                                        easy = '<?php echo $easy ?>'
                                        if (type == 0){
                                            type =1;
                                        }

                               swal({
                                      title: 'Actualizar tiene un costo adicional, ¿esta seguro?',
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

                                      param="&dni=" + dni+
                                            "&type=" + type;

                                      $.ajax({
                                        data:  param,
                                        url:   'vistas/modulos/reniec/ruc.php',
                                        type:  'post',
                                        success:  function (response) {

                                        }
                                        });
                               setTimeout('document.location.reload()',30000);

                                  }
                                    })


                            }

                         function actualizared(){
                           //ar placa="&placa=" +  '<?php echo $placa ?>' +
                            //placa = '<?php echo $placa ?>'
                            //
                            param="&placa=" + placa
                            $.ajax({
                                data:  param,
                                url:   'vistas/modulos/reniec/placaact.php',
                                type:  'post',
                                success:  function (response) {
                               setTimeout('document.location.reload()',8000);

                                }
                        });
                        }
                        </script>

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
                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#datosperso" role="tab"><i class="ti-user"></i> DNI-Datos Personales</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#antecedentes" role="tab"><i class="icon-docs"></i> Antecedentes</a> </li>
                    <!-- <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#soat" role="tab"><i class="ti-id-badge"></i> SOAT</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#resultado" role="tab"><i class="ti-id-badge"></i> Resultados</a> </li>-->
                    <?php

                        if($_SESSION["perfil"] !="RRHH"){
                            if ($value['record_cond'] == "NO BREVETE") {

                            }else{
                                echo '<li class="nav-item"> <a class="nav-link" data-toggle="tab" id= "prue" href="#lice" role="tab"><i class="ti-car"></i> Licencia de Conducir</a> </li>';
                            }

                                if ($value['placa'] == "NINGUNO" || $value['placa'] == "NINGUNO " || $value['placa'] == "NINGUNA") {

                                 } else {

                                echo '<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#datosveh" role="tab"><i class="ti-car"></i> Datos del Vehiculo</a> </li>
                                ';
                                }
                                if ($value['placa'] == "NINGUNO" || $value['placa'] == "NINGUNA" || $value['placa'] == "NINGUNO ") {

                                 } else {
                                    echo '<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#soat" role="tab"><i class="ti-id-badge"></i> SOAT</a> </li>';
                                 }

                                echo '
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#resultado" role="tab"><i class="ti-id-badge"></i> Resultados</a> </li>
                               <li class="nav-item"> <a class="nav-link btnreporte"  href="extensiones/tcpdf/pdf/reporte.php?idconductor='.$idconductor.'" target="_blank" role="tab"><i class="ti-download"></i> PDF</a> </li>';
                        }


                        ?>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="datosperso" role="tabpanel">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2 col-xs-6 b-r"> <strong>Nombres</strong>
                                    <br>
                                    <p class="text-muted datosperso"><?php echo $value['nombre']; ?></p>
                                </div>
                                <div class="col-md-2 col-xs-6 b-r"> <strong>Apellidos</strong>
                                    <br>
                                    <p class="text-muted datosperso"><?php echo $value['apellido']; ?></p>
                                </div>
                                <div class="col-md-2 col-xs-6 b-r"> <strong>DNI</strong>
                                    <br>
                                    <p class="text-muted"><?php echo $value['dni']; ?></p>
                                </div>
                                <div class="col-md-2 col-xs-6 b-r"> <strong>Fecha de Nacimiento</strong>
                                    <br>
                                    <p class="text-muted"><?php echo $fechanac = $value['fecha_nacimiento']; ?></p>
                                </div>
                                <div class="col-md-2 col-xs-6 b-r"> <strong>Edad</strong>
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

                                <div class="col-md-2 col-xs-6 b-r"> <strong>Empresa</strong>
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
                                <div class="col-md-3 col-xs-6 b-r inf"> <strong>Direccion</strong>
                                    <br>
                                    <p class="text-muted licencia"></p>
                                </div>
                                <div class="col-md-2 col-xs-6 b-r inf"> <strong>Departamento</strong>
                                    <br>
                                    <p class="text-muted licencia"></p>
                                </div>
                                <div class="col-md-2 col-xs-6 b-r inf"> <strong>Distrito</strong>
                                    <br>
                                    <p class="text-muted licencia"></p>
                                </div>
                                <?php
                                    if ($value['ruc'] != "") {
                                        $ruc= $value['ruc'];
                                        echo ' <div class="col-md-2 col-xs-6 b-r"> <strong>RUC</strong>
                                                <br>
                                                <p class="text-muted">'.$ruc.'</p>
                                            </div>';
                                    }



                                    if ($value['cabify'] == 1 &&  $value['easytaxi'] == 1) {

                                    } else {
                                        echo '<div class="col-md-3 col-xs-6 b-r"> <strong>Migrar</strong>
                                              <br>
                                             <button type="button" class="btn btn-info" data-toggle="modal" data-target="#migrar">
                                                    Migrar a empresa
                                              </button>
                                               </div>';
                                    }


                                    ?>

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
                                setTimeout('document.location.reload()',3000);

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