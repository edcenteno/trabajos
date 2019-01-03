<html id="login-page2">

<body class="h-100">
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <div class="login-bg2 h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-between h-100">
                <div class="col-xl-4">
                    <div class="login-info">
                        <h2>Gestiona tu solicitud</h2>
                        <p class="mb-5"></p>
                        <h5>Teléfono: +51 999 999 999 </h5>
                        <h5>Email: algo@example.com</h5>
                    </div>
                </div>
                <div class="col-xl-3 p-0">
                    <div class="form-input-content login-form bg-white">
                        <div class="card">
                            <div class="card-body">
                                <div class="logo text-center">
                                    <a href="index.html">
                                        <img src="vistas/img/plantilla/logoverifyc.png" width="331px" alt="">
                                    </a>
                                </div>
                                <h4 class="text-center mt-4">Ingrese a su cuenta administrador</h4>
                                <form class="mt-5 mb-5">
                                    <div class="form-group">
                                        <label>RUC</label>
                                        <input type="text" class="form-control" placeholder="RUC" required name="ingRuc">
                                    </div>
                                    <div class="form-group">
                                        <label>Usuario</label>
                                        <input type="text" class="form-control" placeholder="Usuario" required name="ingUsuario">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" placeholder="Password" required name="ingPassword">
                                    </div>
                                    <div class="text-center mb-4 mt-4">
                                        <button type="submit" class="btn btn-primary">Sign in</button>
                                    </div>
                                    <?php
                                        $login = new ControladorUsuarios();
                                        $login -> ctrIngresoUsuario();
                                    ?>
                                </form>
                                <div class="text-center">
                                    <h5 class="mb-5"></h5>
                                    <ul class="list-inline">
                                        <li class="list-inline-item m-t-10"><a href="javascript:void()" class="btn btn-facebook"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <li class="list-inline-item m-t-10"><a href="javascript:void()" class="btn btn-twitter"><i class="fa fa-twitter"></i></a>
                                        </li>
                                        <li class="list-inline-item m-t-10"><a href="javascript:void()" class="btn btn-linkedin"><i class="fa fa-linkedin"></i></a>
                                        </li>
                                        <li class="list-inline-item m-t-10"><a href="javascript:void()" class="btn btn-google-plus"><i class="fa fa-google-plus"></i></a>
                                        </li>
                                    </ul>
                                    <p class="mt-5">¿No eres Aministrador? <a href="javascript:void()">Ingresar como Operador</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>