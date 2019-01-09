<!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
   <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo"><a href="inicio"><b><img src="vistas/img/plantilla/verifyblanco.png" alt=""  height="50px"> </b><span class="brand-title"><img src="vistas/img/plantilla/logo_blanco.png" alt="" height="40px"></span></a>
            </div>
            <div class="nav-control">
                <div class="hamburger"><span class="line"></span>  <span class="line"></span>  <span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->
     <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">

                <div class="header-right">
                    <ul>
                        <li class="icons">

                        <li class="icons">
                            <a href="javascript:void(0)" class="log-user">
                                <?php

                                    if($_SESSION["foto"] != ""){

                                        echo '<img src="'.$_SESSION["foto"].'" class="user-image">';

                                    }else{


                                        echo '<img src="vistas/img/usuarios/default/anonymous.png" class="user-image">';

                                    }


                                    ?>
                            <span><?php  echo $_SESSION["nombre"]; ?></span>  <i class="fa fa-caret-down f-s-14" aria-hidden="true"></i>
                            </a>
                            <div class="drop-down dropdown-profile animated bounceInDown">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <!-- <li><a href="javascript:void()"><i class="icon-user"></i> <span>My Profile</span></a>
                                        </li>
                                        <li><a href="javascript:void()"><i class="icon-wallet"></i> <span>My Wallet</span></a>
                                        </li>
                                        <li><a href="javascript:void()"><i class="icon-envelope"></i> <span>Inbox</span></a>
                                        </li> -->
                                        <?php
                                            if ($_SESSION['id_rol'] == '5c2f8290a6bbfc38cc6478d2') {
                                               echo '<li><a href="configuracion"><i class="fa fa-cog"></i> <span>Configuración</span></a></li>';
                                            }
                                        ?>
                                        <!-- <li><a href="javascript:void()"><i class="icon-lock"></i> <span>Lock Screen</span></a>
                                        </li> -->
                                        <li><a href="salir"><i class="icon-power"></i> <span>Cerrar Sesión</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end
        ***********************************-->
