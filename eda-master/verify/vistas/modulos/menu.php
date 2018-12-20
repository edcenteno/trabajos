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
                        <li><a href="configuracion"><i class="fa fa-cog"></i> Configuración</a></li>
                        <li><a href="salir"><i class="fa fa-power-off"></i> Cerrar sesión</a></li>
                    </ul>
                </li>
                <li class="nav-small-cap">--- PERSONAL</li>

                <li> <a class="waves-effect waves-dark" href="inicio" aria-expanded="false"><i class="icon-speedometer">    </i><span class="hide-menu">Dashboard </span></a>
                </li>
                <?php

                    if($_SESSION["perfil"] =="Administrador"){
                        echo '
                              <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                  <i class="ti fa fa-building"></i><span class="hide-menu">Empresas</span></a>
                                  <ul aria-expanded="false" class="collapse">
                                      <li><a href="clientes"><i class="ti fa fa-id-card"></i> Clientes</span></a></li>
                                      <li><a href="usuarios"><i class="ti fa fa-user"></i> Usuarios</span></a></li>

                                  </ul>
                              </li>';
                    }

                   /* if($_SESSION["perfil"] =="Administrador"){
                              echo '

                                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                  <i class="ti fa fa-search"></i><span class="hide-menu"> Provincias</span></a>
                                  <ul aria-expanded="false" class="collapse">

                                      <li><a href="busqueda-arequipa"><i class="ti fa fa-map-marker"></i> Arequipa</span></a></li>
                                      <li><a href="busqueda-chiclayo"><i class="ti fa fa-map-marker"></i> Chiclayo</span></a></li>
                                      <li><a href="busqueda-cusco"><i class="ti fa fa-map-marker"></i> Cusco</span></a></li>
                                      <li><a href="busqueda-lima"><i class="ti fa fa-map-marker"></i> Lima</span></a></li>
                                      <li><a href="busqueda-piura"><i class="ti fa fa-map-marker"></i> Piura</span></a></li>
                                      <li><a href="busqueda-trujillo"><i class="ti fa fa-map-marker"></i> Trujillo</span></a></li>
                                  </ul>
                              </li>';
                          }
*/

                ?>

                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                    <i class="ti fa fa-list"></i><span class="hide-menu"> Personas</span></a>
                    <ul aria-expanded="false" class="collapse">

                        <?php
                            if($_SESSION["perfil"] =="Administrador"){
                                echo '
                                      <li><a href="individuos"><i class="ti fa fa-search"></i> Administrar</span></a></li>
                                      <li><a href="busqueda"><i class="ti fa fa-car"></i> Busqueda</span></a></li>
                                     <!-- <li><a href="conductoresactualizados"><i class="ti fa fa-car"></i> Actualizados</span></a></li>-->
                                      <li><a href="conductoressoat"><i class="ti fa fa-car"></i> SOAT Vencidos</span></a></li>';
                            }

                            if($_SESSION["perfil"] =="Operador" || $_SESSION["perfil"] =="CallCenter"){
                                echo '
                                      <li><a href="conductoresprovincia"><i class="ti fa fa-search"></i> Administrar</span></a></li>
                                      <li><a href="busqueda"><i class="ti fa fa-car"></i> Busqueda</span></a></li>
                                     <!-- <li><a href="conductoresactualizados"><i class="ti fa fa-car"></i> Actualizados</span></a></li>-->
                                      <li><a href="conductoressoat"><i class="ti fa fa-car"></i> SOAT Vencidos</span></a></li>';
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
                <?php
                 if($_SESSION["perfil"] =="Administrador"){
                    echo '
                            <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <i class="ti fa fa-list"></i><span class="hide-menu"> Seguimiento</span></a>
                                <ul aria-expanded="false" class="collapse">


                                      <li><a href="conductoreshistorial"><i class="ti fa fa-search"></i> Administrar</span></a></li>
                                      <li><a href="busqueda-historial"><i class="ti fa fa-car"></i> Busqueda</span></a></li>
                                    <!--  <li><a href="conductoresactualizadosadmin"><i class="ti fa fa-car"></i> Actualizados</span></a></li>-->
                                    </li>
                                  </ul>

                             ';
                            }


                    ?>

            </ul>
        </nav>
    </div>
</aside>
