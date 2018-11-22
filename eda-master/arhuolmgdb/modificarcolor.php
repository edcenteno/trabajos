<?php
require 'scripts.php';

require 'modeloconductor.php'; //


$id = $_GET['id'];

  $params = ([
              'dni'=>$id
            ]);
$unconductor = ModeloConductor::one($params);

foreach ($unconductor as $key => $row){

$dni=$row['dni'];
$pdf=$row['pdf'];
$blacklist=$row['blacklist'];
/*var_dump($pdf);*/
?>
<html lang="es">

<head>
  <title>ARHU Internacional</title>
  <link rel="shortcut icon" href="img/favicon.ico" type="image/ico" />

</head>

<body>
  <div class="container">
    <div class="row">
      <h2 style="text-align:center"></h2>
    </div>
    <div class="col-sm-12">
      <div class="card text-left">
        <div class="card-header">
          ARHU INTERNACIONAL
        </div>
        <div class="card-body">


         <form class="form-horizontal" method="POST" action="modif_color2.php" autocomplete="off" style="border-collapse: separate; border-spacing: 10px 5px;">
           <input type="hidden" name="cont"  value="<?php echo $_GET['id']?>">


           <div class="row">
            <div class="col-6 col-sm-4">

             <div class="form-group">
              <label for="dni">DNI:</label>
              <input type="text" name="dni" readonly class="form-control" id="dni"
              value="<?php echo $dni ?>">
            </div>

            <div class="form-group">
              <label for="nombre">Nombre: </label>
              <input type="text" name="nombre" readonly class="form-control" id="nombre" placeholder="Nombre" value="<?php echo $row['nombre'] ?>">
            </div>

            <div class="form-group">
              <label for="apellido">Apellido: </label>
              <input type="text" name="apellido" readonly class="form-control" id="apellido" placeholder="Apellido" value="<?php echo $row['apellido'] ?>">
            </div>

            <div class="form-group">
              <label for="placa">Placa: </label>
              <input type="text" name="placa" class="form-control" id="placa" placeholder="Placa" value="<?php echo $row['placa'] ?>">
            </div>
            <div class="form-group">

              <input type="text" name="placaoriginal" hidden readonly class="form-control" id="placaoriginal" value="<?php echo $row['placa'] ?>">
            </div>

          </div>
            <div class="col-6 col-sm-4">

            <div class="form-group">
              <label for="usuario_reg">Operador: </label>
              <input type="text" name="usuario_reg" readonly class="form-control" id="usuario_reg" placeholder="Operador"  value="<?php echo $row['usuario_reg'] ?>" required="">
            </div>
            <div class="form-group">
              <label for="color_vehiculo">Color del Vehiculo: </label>
              <input type="text" name="color_vehiculo" class="form-control" id="color_vehiculo" placeholder="Color del Vehiculo"  value="<?php echo $row['color_vehiculo'] ?>" >
            </div>
            <div class="form-group">
              <label for="fecha_fab_veh">Año de Fabricación del Vehiculo: </label>
              <input type="text" name="fecha_fab_veh" class="form-control" id="fecha_fab_veh" placeholder="Año de Fabricación del Vehiculo"  value="<?php echo $row['fecha_fab_veh'] ?>">
            </div>


            <div class="form-group">
             <input class="form-group-input" type="checkbox" name="placanoex" id="placanoex" value="1">
                <label class="form-group-label" for="exampleRadios1">
                  Placa no EXISTE
                </label>

            </div>

          </div>
          <?php
            }
          ?>
          </div>

            <div class="form-group">
             <div class="col-sm-offset-2 col-sm-10">
              <a href="color.php" class="btn btn-warning">Regresar</a>

              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    <?php require 'footer.php' ?>
  </div>
</body>
</html>
