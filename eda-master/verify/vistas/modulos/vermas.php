<?php
//use Controladores\ControladorConductor;
    $persona =$_GET['idpersonas'];
    $item = "dni";
    $valor = $persona;

    $unapersona = ControladorPersonas::ctrMostrarPersonas($item, $valor);
    $antecedentes = ControladorAntecedentes::ctrMostrarAntecedentes($item, $valor);

    foreach ($unapersona as $key => $value){
?>
<div class="col p-md-0">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Personas</a>
        </li>
        <li class="breadcrumb-item active">Personas</li>
    </ol>
</div>
</div>
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="user-skill">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="user-profile">
                                <h4 class="text-primary section-heading card-intro-title">Perfil</h4>
                                <div class="user-info">
                                    <ul>
                                        <li>
                                            <h5>Nombre</h5>
                                            <p><?php echo $value['nombre'] ." " . $value['apellido']; ?></p>
                                        </li>
                                        <li>
                                            <h5>DNI</h5>
                                            <p><?php echo $value['dni']; ?></p>
                                        </li>
                                        <li>
                                            <h5>Fecha de Nacimiento</h5>
                                            <p><?php echo $fechanac = $value['fechanacimiento']; ?></p>
                                        </li>
                                        <li>
                                            <h5>Edad</h5>
                                            <p>
                                                <?php
                                                   $rest = substr("$fechanac", 6);
                                                   $fecha = date('Y');
                                                   $edad = $fecha-$rest;

                                                 if ($edad != $fecha) {
                                                    echo $edad;
                                                 }
                                                ?>

                                            </p>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                        <?php
                            foreach ($antecedentes as $key => $antecedentesvalue){
                        ?>
                        <div class="col-lg-8">
                            <div class="user-skillset" id="antecedentes">
                                <h4 class="text-primary section-heading card-intro-title">Antecedentes</h4>
                                <div class="skill-progressbars">
                                    <div class="mt-5">
                                        <div class="d-flex justify-content-between mb-3 progress-label">
                                            <h3>Antecedentes Penales</h3>

                                            <?php
                                                if ($antecedentesvalue['ant_penales']=='POSITIVO') {
                                            ?>
                                                   <h3 class="text-danger"><?php echo $antecedentesvalue['ant_penales']; ?></h3>
                                            <?php
                                                } else {
                                            ?>
                                                   <h3 class="text-success"><?php echo $antecedentesvalue['ant_penales']; ?></h3>
                                            <?php
                                                }

                                            ?>

                                        </div>

                                    </div>
                                    <div class="mt-5">
                                        <div class="d-flex justify-content-between mb-3 progress-label">
                                            <h3>Antecedentes Judiciales</h3>

                                            <?php
                                                if ($antecedentesvalue['ant_judicial']=='POSITIVO') {
                                            ?>
                                                   <h3 class="text-danger"><?php echo $antecedentesvalue['ant_judicial']; ?></h3>
                                            <?php
                                                } else {
                                            ?>
                                                   <h3 class="text-success"><?php echo $antecedentesvalue['ant_judicial']; ?></h3>
                                            <?php
                                                }

                                            ?>

                                        </div>

                                    </div>
                                    <div class="mt-5">
                                        <div class="d-flex justify-content-between mb-3 progress-label">
                                            <h3>Antecedentes Policiales</h3>

                                            <?php
                                                if ($antecedentesvalue['ant_policial']=='POSITIVO') {
                                            ?>
                                                   <h3 class="text-danger"><?php echo $antecedentesvalue['ant_policial']; ?></h3>
                                            <?php
                                                } else {
                                            ?>
                                                   <h3 class="text-success"><?php echo $antecedentesvalue['ant_policial']; ?></h3>
                                            <?php
                                                }

                                            ?>

                                        </div>

                                    </div>
                                    <div class="mt-5">
                                        <div class="d-flex justify-content-between mb-3 progress-label">
                                            <h3>Observación</h3>

                                            <?php
                                                if ($antecedentesvalue['observacion'] !='') {
                                            ?>
                                                   <h3 class="text-warning"><?php echo $antecedentesvalue['observacion']; ?></h3>
                                            <?php
                                                } else {
                                            ?>
                                                   <h3 class="text-success"><?php echo $antecedentesvalue['observacion']; ?></h3>
                                            <?php
                                                }

                                            ?>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <?php
                    if ($antecedentes>0) {

                ?>
                <div class="user-info-settings" id="antecedentespena">
                    <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Antecedentes</h4>
                        <p class="text-muted"><code></code>
                        </p>
                        <div id="accordion-one" class="accordion">
                            <?php if ($antecedentesvalue['observacionPenales'] != '') {

                             ?>
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0" data-toggle="collapse" data-target="#collapseOne"
                                        aria-expanded="true" aria-controls="collapseOne"><i class="fa"
                                            aria-hidden="true"></i> Antecedentes Penales</h5>
                                </div>
                                <div id="collapseOne" class="collapse show" data-parent="#accordion-one">
                                    <div class="card-body"><?php echo $antecedentesvalue['observacionPenales']; ?></div>
                                </div>
                            </div>
                            <?php
                                }
                            if ($antecedentesvalue['observacionJudicial'] != '') {

                             ?>
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseTwo"
                                        aria-expanded="false" aria-controls="collapseTwo"><i class="fa"
                                            aria-hidden="true"></i> Antecedentes Judiciales</h5>
                                </div>
                                <div id="collapseTwo" class="collapse" data-parent="#accordion-one">
                                    <div class="card-body"><?php echo $antecedentesvalue['observacionJudicial']; ?></div>
                                </div>
                            </div>
                            <?php
                                }
                            if ($antecedentesvalue['observacionPolicial'] != '') {

                             ?>
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseThree"
                                        aria-expanded="false" aria-controls="collapseThree"><i class="fa"
                                            aria-hidden="true"></i> Antecedentes Policiales</h5>
                                </div>
                                <div id="collapseThree" class="collapse" data-parent="#accordion-one">
                                    <div class="card-body"><?php echo $antecedentesvalue['observacionPolicial']; ?></div>
                                </div>
                            </div>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
                </div>
                <?php
                }
                  }
                ?>
                </div>
            </div>
        </div>
            <div class="col-lg-4 my-5 my-lg-0">
                        <div class="card card-full-width rounded-0">
                            <div class="card-body user-details-contact text-center">
                                <div class="user-details-image mb-3">
                                    <img class="rounded-circle" src="vistas/img/plantilla/default.png" alt="image">
                                </div>
                                <div class="user-intro">
                                    <h4 class="text-primary card-intro-title mb-0"><?php echo $value['nombre'] ." " . $value['apellido']; ?></h4>
                                </div>
                                <div class="contact-addresses">
                                    <ul class="contact-address-list">
                                        <li class="email">
                                          <a id="botonantecedentes" href="javascript:void()"><img class="rounded-circle" src="vistas/img/plantilla/antecedentes.png" alt="image" width="30px">

                                            <h5>Antecedentes</h5>
                                         </a>

                                        </li>
                                        <li class="phone">
                                            <a id="botonantecedentes" href="javascript:void()"><img class="rounded-circle" src="vistas/img/plantilla/recordconductor.png" alt="image" width="30px">

                                            <h5>Record Conductores</h5>

                                         </a>
                                        </li>
                                        <!-- <li class="address">
                                            <h5><i class="fa fa-map text-primary" aria-hidden="true"></i> Address</h5>
                                            <p>Kingsburg, California</p>
                                        </li>
                                        <li class="location">
                                            <h5><i class="fa fa-map-marker text-primary" aria-hidden="true"></i> Location</h5>
                                            <div id="location-map"></div>
                                        </li>
                                        <li class="social">
                                            <h5>Social Profile</h5>
                                            <ul class="social-navigation">
                                                <li>
                                                    <a class="bg-facebook" href="javascript:void()"><i class="fa fa-facebook color-white"></i></a>
                                                </li>
                                                <li>
                                                    <a class="bg-instagram" href="javascript:void()"><i class="fa fa-instagram color-white"></i></a>
                                                </li>
                                                <li>
                                                    <a class="bg-twitter" href="javascript:void()"><i class="fa fa-twitter color-white"></i></a>
                                                </li>
                                                <li>
                                                    <a class="bg-youtube" href="javascript:void()"><i class="fa fa-youtube color-white"></i></a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<?php
}
?>

<script type="text/javascript">
    $(document).ready(function(){
        $('#antecedentes').hide();
        $('#antecedentespena').hide();

        $('#botonantecedentes').click(function(){
            $('#antecedentespena').show();
            $('#antecedentes').show();
        });




    });

</script>