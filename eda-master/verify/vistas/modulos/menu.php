<!--**********************************
    Sidebar start
***********************************-->
<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Dashboard</li>
            <li class="mega-menu mega-menu-lg">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="mdi mdi-view-dashboard"></i><span class="nav-text">Dashboard</span>
                </a>

            </li>
            <?php
               /* if ($_SESSION['rol'] == ) {
                    # code...
                }*/

            ?>
            <li class="nav-label">Empresas</li>
            <li class="mega-menu mega-menu-lg">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="mdi mdi-office-building"></i><span class="nav-text">Empresas</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="clientes">Clientes</a></li>
                    <li><a href="usuarios">Usuarios</a></li>

                </ul>
            </li>
            <li class="nav-label">Personas</li>
            <li class="mega-menu mega-menu-lg">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="mdi mdi-office-building"></i><span class="nav-text">Personas</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="configuracion">Configuracion</a></li>
                    <li><a href="personas">Personas</a></li>
                   <!--  <li><a href="usuarios">Usuarios</a></li> -->

                </ul>
            </li>
        </ul>
    </div>
</div>
<!--**********************************
    Sidebar end
***********************************-->
<!--**********************************
Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col p-md-0">
                <h4>Verify</h4>
            </div>
