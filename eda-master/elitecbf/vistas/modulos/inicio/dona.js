    // ==============================================================
    // Variables Apto - no aptos
    // ==============================================================

    var act_cbf = <?php echo json_encode($act_cbf)?>  ;
    var act_cbf = parseInt(act_cbf[0].act_cbf);

    var act_easy = <?php echo json_encode($act_easy)?>;
    var act_easy = parseInt(act_easy[0].act_easy);

// Dashboard 1 Morris-chart
$(function () {
    "use strict";
 // Morris donut chart

    Morris.Donut({
        element: 'morris-donut-chart',
        data: [{
            label: "Cabify",
            value: 12,

        }, {
            label: "EasyTaxi",
            value: 30
        }, {
            label: "Mail-Order Sales",
            value: 20
        }],
        resize: true,
        colors:['#009efb', '#55ce63', '#2f3d4a']
    });


 });