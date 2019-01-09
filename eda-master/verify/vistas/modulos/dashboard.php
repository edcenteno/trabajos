<?php
if ($_SESSION['id_rol'] != '5c2f826ea6bbfc38cc6478d1') {
   include "inicio.php";
}else{
require 'graficas/querysarhu.php';
$fecha_actual = date("Y-m-d");

?>
<div class="col p-md-0">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a>
        </li>
        <li class="breadcrumb-item active">Dashboard Arhu</li>
    </ol>
</div>
</div>
</div>
<div class="row">
<?php include 'inicio/cajas-superiores.php' ?>
</div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card total-product-sales mb-0">
                <div class="card-header d-sm-flex pb-0 justify-content-between align-items-center">
                    <h4 class="card-title">Grafica de consultas generadas</h4>
                    <div class="item d-sm-flex align-items-center">
                        <div class="item mr-sm-5 py-4 py-sm-0">
                            <ul class="list ml-4 ml-sm-0 mb-0 text-dark">
                                <li>Mes anterior</li>
                                <li>Mes </li>
                            </ul>
                        </div>
                        <!-- <div class="item d-flex align-items-center pl-4">
                            <label>Category:</label>
                            <div class="form-group border mb-0 ml-2">
                                <select class="selectpicker show-tick" data-width="auto">
                                    <option value="">Camera</option>
                                    <option value="">Audio</option>
                                    <option value="">Smartphone</option>
                                    <option value="">Accessories</option>
                                </select>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="grafica-consulta-general"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card transparent-card mb-0">
                <div class="card-body px-0">
                    <div class="d-sm-flex justify-content-end">
                        <div class="sorting-box d-sm-flex">


                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
<div class="row">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Grafica Mensual</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-body pt-4">
                            <div class="chart">
                                <div id="count-avarage-students"></div>
                            </div>
                        </div>
                        </div>
                        <!-- <div class="col-lg-3 align-items-center d-flex">
                            <div class="map-coruntry-list-electronics">
                                <ul class="d-flex d-lg-block justify-content-around">
                                    <li class="mb-4"><a href="javascript:void()"><i class="fa fa-circle-o text-success"></i>Salvadar</a>
                                    </li>
                                    <li class="mb-4"><a href="javascript:void()"><i class="fa fa-circle-o text-warning"></i>Mongolia</a>
                                    </li>
                                    <li class="mb-4"><a href="javascript:void()"><i class="fa fa-circle-o text-info"></i>Quinsland</a>
                                    </li>
                                    <li class="mb-4"><a href="javascript:void()"><i class="fa fa-circle-o text-secondary"></i>Nigaria</a>
                                    </li>
                                </ul>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Gráfica de Aptos y No Aptos de <?php echo date('M-Y') ?></h4>
                </div>
                <div class="card-body">
                    <canvas id="most-selling-items-electronics" style="margin-bottom: 35px!important;"></canvas>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- #/ container -->
</div>
<script type="text/javascript">
      Morris.Bar({
        element: 'count-avarage-students',
        data: [
            { y: 'Enero', a:  '<?php echo $enero ?>' },
            /*{ y: 'Febrero', a: '<?php echo $febrero ?>' },
            { y: 'Marzo', a: '<?php echo $marzo ?>'},
            { y: 'Abril', a: '<?php echo $abril ?>'},
            { y: 'Mayo', a: '<?php echo $junio ?>' },
            { y: 'Junio', a: '<?php echo $junio ?>' },
            { y: 'Julio', a: '<?php echo $julio ?>' },
            { y: 'Agosto', a: '<?php echo $agosto ?>'},
            { y: 'Septiembre', a: '<?php echo $septiembre ?>'},
            { y: 'Octubre', a: '<?php echo $octubre ?>'},
            { y: 'Noviembre', a: '<?php echo $noviembre ?>'},
            { y: 'Diciembre', a: '<?php echo $diciembre ?>'},*/

            ],
        xkey: 'y',
        ykeys: ['a'],
        labels: ['Personas'],
        barColors: ['#D57FF8', '#FFC107'],
        hideHover: 'auto',
        gridLineColor: '#F5F5F5',
        resize: true,
        barSizeRatio: 0.4
    });




    let draw = Chart.controllers.line.prototype.draw;
    Chart.controllers.line = Chart.controllers.line.extend({
        draw: function() {
            draw.apply(this, arguments);
            let ctx = this.chart.chart.ctx;
            let _stroke = ctx.stroke;
            ctx.stroke = function() {
                ctx.save();
                ctx.shadowColor = '#ccc';
                ctx.shadowBlur = 20;
                ctx.shadowOffsetX = 0;
                ctx.shadowOffsetY = 1;
                _stroke.apply(this, arguments)
                ctx.restore();
            }
        }
    });

    var ctx = document.getElementById("grafica-consulta-general");
     ctx.height = 370;
     anomes = '<?php echo $anomes ?>'
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: [   anomes+'-1',
                        anomes+'-2',
                        anomes+'-3',
                        anomes+'-4',
                        anomes+'-5',
                        anomes+'-6',
                        anomes+'-7',
                        anomes+'-8',
                        anomes+'-9',
                        anomes+'-10',
                        anomes+'-11',
                        anomes+'-12',
                        anomes+'-13',
                        anomes+'-14',
                        anomes+'-15',
                        anomes+'-16',
                        anomes+'-17',
                        anomes+'-18',
                        anomes+'-19',
                        anomes+'-20',
                        anomes+'-21',
                        anomes+'-22',
                        anomes+'-23',
                        anomes+'-24',
                        anomes+'-25',
                        anomes+'-26',
                        anomes+'-27',
                        anomes+'-28',
                        anomes+'-29',
                        anomes+'-30',
                        anomes+'-31'
                    ],
            type: 'line',
            defaultFontFamily: 'Montserrat',
            datasets: [{
                label: "Personas",
                data: [
                        '<?php echo $dia1 ?>',
                        '<?php echo $dia2 ?>',
                        '<?php echo $dia3 ?>',
                        '<?php echo $dia4 ?>',
                        '<?php echo $dia5 ?>',
                        '<?php echo $dia6 ?>',
                        '<?php echo $dia7 ?>',
                        '<?php echo $dia8 ?>',
                        '<?php echo $dia9 ?>',
                        '<?php echo $dia10 ?>',
                        '<?php echo $dia11 ?>',
                        '<?php echo $dia12 ?>',
                        '<?php echo $dia13 ?>',
                        '<?php echo $dia14 ?>',
                        '<?php echo $dia15 ?>',
                        '<?php echo $dia16 ?>',
                        '<?php echo $dia17 ?>',
                        '<?php echo $dia18 ?>',
                        '<?php echo $dia19 ?>',
                        '<?php echo $dia20 ?>',
                        '<?php echo $dia21 ?>',
                        '<?php echo $dia22 ?>',
                        '<?php echo $dia23 ?>',
                        '<?php echo $dia24 ?>',
                        '<?php echo $dia25 ?>',
                        '<?php echo $dia26 ?>',
                        '<?php echo $dia27 ?>',
                        '<?php echo $dia28 ?>',
                        '<?php echo $dia29 ?>',
                        '<?php echo $dia30 ?>',
                        '<?php echo $dia31 ?>'
                       ],
                backgroundColor: 'transparent',
                borderColor: '#71D875',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: '#71D875',
                pointBackgroundColor: '#fff'

            /*}, {
                label: "Pre. Month",
                data: [0, 30, 10, 60, 50, 63, 10, 100, 54, 120, 32, 74],
                backgroundColor: 'transparent',
                borderColor: "#D07BED",
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: '#D07BED',
                pointBackgroundColor: '#fff'*/
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            tooltips: {
                mode: 'index',
                titleFontSize: 12,
                titleFontColor: '#000',
                bodyFontColor: '#000',
                backgroundColor: '#fff',
                titleFontFamily: 'Montserrat',
                bodyFontFamily: 'Montserrat',
                cornerRadius: 3,
                intersect: false,
            },
            legend: {
                display: false,
                labels: {
                    usePointStyle: true,
                    fontFamily: 'Montserrat',
                },
            },
            scales: {
                xAxes: [{
                    display: true,
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    scaleLabel: {
                        display: false,
                        labelString: 'Mes'
                    }
                }],
                yAxes: [{
                    display: true,
                    gridLines: {
                        display: true,
                        drawBorder: false,
                        zeroLineColor: "transparent"
                    },
                    scaleLabel: {
                        display: false,
                        labelString: 'Value'
                    }
                }]
            },
            title: {
                display: false,
                text: 'Normal Legend'
            }
        }
    });

     //doughut chart
     var ctx = document.getElementById("most-selling-items-electronics");
     // ctx.height = 175;
     new Chart(ctx, {
         type: 'doughnut',
         data: {
             datasets: [{
                 data: ['<?php echo $apto ?>', '<?php echo $noapto ?>'],
                 backgroundColor: [
                     "rgba(255,193,7,0.9)",
                     "rgba(0,162,255,0.9)"
                 ],
                 hoverBackgroundColor: [
                     "rgba(255,193,7,0.5)",
                     "rgba(0,162,255,0.5)"
                 ]

             }],
             labels: [
                 "Aptos",
                 "No Aptos"/*,
                 "Grilled Chicken",
                 "Beef Sashimi"*/
             ]
         },
         options: {
             responsive: true,
             cutoutPercentage: 60,
             maintainAspectRatio: false,
             animation: {
                 animateRotate: true,
                 animateScale: true,
             },
             legend: {
                 position: 'right',
                 labels: {
                     usePointStyle: true,
                     fontFamily: "Segoe UI",
                 },


             },
         }
     });



</script>
<?php
}
?>