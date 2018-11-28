<?php
require 'graficas/querys.php';
?>
<script src="vistas/dist/js/ingreso.js"></script>
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Dashboard</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>

            </div>
        </div>
    </div>
<!-- Column -->
<div class="row">
      <div class="col-lg-12 col-xlg-9 col-md-7">
            <div class="card">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs profile-tab" role="tablist">
                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#reporte" role="tab"><i class="ti-car"></i> Reporte de Conductores</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#cabify" role="tab"><i class="fa fa-taxi"></i> Cabify</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#easy" role="tab"><i class="fa fa-taxi"></i> Easy Taxi</a> </li>
                    <!-- <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#easyEconomy" role="tab"><i class="fa fa-taxi"></i> Easy Economy</a> </li> -->
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#act" role="tab"><i class="ti-reload"></i> Reporte General </a> </li>
                </ul>
             <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="reporte" role="tabpanel">
                    <div class="card-body">
                        <div class="row">

                        <div class="col-lg-6 col-md-6">

                        <?php

                        if($_SESSION["perfil"] =="Administrador"){
                        ?>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Gráfica de Aptos y No Aptos de <?php echo date('M-Y') ?></h4>
                                <div class="flot-chart">
                                    <div class="flot-chart-content" id="flot-pie-chart"></div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-lg-6 col-md-6">

                        <?php
                            include "inicio/cajas-superiores.php";
                        }
                        ?>
                        </div>
                          <!-- Column -->
                        <?php

                            if($_SESSION["perfil"] =="Administrador"){
                        ?>
                        <div class="col-lg-12">
                             <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex m-b-40 align-items-center no-block">
                                            <h5 class="card-title ">Grafica de conductores registrados </h5>
                                            <div class="ml-auto">
                                                <ul class="list-inline font-12">
                                                    <li><i class="fa fa-circle text-purple"></i> Conductores</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div id="morris-area-chart" style="height: 340px;"></div>
                                    </div>
                                </div>
                        </div>
                        <div class="col-lg-12">
                             <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex m-b-40 align-items-center no-block">
                                            <h5 class="card-title ">Grafica de conductores registrados Anual</h5>
                                            <div class="ml-auto">
                                                <ul class="list-inline font-12">
                                                    <li><i class="fa fa-circle text-purple"></i> Conductores</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div id="bar-example" style="height: 340px;"></div>
                                    </div>
                            </div>

                        </div>
                        <?php
                        }
                        ?>
                        <?php

                        if($_SESSION["perfil"] =="Operador" || $_SESSION["perfil"] =="RRHH"){

                         echo '<div class="col-lg-12">
                             <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex m-b-40 align-items-center no-block">
                                            <h1 class="card-title ">Bienvenid@ ' .$_SESSION["nombre"].'</h1>

                                        </div>

                                    </div>
                            </div>
                        </div> ';
                        }

                        ?>
                    </div>

                    </div>

                </div>

<!--second tab-->
                    <div class="tab-pane" id="cabify" role="tabpanel">
                        <div class="card-body">
                            <div class="row">

                        <div class="col-lg-12 col-md-6">

                        <?php
                            include "inicio/cajas-superiorescabify.php";

                        ?>
                        </div>

                        <?php

                        if($_SESSION["perfil"] =="Operador" || $_SESSION["perfil"] =="RRHH"){

                         echo '<div class="col-lg-12">
                             <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex m-b-40 align-items-center no-block">
                                            <h1 class="card-title ">Bienvenid@ ' .$_SESSION["nombre"].'</h1>

                                        </div>

                                    </div>
                            </div>
                        </div> ';

                        }

                        ?>
                            </div>
                         </div>
                     </div>
