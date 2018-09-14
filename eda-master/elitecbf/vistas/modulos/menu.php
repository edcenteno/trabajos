<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="user-pro"> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                     <?php

                    if($_SESSION["foto"] != ""){

                        echo '<img src="'.$_SESSION["foto"].'" class="img-circle">';

                    }else{


                        echo '<img src="vistas/img/usuarios/default/anonymous.png" class="img-circleimg-circle">';

                    }


                    ?>
                    <span class="hide-menu"><?php  echo $_SESSION["nombre"]; ?></span>
                </a>
                    <ul aria-expanded="false" class="collapse">
                        <!-- <li><a href="javascript:void(0)"><i class="ti-settings"></i> Configuración de cuenta</a></li> -->
                        <li><a href="javascript:void(0)"><i class="fa fa-power-off"></i> Cerrar sesión</a></li>
                    </ul>
                </li>
                <li class="nav-small-cap">--- PERSONAL</li>

                <li> <a class="waves-effect waves-dark" href="inicio" aria-expanded="false"><i class="icon-speedometer">    </i><span class="hide-menu">Dashboard </span></a>
                </li>
                <?php

                    if($_SESSION["perfil"] =="Administrador"){
                        echo '
                              <li> <a class="waves-effect waves-dark" href="usuarios" aria-expanded="false"><i class="ti fa fa-user"></i><span class="hide-menu">Usuarios</span></a>
                              </li>';
                    }
                ?>

                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                    <i class="ti fa fa-list"></i><span class="hide-menu"> Conductores</span></a>
                    <ul aria-expanded="false" class="collapse">

                        <?php
                            if($_SESSION["perfil"] =="Administrador" || $_SESSION["perfil"] =="Operador"){
                                echo '
                                      <li><a href="conductores"><i class="ti fa fa-search"></i> Administrar</span></a></li>
                                      <li><a href="busqueda"><i class="ti fa fa-car"></i> Busqueda</span></a></li>
                                      <li><a href="conductoresactualizados"><i class="ti fa fa-car"></i> Actualizados</span></a></li>';
                            }

                            if($_SESSION["perfil"] =="Administrador" || $_SESSION["perfil"] =="RRHH"){
                                echo '
                                      <li><a href="rrhh"><i class="ti-notepad"></i> RRHH</span></a></li>';
                            }

                            /*if($_SESSION["perfil"] =="Administrador" || $_SESSION["perfil"] =="Call"){
                                echo '
                                      <li><a href="consultas-basicas"><i class="ti-folder"></i> Consulta Básica</span></a></li>';
                            } */
                        ?>

                    </ul>
                </li>

            </ul>
        </nav>
    </div>
</aside>
