<?php
require 'conexion.php';
require 'scripts.php';


$dni = $_GET['dni'];

$sql = "SELECT * FROM proceso WHERE dni = '$dni'";
$resultado = $mysqli->query($sql);
$row = $resultado->fetch_array(MYSQLI_ASSOC);
$dni=$row['dni'];

/*var_dump($pdf);*/
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

          $('#selpolicial').on("change",function(e){
            if (e.target.value=='POSITIVO'){
              $('.targetpolicial').show();
            }else if (e.target.value=='NEGATIVO') {
              $('.targetpolicial').find('input, textarea').val('');
              $('.targetpolicial').hide();
            }
          });

          $('#seljudicial').on("change",function(e){
            if (e.target.value=='POSITIVO'){
              $('.targetjudicial').show();
            }else if (e.target.value=='NEGATIVO') {
              $('.targetjudicial').find('input, textarea').val('');
              $('.targetjudicial').hide();
            }
          });

           $('#selpenales').on("change",function(e){
            if (e.target.value=='POSITIVO'){
              $('.targetpenales').show();
            }else if (e.target.value=='NEGATIVO') {
              $('.targetpenales').find('input, textarea').val('');
              $('.targetpenales').hide();
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


         <form class="form-horizontal" method="POST" action="modif_perso2.php" autocomplete="off" style="border-collapse: separate; border-spacing: 10px 5px;">
           <input type="hidden" name="cont"  value="<?php echo $_GET['id']?>">
           <input type="hidden" name="pdf"   value="<?php echo $pdf ?>">

           <div class="row">
            <div class="col-6 col-sm-4">

             <div class="form-group">
              <label for="dni">DNI:</label>
              <input type="text" name="dni" class="form-control" id="dni"
              value="<?php echo $dni ?>" readonly>
            </div>
             </div>
             <div class="col-6 col-sm-4">

            <div class="form-group">
              <label for="nombre">Nombre: </label>
              <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre" value="<?php echo $row['nombre'] ?>" readonly>
            </div>
            </div>
             <div class="col-6 col-sm-4">

            <div class="form-group">
              <label for="apellido">Apellido: </label>
              <input type="text" name="apellido" class="form-control" id="apellido" placeholder="Apellido" value="<?php echo $row['apellido'] ?>" readonly>
            </div>

          </div>
          <div class="col-6 col-sm-4">
            <div class="form-group">
              <label for="ant_penales">Antecedentes Penales: </label>
              <div class="form-group">
                <select class="form-control" id="selpenales" name ="ant_penales">
                  <option><?php echo $row['ant_penales'] ?></option>
                  <option id="mostrarpenales" value="POSITIVO">POSITIVO</option>
                  <option id="ocultarpenales" value="NEGATIVO">NEGATIVO</option>
                </select>
              </div>
              <div class="form-group targetpenales">
                <label for="motivo_penal">MOTIVO: </label>
                <input type="text" name="motivo_penal" class="form-control" id="motivo_penal" placeholder="motivo_penal" value="<?php echo $row['motivo_penal'] ?>">

                <label for="autoridad_penal">AUTORIDAD: </label>
                <input type="text" name="autoridad_penal" class="form-control" id="autoridad_penal" placeholder="autoridad_penal" value="<?php echo $row['autoridad_penal'] ?>">

                <label for="fecha_proceso_penal">FECHA DE PROCESO: </label>
                <input type="text" name="fecha_proceso_penal" class="form-control" id="fecha_proceso_penal" placeholder="fecha_proceso_penal" value="<?php echo $row['fecha_proceso_penal'] ?>">


              </div>
            </div>
          </div>
          <div class="col-6 col-sm-4">
            <div class="form-group">
              <label for="ant_judicial">Antecedentes Judiciales: </label>
              <div class="form-group">
                <select class="form-control" id="seljudicial" name ="ant_judicial">
                  <option> <?php echo $row['ant_judicial'] ?></option>
                  <option id="mostrarjudicial" value="POSITIVO">POSITIVO</option>
                  <option id="ocultarjudicial" value="NEGATIVO">NEGATIVO</option>
                </select>
              </div>
              <div class="form-group targetjudicial">
               <label for="motivo_penal">MOTIVO: </label>
                <input type="text" name="motivo_judicial" class="form-control" id="motivo_judicial" placeholder="motivo_judicial" value="<?php echo $row['motivo_judicial'] ?>">

                <label for="autoridad_judicial">AUTORIDAD: </label>
                <input type="text" name="autoridad_judicial" class="form-control" id="autoridad_judicial" placeholder="autoridad_judicial" value="<?php echo $row['autoridad_judicial'] ?>">

                <label for="fecha_proceso_judicial">FECHA DE PROCESO: </label>
                <input type="text" name="fecha_proceso_judicial" class="form-control" id="fecha_proceso_judicial" placeholder="fecha_proceso_judicial" value="<?php echo $row['fecha_proceso_judicial'] ?>">



              </div>
            </div>
          </div>
        <div class="col-8 col-sm-4">
            <div class="form-group">
              <label for="ant_policial">Antecedentes Policiales: </label>
              <div class="form-group">
                <select class="form-control" id="selpolicial" name ="ant_policial">
                  <option> <?php echo $row['ant_policial'] ?></option>
                  <option id="mostrarpolicial" value="POSITIVO">POSITIVO</option>
                  <option id="ocultarpolicial" value="NEGATIVO">NEGATIVO</option>
                </select>
              </div>
              <div class="form-group targetpolicial">
                <label for="motivo_Policial">MOTIVO: </label>
                <input type="text" name="motivo_Policial" class="form-control" id="motivo_Policial" placeholder="motivo_Policial" value="<?php echo $row['motivo_Policial'] ?>">

                <label for="autoridad_Policial">AUTORIDAD: </label>
                <input type="text" name="autoridad_Policial" class="form-control" id="autoridad_Policial" placeholder="autoridad_Policial" value="<?php echo $row['autoridad_Policial'] ?>">

                <label for="fecha_proceso_Policial">FECHA DE PROCESO: </label>
                <input type="text" name="fecha_proceso_Policial" class="form-control" id="fecha_proceso_Policial" placeholder="fecha_proceso_Policial" value="<?php echo $row['fecha_proceso_Policial'] ?>">


               </div>
            </div>

          </div>
        </div>
            <div class="form-group">
               <div class="form-group">
             <input class="form-group-input" type="checkbox" name="negativo" id="negativo" value="1">
                <label class="form-group-label" for="negativo">
                  Todo NEGATIVO
                </label>

            </div>
             <div class="col-sm-offset-2 col-sm-10">
              <a href="inicio.php" class="btn btn-warning">Regresar</a>
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