<!--second tab-->
                    <div class="tab-pane" id="easy" role="tabpanel">
                        <div class="card-body">
                            <div class="row">

                        <div class="col-lg-12 col-md-6">

                        <?php
                            include "inicio/cajas-superioreseasy.php";

                        ?>
                        </div>
                          <!-- Column -->

                        <?php

                        if($_SESSION["perfil"] =="Operador" || $_SESSION["perfil"] =="RRHH"){

                         echo '<div class="col-lg-12">
                             <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex m-b-40 align-items-center no-block">
                                            <h1 class="card-title ">Bienvenid@ ' .$_SESSION["nombre"].'</h1>

                                        </div>

                                    </div>
                            </div>
                        </div>';

                        }

                        ?>

                </div>
                </div>
            </div>

            <!--second tab-->
                    <div class="tab-pane" id="easyEconomy" role="tabpanel">
                        <div class="card-body">
                            <div class="row">

                        <div class="col-lg-12 col-md-6">

                        <?php
                          //  include "inicio/cajas-superioreseasy.php";

                        ?>
                        </div>
                          <!-- Column -->

                        <?php

                        if($_SESSION["perfil"] =="Operador" || $_SESSION["perfil"] =="RRHH"){

                         echo '<div class="col-lg-12">
                             <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex m-b-40 align-items-center no-block">
                                            <h1 class="card-title ">Bienvenid@ ' .$_SESSION["nombre"].'</h1>

                                        </div>

                                    </div>
                            </div>
                        </div>';

                        }

                        ?>

                </div>
                </div>
            </div>
            <!--second tab-->
                     <div class="tab-pane" id="act" role="tabpanel">
                        <div class="card-body">
                            <div class="row">

                        <div class="col-lg-12 col-md-6">

                        <?php
                            include "inicio/cajas-superioresact.php";

                        ?>
                        </div>

                        <?php

                        if($_SESSION["perfil"] =="Operador" || $_SESSION["perfil"] =="RRHH"){

                         echo '<div class="col-lg-12">
                                 <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex m-b-40 align-items-center no-block">
                                                <h1 class="card-title ">Bienvenid@ ' .$_SESSION["nombre"].'</h1>

                                            </div>
                                        </div>
                                    </div>
                                </div> ';

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
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->

<script type="text/javascript">
    anomes = '<?php echo $anomes ?>'

    Morris.Area({
        element: 'morris-area-chart'
        , data: [{
                period: anomes+'-01'
                , Conductores: '<?php echo $dia1 ?>'

        }, {
                period: anomes+'-02'
                , Conductores: '<?php echo $dia2 ?>'
        }, {
                period: anomes+'-03'
                , Conductores: '<?php echo $dia3 ?>'

        }, {
                period: anomes+'-04'
                , Conductores:'<?php echo $dia4 ?>'
        }, {
                period: anomes+'-05'
                , Conductores:'<?php echo $dia5 ?>'
        }, {
                period: anomes+'-06'
                , Conductores:'<?php echo $dia6 ?>'
        }, {
                period: anomes+'-07'
                , Conductores:'<?php echo $dia7 ?>'
        },{
                period: anomes+'-08'
                , Conductores:'<?php echo $dia8 ?>'
        },{
                period: anomes+'-09'
                , Conductores:'<?php echo $dia9 ?>'
        },{
                period: anomes+'-10'
                , Conductores: '<?php echo $dia10 ?>'

        },{
                period: anomes+'-11'
                , Conductores: '<?php echo $dia11 ?>'

        },{
                period: anomes+'-12'
                , Conductores: '<?php echo $dia12 ?>'

        },{
                period: anomes+'-13'
                , Conductores: '<?php echo $dia13 ?>'

        },{
                period: anomes+'-14'
                , Conductores: '<?php echo $dia14 ?>'

        },{
                period: anomes+'-15'
                , Conductores: '<?php echo $dia15 ?>'

        },{
                period: anomes+'-16'
                , Conductores: '<?php echo $dia16 ?>'

        },{
                period: anomes+'-17'
                , Conductores: '<?php echo $dia17 ?>'

        }, {
                period: anomes+'-18'
                , Conductores: '<?php echo $dia18 ?>'

        }, {
                period: anomes+'-19'
                , Conductores: '<?php echo $dia19 ?>'

        },{
                period: anomes+'-20'
                , Conductores:'<?php echo $dia20 ?>'
        },{
                period: anomes+'-21'
                , Conductores:'<?php echo $dia21 ?>'
        },{
                period: anomes+'-22'
                , Conductores:'<?php echo $dia22 ?>'
        },{
                period: anomes+'-23'
                , Conductores:'<?php echo $dia23 ?>'
        },{
                period: anomes+'-24'
                , Conductores: '<?php echo $dia24 ?>'

        },{
                period: anomes+'-25'
                , Conductores: '<?php echo $dia25 ?>'

        },{
                period: anomes+'-26'
                , Conductores: '<?php echo $dia26 ?>'

        },{
                period: anomes+'-27'
                , Conductores: '<?php echo $dia27 ?>'

        },{
                period: anomes+'-28'
                , Conductores: '<?php echo $dia28 ?>'

        },{
                period: anomes+'-29'
                , Conductores: '<?php echo $dia29 ?>'

        },{
                period: anomes+'-30'
                , Conductores: '<?php echo $dia30 ?>'

        },{
                period: anomes+'-31'
                , Conductores: '<?php echo $dia31 ?>'

        }]
        , xkey: 'period'
        , ykeys: ['Conductores']
        , labels: ['Conductores']
        , pointSize: 6
        , fillOpacity: 0
        , pointStrokeColors: ['#9675ce']
        , behaveLikeLine: true
        , gridLineColor: '#e0e0e0'
        , lineWidth: 5
        , hideHover: 'auto'
        , lineColors: ['#9675ce']
        , resize: true
    });

</script>


<script type="text/javascript">
    //Flot Pie Chart
$(function () {
    var data = [{
        label: "Aptos"
        , data: '<?php echo $apto ?>'
        , color: "#9675ce"
    , }, {
        label: "No Aptos"
        , data: '<?php echo $noapto ?>'
        , color: "#e46a76"
    , }];
    var plotObj = $.plot($("#flot-pie-chart"), data, {
        series: {
            pie: {
                innerRadius: 0.5
                , show: true
            }
        }
        , grid: {
            hoverable: true
        }
        , color: null
        , tooltip: true
        , tooltipOpts: {
            content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
            shifts: {
                x: 20
                , y: 0
            }
            , defaultTheme: false
        }
    });
});
</script>

<script type="text/javascript">
    /*
 * Play with this code and it'll update in the panel opposite.
 *
 * Why not try some of the options above?
 */
Morris.Bar({
  element: 'bar-example',
  data: [
    { y: 'Mayo', a: '<?php echo $mayo ?>' },
    { y: 'Junio', a: '<?php echo $junio ?>' },
    { y: 'Julio', a: '<?php echo $julio ?>' },
    { y: 'Agosto', a: '<?php echo $agosto ?>'},
    { y: 'Septiembre', a: '<?php echo $septiembre ?>'},
    { y: 'Octubre', a: '<?php echo $octubre ?>'},
    { y: 'Noviembre', a: '<?php echo $noviembre ?>'},
    /*{ y: 'Diciembre', a: '<?php echo $diciembre ?>'},
    { y: 'Enero', a:  '<?php echo $enero ?>' },
    { y: 'Febrero', a: '<?php echo $febrero ?>' },
    { y: 'Marzo', a: '<?php echo $marzo ?>'},
    { y: 'Abril', a: '<?php echo $abril ?>'}*/
  ],
  xkey: 'y',
  ykeys: ['a'],
  labels: ['Conductores',]
});
</script>
