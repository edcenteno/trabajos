<!--**********************************
    Sidebar start
***********************************-->
<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Dashboard</li>
            <li class="has-arrow">
                <?php
                        if ($_SESSION['id_rol'] == '5c2f826ea6bbfc38cc6478d1') {
                           echo '<a class="has-arrow" href="dashboard" aria-expanded="false">';
                        }else{
                            echo '<a class="has-arrow" href="inicio" aria-expanded="false">';
                        }

                    ?>

                    <i class="mdi mdi-view-dashboard"></i><span class="nav-text">Dashboard</span>
                </a>

            </li>

            <li class="nav-label">Empresas</li>
            <li class="has-arrow">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="mdi mdi-office-building"></i><span class="nav-text">Empresas</span>
                </a>
                <ul aria-expanded="false">
                    <?php
                        if ($_SESSION['id_rol'] == '5c2f826ea6bbfc38cc6478d1') {
                           echo '<li><a href="clientes">Clientes</a></li>';
                        }

                    ?>

                    <li><a href="usuarios">Usuarios</a></li>

                </ul>
            </li>
            <li class="nav-label">Personas</li>
            <li class="has-arrow">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="mdi mdi-office-building"></i><span class="nav-text">Personas</span>
                </a>
                <ul aria-expanded="false">


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
