<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Cabify - Disfruta del viaje</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="icon" href="vistas/img/plantilla/favicon.ico">

   <!--=====================================
  PLUGINS DE CSS
  ======================================-->

  <!-- chartist CSS -->
    <link href="vistas/assets/node_modules/morrisjs/morris.css" rel="stylesheet">
    <!--Toaster Popup message CSS -->
    <link href="vistas/assets/node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="vistas/dist/css/style.min.css" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="vistas/dist/css/pages/dashboard1.css" rel="stylesheet">
    <!-- datatable responsive -->
    <link href="vistas/dt/css/responsive.bootstrap.min.css" rel="stylesheet">

    <!-- page css -->
    <link href="vistas/dist/css/pages/login-register-lock.css" rel="stylesheet">
     <!-- chartist CSS -->
    <link href="vistas/assets/node_modules/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="vistas/assets/node_modules/chartist-js/dist/chartist-init.css" rel="stylesheet">
    <link href="vistas/assets/node_modules/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <link href="vistas/assets/node_modules/css-chart/css-chart.css" rel="stylesheet">
     <!-- Daterange picker -->
     <link rel="stylesheet" href="vistas/assets/node_modules/bootstrap-daterangepicker/daterangepicker.css">
     <!-- Calendar CSS -->
    <link href="vistas/assets/node_modules/calendar/dist/fullcalendar.css" rel="stylesheet" />

    <link href="vistas/dist/css/pages/form-icheck.css" rel="stylesheet">
    <!-- Popup CSS -->
    <link href="vistas/assets/node_modules/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">
<!--     <style>
    .form-control {text-transform: uppercase;}
</style> -->


    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="vistas/assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="vistas/assets/node_modules/popper/popper.min.js"></script>
    <script src="vistas/assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="vistas/dist/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="vistas/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="vistas/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="vistas/dist/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="vistas/assets/node_modules/raphael/raphael-min.js"></script>
    <script src="vistas/assets/node_modules/morrisjs/morris.min.js"></script>
    <script src="vistas/assets/node_modules/morrisjs/morris.js"></script>

    <script src="vistas/assets/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- Popup message jquery -->
    <script src="vistas/assets/node_modules/toast-master/js/jquery.toast.js"></script>
    <script src="vistas/assets/node_modules/chartist-js/dist/chartist.min.js"></script>
    <script src="vistas/assets/node_modules/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="vistas/assets/node_modules/sparkline/jquery.sparkline.min.js"></script>
    <!-- Chart JS -->
    <script src="vistas/assets/node_modules/echarts/echarts-all.js"></script>
    <!-- Chart JS -->
    <script src="vistas/assets/node_modules/flot/excanvas.js"></script>
    <script src="vistas/assets/node_modules/flot/jquery.flot.js"></script>
    <script src="vistas/assets/node_modules/flot/jquery.flot.time.js"></script>
    <script src="vistas/assets/node_modules/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="vistas/dist/js/pages/widget-charts.js"></script>
    <!--This page css - Morris CSS -->
    <link href="vistas/assets/node_modules/morrisjs/morris.css" rel="stylesheet">

    <link href="vistas/dist/css/pages/float-chart.css" rel="stylesheet">
    <!-- page css -->
    <link href="vistas/dist/css/pages/widget-page.css" rel="stylesheet">

    <script src="vistas/js/plantilla.js"></script>
    <!--stickey kit -->
    <script src="vistas/assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="vistas/assets/node_modules/sparkline/jquery.sparkline.min.js"></script>
    <!-- This is data table -->
    <script src="vistas/assets/node_modules/datatables/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="vistas/dt/js/dataTables.buttons.min.js"></script>
    <script src="vistas/dt/js/buttons.flash.min.js"></script>
    <script src="vistas/dt/js/jszip.min.js"></script>
    <script src="vistas/dt/js/pdfmake.min.js"></script>
    <script src="vistas/dt/js/vfs_fonts.js"></script>
    <script src="vistas/dt/js/buttons.html5.min.js"></script>
    <script src="vistas/dt/js/buttons.print.min.js"></script>
    <script src="vistas/dt/js/dataTables.responsive.min.js"></script>
    <script src="vistas/dt/js/responsive.bootstrap.min.js"></script>
    <script src="vistas/assets/node_modules/gauge/gauge.min.js"></script>

    <script src="vistas/dist/js/pages/widget-data.js"></script>

    <script src="vistas/dist/js/pages/mask.js"></script>
    <!-- Flot Charts JavaScript -->
    <script src="vistas/assets/node_modules/flot/excanvas.js"></script>
    <script src="vistas/assets/node_modules/flot/jquery.flot.js"></script>
    <script src="vistas/assets/node_modules/flot/jquery.flot.pie.js"></script>
    <script src="vistas/assets/node_modules/flot/jquery.flot.time.js"></script>
    <script src="vistas/assets/node_modules/flot/jquery.flot.stack.js"></script>
    <script src="vistas/assets/node_modules/flot/jquery.flot.crosshair.js"></script>
    <script src="vistas/assets/node_modules/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>

    <!-- daterangepicker http://www.daterangepicker.com/-->
    <script src="vistas/assets/node_modules/moment/min/moment.min.js"></script>
    <script src="vistas/assets/node_modules/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Calendar JavaScript -->
    <script src="vistas/assets/node_modules/calendar/jquery-ui.min.js"></script>
    <script src="vistas/assets/node_modules/moment/moment.js"></script>
    <script src='vistas/assets/node_modules/calendar/dist/fullcalendar.min.js'></script>
    <script src="vistas/assets/node_modules/calendar/dist/cal-init.js"></script>
    <!-- icheck -->
    <script src="vistas/assets/node_modules/icheck/icheck.min.js"></script>
    <script src="vistas/assets/node_modules/icheck/icheck.init.js"></script>

     <!-- Magnific popup JavaScript -->
    <script src="vistas/assets/node_modules/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>
    <script src="vistas/assets/node_modules/Magnific-Popup-master/dist/jquery.magnific-popup-init.js"></script>
    <!-- SweetAlert 2 -->
    <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>
    <!-- end - This is for export functionality only -->

    </head>

