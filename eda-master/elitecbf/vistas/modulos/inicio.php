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
                    <div class="tab-pane" id="easyEconomy" role="tabpanel">
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
  // ==============================================================
    // Variales diarias
    // ==============================================================
    var dia1 = <?php echo json_encode($dia1)?>;
    var dia1 = parseInt(dia1[0].dia1);

    var dia2 = <?php echo json_encode($dia2)?>;
    var dia2 = parseInt(dia2[0].dia2);

    var dia3 = <?php echo json_encode($dia3)?>;
    var dia3 = parseInt(dia3[0].dia3);

    var dia4 = <?php echo json_encode($dia4)?>;
    var dia4 = parseInt(dia4[0].dia4);

    var dia5 = <?php echo json_encode($dia5)?>;
    var dia5 = parseInt(dia5[0].dia5);

    var dia6 = <?php echo json_encode($dia6)?>;
    var dia6 = parseInt(dia6[0].dia6);

    var dia7 = <?php echo json_encode($dia7)?>;
    var dia7 = parseInt(dia7[0].dia7);

    var dia8 = <?php echo json_encode($dia8)?>;
    var dia8 = parseInt(dia8[0].dia8);

    var dia9 = <?php echo json_encode($dia9)?>;
    var dia9 = parseInt(dia9[0].dia9);

    var dia10 = <?php echo json_encode($dia10)?>;
    var dia10 = parseInt(dia10[0].dia10);

    var dia11 = <?php echo json_encode($dia11)?>;
    var dia11 = parseInt(dia11[0].dia11);

    var dia12 = <?php echo json_encode($dia12)?>;
    var dia12 = parseInt(dia12[0].dia12);

    var dia13 = <?php echo json_encode($dia13)?>;
    var dia13 = parseInt(dia13[0].dia13);

    var dia14 = <?php echo json_encode($dia14)?>;
    var dia14 = parseInt(dia14[0].dia14);

    var dia15 = <?php echo json_encode($dia15)?>;
    var dia15 = parseInt(dia15[0].dia15);

    var dia16 = <?php echo json_encode($dia16)?>;
    var dia16 = parseInt(dia16[0].dia16);

    var dia17 = <?php echo json_encode($dia17)?>;
    var dia17 = parseInt(dia17[0].dia17);

    var dia18 = <?php echo json_encode($dia18)?>;
    var dia18 = parseInt(dia18[0].dia18);

    var dia19 = <?php echo json_encode($dia19)?>;
    var dia19 = parseInt(dia19[0].dia19);

    var dia20 = <?php echo json_encode($dia20)?>;
    var dia20 = parseInt(dia20[0].dia20);

    var dia21 = <?php echo json_encode($dia21)?>;
    var dia21 = parseInt(dia21[0].dia21);

    var dia22 = <?php echo json_encode($dia22)?>;
    var dia22 = parseInt(dia22[0].dia22);

    var dia23 = <?php echo json_encode($dia23)?>;
    var dia23 = parseInt(dia23[0].dia23);

    var dia24 = <?php echo json_encode($dia24)?>;
    var dia24 = parseInt(dia24[0].dia24);

    var dia25 = <?php echo json_encode($dia25)?>;
    var dia25 = parseInt(dia25[0].dia25);

    var dia26 = <?php echo json_encode($dia26)?>;
    var dia26 = parseInt(dia26[0].dia26);

    var dia27 = <?php echo json_encode($dia27)?>;
    var dia27 = parseInt(dia27[0].dia27);

    var dia28 = <?php echo json_encode($dia28)?>;
    var dia28 = parseInt(dia28[0].dia28);

    var dia29 = <?php echo json_encode($dia29)?>;
    var dia29 = parseInt(dia29[0].dia29);

    var dia30 = <?php echo json_encode($dia30)?>;
    var dia30 = parseInt(dia30[0].dia30);

    var dia31 = <?php echo json_encode($dia31)?>;
    var dia31 = parseInt(dia31[0].dia31);

    // ==============================================================
    // Variables Apto - no aptos
    // ==============================================================

    var apto = <?php echo json_encode($apto)?>  ;
    var apto = parseInt(apto[0].apto);

    var noapto = <?php echo json_encode($noapto)?>;
    var noapto = parseInt(noapto[0].noapto);

    // ==============================================================
    // Variables meses
    // ==============================================================

    var mayo = <?php echo json_encode($mayo)?>;
    var mayo = parseInt(mayo[0].mayo);

    var junio = <?php echo json_encode($junio)?>;
    var junio = parseInt(junio[0].junio);

    var julio = <?php echo json_encode($julio)?>;
    var julio = parseInt(julio[0].julio);

    var agosto = <?php echo json_encode($agosto)?>;
    var agosto = parseInt(agosto[0].agosto);

    var septiembre = <?php echo json_encode($septiembre)?>;
    var septiembre = parseInt(septiembre[0].septiembre);

    var octubre = <?php echo json_encode($octubre)?>;
    var octubre = parseInt(octubre[0].octubre);

    var noviembre = <?php echo json_encode($noviembre)?>;
    var noviembre = parseInt(noviembre[0].noviembre);

    var diciembre = <?php echo json_encode($diciembre)?>;
    var diciembre = parseInt(diciembre[0].diciembre);

    var enero = <?php echo json_encode($enero)?>;
    var enero = parseInt(enero[0].enero);

    var febrero = <?php echo json_encode($febrero)?>;
    var febrero = parseInt(febrero[0].febrero);

    var marzo = <?php echo json_encode($marzo)?>;
    var marzo = parseInt(marzo[0].marzo);

    var abril = <?php echo json_encode($abril)?>;
    var abril = parseInt(abril[0].abril);


