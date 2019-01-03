<!DOCTYPE html>
<html dir="ltr" lang="en" class="no-outlines">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- ==== Document Title ==== -->
    <title>Verify</title>

    <!-- ==== Document Meta ==== -->
    <meta name="author" content="Edgar Centeno">
    <meta name="description" content="verify, arhu internacional">
    <meta name="keywords" content="verify, arhu internacional">

    <!-- ==== Favicon ==== -->
    <link rel="icon" href="vistas/img/plantilla/logoverify.png">

    <!-- ==== Google Font ==== -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700%7CMontserrat:400,500">

    <!-- Stylesheets -->
    <link href="vistas/main/css/style.css" rel="stylesheet">
    <link href="vistas/DataTable/datatables.min.css" rel="stylesheet">

    <!-- check-->
   <link rel="stylesheet" href="vistas/assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css">
    <link rel="stylesheet" href="vistas/assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css">
    <link href="vistas/assets/plugins/innoto-switchery/dist/switchery.min.css" rel="stylesheet"/>
    </head>
    <body>
    <?php

    /* if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){*/

     /*=============================================
    CABEZOTE
    =============================================*/

    include "modulos/cabezote.php";

    /*=============================================
    MENU
    =============================================*/

    include "modulos/menu.php";
    echo '<div class="main-wrapper">';


    /*=============================================
    CONTENIDO
    =============================================*/
   // include "modulos/contenido.php";
    if(isset($_GET["ruta"])){

        if($_GET["ruta"] == "inicio" ||
           $_GET["ruta"] == "usuarios" ||
           $_GET["ruta"] == "individuos" ||
           $_GET["ruta"] == "configuracion" ||
           $_GET["ruta"] == "busqueda" ||
           $_GET["ruta"] == "configuracion" ||
           $_GET["ruta"] == "personas" ||
           $_GET["ruta"] == "vermascliente" ||
           $_GET["ruta"] == "reporte-diario" ||
           $_GET["ruta"] == "clientes" ||
           $_GET["ruta"] == "salir"){

       include "modulos/".$_GET["ruta"].".php";

     }else{

        include "modulos/404.php";

      }    }else{

      include "modulos/inicio.php";

    }

    /*=============================================
    FOOTER
    =============================================*/
    echo '</div>';
   // include "modulos/footer.php";

  /*}else{

      include "modulos/login.php";

    }*/


?>

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="vistas/assets/plugins/common/common.min.js"></script>
    <script src="vistas/main/js/custom.min.js"></script>
    <script src="vistas/main/js/settings.js"></script>
    <script src="vistas/main/js/gleek.js"></script>
    <script src="vistas/main/js/styleSwitcher.js"></script>
    <script src="vistas/assets/plugins/chart.js/Chart.bundle.min.js"></script>
    <script src="vistas/main/js/plugins-init/chartjs-init.js"></script>
    <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>



    <script src="vistas/dt/js/dataTables.buttons.min.js"></script>
    <script src="vistas/dt/js/buttons.flash.min.js"></script>
    <script src="vistas/dt/js/jszip.min.js"></script>
    <script src="vistas/dt/js/pdfmake.min.js"></script>
    <script src="vistas/dt/js/vfs_fonts.js"></script>
    <script src="vistas/dt/js/buttons.html5.min.js"></script>
    <script src="vistas/dt/js/buttons.print.min.js"></script>
    <script src="vistas/dt/js/dataTables.responsive.min.js"></script>
    <script src="vistas/dt/js/responsive.bootstrap.min.js"></script>
    <script src="vistas/dt/js/jquery.dataTables.min.js"></script>
    <script src="vistas/DataTable/datatables.min.js"></script>


    <script src="vistas/assets/plugins/innoto-switchery/dist/switchery.min.js"></script>
    <script src="vistas/assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js"></script>
    <script src="vistas/assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>

    <script src="vistas/main/js/plugins-init/switchery-init.js"></script>
    <script src="vistas/main/js/plugins-init/bootstrap-touchpin-init.js"></script>
    <script src="vistas/main/js/plugins-init/bootstrap-tagsinput-init.js"></script>


    <script src="vistas/js/clientes.js"></script>
    <script src="vistas/js/usuarios.js"></script>
    <script src="vistas/js/personas.js"></script>
</body>
</html>