<!--=====================================
CUERPO DOCUMENTO
======================================-->

<body class="skin-blue fixed-layout">

  <?php

  if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){


    /*=============================================
    CABEZOTE
    =============================================*/

    include "modulos/cabezote.php";

    /*=============================================
    MENU
    =============================================*/

    include "modulos/menu.php";
    echo '<div class="page-wrapper">';


    /*=============================================
    CONTENIDO
    =============================================*/
    //include "modulos/contenido.php";
    if(isset($_GET["ruta"])){

      if($_GET["ruta"] == "inicio" ||
         $_GET["ruta"] == "usuarios" ||
         $_GET["ruta"] == "conductores" ||
         $_GET["ruta"] == "busqueda" ||
         $_GET["ruta"] == "listado" ||
         $_GET["ruta"] == "vermas" ||
         $_GET["ruta"] == "rrhh" ||
         $_GET["ruta"] == "consultas-basicas" ||
         $_GET["ruta"] == "reporte-diario" ||
         $_GET["ruta"] == "conductorescabify" ||
         $_GET["ruta"] == "conductoreseasy" ||
         $_GET["ruta"] == "conductoressoat" ||
         $_GET["ruta"] == "salir"){

       include "modulos/".$_GET["ruta"].".php";

     }else{

        include "modulos/404.php";

      }
    }else{

      include "modulos/inicio.php";

    }

    /*=============================================
    FOOTER
    =============================================*/
    echo '</div>';
    include "modulos/footer.php";



  }else{

    include "modulos/login.php";

  }

  ?>


<script src="vistas/js/plantilla.js"></script>
<script src="vistas/js/usuarios.js"></script>
<script src="vistas/js/conductores.js"></script>
<script src="vistas/js/prospectos.js"></script>
<script src="vistas/js/datapicker.js"></script>
<script src="vistas/js/ModalCapture.js"></script>

</body>
</html>