</script>

<script type="text/javascript">
    Morris.Area({
        element: 'morris-area-chart'
        , data: [{
                period: '2018-09-01'
                , Conductores: dia1

        }, {
                period: '2018-09-02'
                , Conductores: dia2

        }, {
                period: '2018-09-03'
                , Conductores: dia3

        }, {
                period: '2018-09-04'
                , Conductores: dia4

        }, {
                period: '2018-09-05'
                , Conductores: dia5

        }, {
                period: '2018-09-06'
                , Conductores: dia6

        }, {
                period: '2018-09-07'
                , Conductores: dia7

        },{
                period: '2018-09-08'
                , Conductores: dia8

        },{
                period: '2018-09-09'
                , Conductores: dia9

        },{
                period: '2018-09-10'
                , Conductores: dia10

        },{
                period: '2018-09-11'
                , Conductores: dia11

        },{
                period: '2018-09-12'
                , Conductores: dia12

        },{
                period: '2018-09-13'
                , Conductores: dia13

        },{
                period: '2018-09-14'
                , Conductores: dia14

        },{
                period: '2018-09-15'
                , Conductores: dia15

        },{
                period: '2018-09-16'
                , Conductores: dia16

        },{
                period: '2018-09-17'
                , Conductores: dia17

        }, {
                period: '2018-09-18'
                , Conductores: dia18

        }, {
                period: '2018-09-19'
                , Conductores: dia19

        },{
                period: '2018-09-20'
                , Conductores: dia20

        },{
                period: '2018-09-21'
                , Conductores: dia21

        },{
                period: '2018-09-22'
                , Conductores: dia22

        },{
                period: '2018-09-23'
                , Conductores: dia23

        },{
                period: '2018-09-24'
                , Conductores: dia24

        },{
                period: '2018-09-25'
                , Conductores: dia25

        },{
                period: '2018-09-26'
                , Conductores: dia26

        },{
                period: '2018-09-27'
                , Conductores: dia27

        },{
                period: '2018-09-28'
                , Conductores: dia28

        },{
                period: '2018-09-29'
                , Conductores: dia29

        },{
                period: '2018-09-30'
                , Conductores: dia30

        },{
                period: '2018-09-31'
                , Conductores: dia31

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
        , data: apto
        , color: "#9675ce"
    , }, {
        label: "No Aptos"
        , data: noapto
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
    { y: 'Mayo', a: mayo },
    { y: 'Junio', a: junio },
    { y: 'Julio', a: julio },
    { y: 'Agosto', a: agosto},
    { y: 'Septiembre', a: septiembre},
    { y: 'Octubre', a: octubre},
    /*{ y: 'Noviembre', a: noviembre},
    { y: 'Diciembre', a: diciembre},
    { y: 'Enero', a:  enero },
    { y: 'Febrero', a: febrero },
    { y: 'Marzo', a: marzo},
    { y: 'Abril', a: abril}*/
  ],
  xkey: 'y',
  ykeys: ['a'],
  labels: ['Conductores',]
});
</script>
