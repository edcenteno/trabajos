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
    </head>
    <body>
     <?php

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
           $_GET["ruta"] == "listado" ||
           $_GET["ruta"] == "vermas" ||
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
</body>
</html>