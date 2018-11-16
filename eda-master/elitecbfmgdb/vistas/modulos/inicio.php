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
    Morris.Area({
        element: 'morris-area-chart'
        , data: [{
                period: '2018-10-01'
                , Conductores: '<?php echo $dia1 ?>'

        }, {
                period: '2018-10-02'
                , Conductores: '<?php echo $dia2 ?>'
        }, {
                period: '2018-10-03'
                , Conductores: '<?php echo $dia3 ?>'

        }, {
                period: '2018-10-04'
                , Conductores:'<?php echo $dia4 ?>'
        }, {
                period: '2018-10-05'
                , Conductores:'<?php echo $dia5 ?>'
        }, {
                period: '2018-10-06'
                , Conductores:'<?php echo $dia6 ?>'
        }, {
                period: '2018-10-07'
                , Conductores:'<?php echo $dia7 ?>'
        },{
                period: '2018-10-08'
                , Conductores:'<?php echo $dia8 ?>'
        },{
                period: '2018-10-09'
                , Conductores:'<?php echo $dia9 ?>'
        },{
                period: '2018-10-10'
                , Conductores: '<?php echo $dia10 ?>'

        },{
                period: '2018-10-11'
                , Conductores: '<?php echo $dia11 ?>'

        },{
                period: '2018-10-12'
                , Conductores: '<?php echo $dia12 ?>'

        },{
                period: '2018-10-13'
                , Conductores: '<?php echo $dia13 ?>'

        },{
                period: '2018-10-14'
                , Conductores: '<?php echo $dia14 ?>'

        },{
                period: '2018-10-15'
                , Conductores: '<?php echo $dia15 ?>'

        },{
                period: '2018-10-16'
                , Conductores: '<?php echo $dia16 ?>'

        },{
                period: '2018-10-17'
                , Conductores: '<?php echo $dia17 ?>'

        }, {
                period: '2018-10-18'
                , Conductores: '<?php echo $dia18 ?>'

        }, {
                period: '2018-10-19'
                , Conductores: '<?php echo $dia19 ?>'

        },{
                period: '2018-10-20'
                , Conductores:'<?php echo $dia20 ?>'
        },{
                period: '2018-10-21'
                , Conductores:'<?php echo $dia21 ?>'
        },{
                period: '2018-10-22'
                , Conductores:'<?php echo $dia22 ?>'
        },{
                period: '2018-10-23'
                , Conductores:'<?php echo $dia23 ?>'
        },{
                period: '2018-10-24'
                , Conductores: '<?php echo $dia24 ?>'

        },{
                period: '2018-10-25'
                , Conductores: '<?php echo $dia25 ?>'

        },{
                period: '2018-10-26'
                , Conductores: '<?php echo $dia26 ?>'

        },{
                period: '2018-10-27'
                , Conductores: '<?php echo $dia27 ?>'

        },{
                period: '2018-10-28'
                , Conductores: '<?php echo $dia28 ?>'

        },{
                period: '2018-10-29'
                , Conductores: '<?php echo $dia29 ?>'

        },{
                period: '2018-10-30'
                , Conductores: '<?php echo $dia30 ?>'

        },{
                period: '2018-10-31'
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
