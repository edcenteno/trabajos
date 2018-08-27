<div class="col-lg-6">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Gráfica de Actualizados  <?php echo date('M-Y') ?></h4>
            <div id="morris-donut-chart"></div>
        </div>
    </div>
</div>

<script type="text/javascript">

    // ==============================================================
    // Variables Apto - no aptos
    // ==============================================================

    var act_cbf = <?php echo json_encode($act_cbf)?>  ;
    var act_cbf = parseInt(act_cbf[0].act_cbf);

    var act_easy = <?php echo json_encode($act_easy)?>;
    var act_easy = parseInt(act_easy[0].act_easy);

    Morris.Donut({
        element: 'morris-donut-chart',
        data: [{
            label: "Cabify",
            value: act_cbf,

        }, {
            label: "EasyTaxi",
            value: act_easy
        }],
        resize: true,
        colors:['#875cf4', '#ffa519']
    });

</script>