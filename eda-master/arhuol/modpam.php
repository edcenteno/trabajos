<?php
require 'conexion.php';
require 'scripts.php';


$id = $_GET['id'];

$sql = "SELECT * FROM conductores WHERE cont = '$id'";
$resultado = $mysqli->query($sql);
$row = $resultado->fetch_array(MYSQLI_ASSOC);
$dni=$row['dni'];

$blacklist=$row['blacklist'];

?>
<html lang="es">

<head>
  <title>ARHU Internacional</title>
  <link rel="shortcut icon" href="img/favicon.ico" type="image/ico" />

  <script type="text/javascript">

     $(document).ready(function(){
          $('.targetpolicial').hide();
          $('.targetjudicial').hide();
          $('.targetpenales').hide();

          $('#soat').on("change",function(e){
            if (e.target.value=='VIGENTE'||e.target.value=='VENCIDO'){
              $('.targetpolicial').show();
            }else if (e.target.value=='El vehiculo consultado no posee SOAT') {
              $('.targetpolicial').find('input, textarea').val('');
              $('.targetpolicial').hide();
            }
          });



    });


  </script>

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


         <form class="form-horizontal" method="POST" action="modif_pam2.php" autocomplete="off" style="border-collapse: separate; border-spacing: 10px 5px;">
           <input type="hidden" name="cont"  value="<?php echo $_GET['id']?>">

           <div class="row">
            <div class="col-6 col-sm-4">

             <div class="form-group">
              <label for="dni">DNI:</label>
              <input type="text" name="dni" class="form-control" id="dni"
              value="<?php echo $dni ?>" readonly>
            </div>

            <div class="form-group">
              <label for="nombre">Nombre: </label>
              <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre" value="<?php echo $row['nombre'] ?>" readonly>
            </div>

            <div class="form-group">
              <label for="apellido">Apellido: </label>
              <input type="text" name="apellido" class="form-control" id="apellido" placeholder="Apellido" value="<?php echo $row['apellido'] ?>" readonly>
            </div>

            <div class="form-group">
              <label for="placa">Placa: </label>
              <input type="text" name="placa" class="form-control" id="placa" placeholder="Placa" value="<?php echo $row['placa'] ?>" readonly>
            </div>
          </div>
          <div class="col-6 col-sm-4">
            <div class="form-group">
              <label for="soat">SOAT: </label>
              <div class="form-group">
                <select class="form-control" id="soat" name ="soat">
                  <option> <?php echo $row['soat'] ?></option>
                  <option value="VIGENTE">VIGENTE</option>
                  <option value="VENCIDO">VENCIDO</option>
                  <option value="El vehiculo consultado no posee SOAT">El vehiculo consultado no posee SOAT</option>
                </select>
              </div>
              <div class="form-group targetpolicial">
                <label for="fecha_inicio_soat">Fecha Inicio: </label>
                <input type="text" name="fecha_inicio_soat" class="form-control" id="fecha_inicio_soat" placeholder="fecha inicio soat" value="<?php echo $row['fecha_inicio_soat'] ?>">

                <label for="fecha_fin_soat">Fecha Fin: </label>
                <input type="text" name="fecha_fin_soat" class="form-control" id="fecha_fin_soat" placeholder="fecha fin soat" value="<?php echo $row['fecha_fin_soat'] ?>">

                <label for="nombrecompania">Nombre Compañia: </label>
                <div class="form-group">
                <select class="form-control" id="nombrecompania" name ="nombrecompania">
                  <option value=""></option>
                  <option value="La Positiva">La Positiva</option>
                  <option value="Interseguro">Interseguro</option>
                  <option value="Pacifico Seguros">Pacifico Seguros</option>
                  <option value="Rimac Seguros">Rimac Seguros</option>
                  <option value="Mapfre PerÃº">Mapfre Perú</option>
                  <option value="Bnp Paribas Cardif">Bnp Paribas Cardif</option>
                  <option value="Protecta">Protecta</option>
                </select>
              </div>

                <label for="numeropoliza">Numero Poliza: </label>
                <input type="text" name="numeropoliza" class="form-control" id="numeropoliza" placeholder="numero poliza" value="<?php echo $row['numeropoliza'] ?>">

                <label for="NombreUsoVehiculo">Nombre Uso Vehiculo: </label>
                <input type="text" name="NombreUsoVehiculo" class="form-control" id="NombreUsoVehiculo" placeholder="Nombre Uso Vehiculo" value="<?php echo $row['NombreUsoVehiculo'] ?>">

                <label for="nombreclasevehiculo">Nombre Clase Vehiculo: </label>
                <input type="text" name="nombreclasevehiculo" class="form-control" id="nombreclasevehiculo" placeholder="Nombre Clase Vehiculo" value="<?php echo $row['nombreclasevehiculo'] ?>">

                <label for="FechaControlPolicial">Fecha Control Policial: </label>
                <input type="text" name="fechacontrolpolicial" class="form-control" id="fechacontrolpolicial" placeholder="Fecha Control Policial" value="<?php echo $row['fechacontrolpolicial'] ?>">

                <label for="TipoCertificado">Tipo Certificado: </label>
                <input type="text" name="TipoCertificado" class="form-control" id="TipoCertificado" placeholder="Tipo Certificado" value="<?php echo $row['TipoCertificado'] ?>">

              </div>
            </div>
          </div>
          <div class="col-6 col-sm-4">
            <div class="form-group">
          <label for="resultado">RESULTADO: </label>
              <div class="form-group">
                <select class="form-control" id="resultado" name ="resultado">
                  <option> <?php echo $row['resultado'] ?></option>
                  <option value="APTO">APTO</option>
                  <option value="NO APTO">NO APTO</option>

                </select>
              </div>
            </div>

             <div class="form-group">
              <label for="color_vehiculo">Color del Vehiculo: </label>
              <input type="text" name="color_vehiculo" class="form-control" id="color_vehiculo" placeholder="Color del Vehiculo"  value="<?php echo $row['color_vehiculo'] ?>" required="">
            </div>
          </div>

          </div>

            <div class="form-group">
             <div class="col-sm-offset-2 col-sm-10">
              <a href="listadomod.php" class="btn btn-warning">Regresar</a>
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