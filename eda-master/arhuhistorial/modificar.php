<?php
require 'conexion.php';
require 'scripts.php';


$id = $_GET['id'];

$sql = "SELECT * FROM historial WHERE id = '$id'";
$resultado = $mysqli->query($sql);
$row = $resultado->fetch_array(MYSQLI_ASSOC);
$dni=$row['dni'];


$sqlantecententes = "SELECT * FROM antecedentes WHERE id_historial = '$id'";
$resultado = $mysqli->query($sqlantecententes);
$rowantecententes = $resultado->fetch_array(MYSQLI_ASSOC);

$sqlvehiculo = "SELECT * FROM vehiculos WHERE id_historial = '$id'";
$resultado = $mysqli->query($sqlvehiculo);
$rowvehiculo = $resultado->fetch_array(MYSQLI_ASSOC);
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

   /* $(document).ready(function(){
    $("#mostrarpolicial").click(function(){
      $('.targetpolicial').show("swing");
     });
    $("#ocultarpolicial").click(function(){
      $('.targetpolicial').hide("linear");
    });
  });
    $(document).ready(function(){
    $("#mostrarjudicial").click(function(){
      $('.targetjudicial').show("swing");
     });
    $("#ocultarjudicial").click(function(){
      $('.targetjudicial').hide("linear");
    });
  });
    $(document).ready(function(){
    $("#mostrarpenales").click(function(){
      $('.targetpenales').show("swing");
     });
    $("#ocultarpenales").click(function(){
      $('.targetpenales').hide("linear");
    });
  });*/




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
           <input type="hidden" name="id"  value="<?php echo $_GET['id']?>">

           <div class="row">
            <div class="col-6 col-sm-4">

             <div class="form-group">
              <label for="dni">DNI:</label>
              <input type="text" name="dni" class="form-control" id="dni"
              value="<?php echo $dni ?>">
            </div>

            <div class="form-group">
              <label for="nombre">Nombre: </label>
              <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre" value="<?php echo $row['nombre'] ?>">
            </div>

           <!--  <div class="form-group">
             <label for="apellido">Apellido: </label>
             <input type="text" name="apellido" class="form-control" id="apellido" placeholder="Apellido" value="<?php echo $row['apellido'] ?>">
           </div>

           <div class="form-group">
             <label for="placa">Placa: </label>
             <input type="text" name="placa" class="form-control" id="placa" placeholder="Placa" value="<?php echo $row['placa'] ?>">
           </div>
           <div class="form-group">


           </div> -->
           <input type="text" name="soat" class="form-control" id="soat" placeholder="soat" value="<?php echo $rowvehiculo['soat'] ?>">
          </div>
          <div class="col-6 col-sm-4">
            <div class="form-group">
              <label for="ant_penales">Antecedentes Penales: </label>
              <div class="form-group">
                <select class="form-control" id="selpenales" name ="ant_penales">
                  <option><?php echo $rowantecententes['ant_penales'] ?></option>
                  <option id="mostrarpenales" value="POSITIVO">POSITIVO</option>
                  <option id="ocultarpenales" value="NEGATIVO">NEGATIVO</option>
                </select>
              </div>
              <div class="form-group targetpenales">
                <label for="motivo_penal">MOTIVO: </label>
                <input type="text" name="motivo_penal" class="form-control" id="motivo_penal" placeholder="motivo_penal" value="<?php echo $rowantecententes['motivo_penal'] ?>">

                <label for="autoridad_penal">AUTORIDAD: </label>
                <input type="text" name="autoridad_penal" class="form-control" id="autoridad_penal" placeholder="autoridad_penal" value="<?php echo $rowantecententes['autoridad_penal'] ?>">

                <label for="documento_penal">DOCUMENTO: </label>
                <input type="text" name="documento_penal" class="form-control" id="documento_penal" placeholder="documento_penal" value="<?php echo $rowantecententes['documento_penal'] ?>">

                <label for="fecha_proceso_penal">FECHA DE PROCESO: </label>
                <input type="text" name="fecha_proceso_penal" class="form-control" id="fecha_proceso_penal" placeholder="fecha_proceso_penal" value="<?php echo $rowantecententes['fecha_proceso_penal'] ?>">

                <label for="estado_penal">ESTADO: </label>
                <input type="text" name="estado_penal" class="form-control" id="estado_penal" placeholder="estado_penal" value="<?php echo $rowantecententes['estado_penal'] ?>">

                <label for="tipo_ocurrecia_penal">TIPO DE OCURRENCIA: </label>
                <input type="text" name="tipo_ocurrecia_penal" class="form-control" id="tipo_ocurrecia_penal" placeholder="tipo_ocurrecia_penal" value="<?php echo $rowantecententes['tipo_ocurrecia_penal'] ?>">

                <label for="tipo_penal">TIPO: </label>
                <input type="text" name="tipo_penal" class="form-control" id="tipo_penal" placeholder="tipo_penal" value="<?php echo $rowantecententes['tipo_penal'] ?>">

                <label for="agraviado_penal">AGRAVIADO: </label>
                <input type="text" name="agraviado_penal" class="form-control" id="agraviado_penal" placeholder="agraviado_penal" value="<?php echo $rowantecententes['agraviado_penal'] ?>">

                <label for="definicion_delito_penal">DEFINICIÓN DEL DELITO:</label>
                <textarea class="form-control " rows="6" name="definicion_delito_penal"><?php echo $rowantecententes['definicion_delito_penal'] ?></textarea>

                <label for="observacion">RESUMEN:</label>
                <textarea class="form-control " rows="6" name="observacionPenales"><?php echo $rowantecententes['observacionPenales'] ?></textarea>
              </div>
            </div>

            <div class="form-group">
              <label for="ant_judicial">Antecedentes Judiciales: </label>
              <div class="form-group">
                <select class="form-control" id="seljudicial" name ="ant_judicial">
                  <option> <?php echo $rowantecententes['ant_judicial'] ?></option>
                  <option id="mostrarjudicial" value="POSITIVO">POSITIVO</option>
                  <option id="ocultarjudicial" value="NEGATIVO">NEGATIVO</option>
                </select>
              </div>
              <div class="form-group targetjudicial">
               <label for="motivo_penal">MOTIVO: </label>
                <input type="text" name="motivo_judicial" class="form-control" id="motivo_judicial" placeholder="motivo_judicial" value="<?php echo $rowantecententes['motivo_judicial'] ?>">

                <label for="autoridad_judicial">AUTORIDAD: </label>
                <input type="text" name="autoridad_judicial" class="form-control" id="autoridad_judicial" placeholder="autoridad_judicial" value="<?php echo $rowantecententes['autoridad_judicial'] ?>">

                <label for="documento_judicial">DOCUMENTO: </label>
                <input type="text" name="documento_judicial" class="form-control" id="documento_judicial" placeholder="documento_judicial" value="<?php echo $rowantecententes['documento_judicial'] ?>">

                <label for="fecha_proceso_judicial">FECHA DE PROCESO: </label>
                <input type="text" name="fecha_proceso_judicial" class="form-control" id="fecha_proceso_judicial" placeholder="fecha_proceso_judicial" value="<?php echo $rowantecententes['fecha_proceso_judicial'] ?>">

                <label for="estado_judicial">ESTADO: </label>
                <input type="text" name="estado_judicial" class="form-control" id="estado_judicial" placeholder="estado_judicial" value="<?php echo $rowantecententes['estado_judicial'] ?>">

                <label for="tipo_ocurrecia_judicial">TIPO DE OCURRENCIA: </label>
                <input type="text" name="tipo_ocurrecia_judicial" class="form-control" id="tipo_ocurrecia_judicial" placeholder="tipo_ocurrecia_judicial" value="<?php echo $rowantecententes['tipo_ocurrecia_judicial'] ?>">

                <label for="tipo_judicial">TIPO: </label>
                <input type="text" name="tipo_judicial" class="form-control" id="tipo_judicial" placeholder="tipo_judicial" value="<?php echo $rowantecententes['tipo_judicial'] ?>">

                <label for="agraviado_judicial">AGRAVIADO: </label>
                <input type="text" name="agraviado_judicial" class="form-control" id="agraviado_judicial" placeholder="agraviado_judicial" value="<?php echo $rowantecententes['agraviado_judicial'] ?>">

                <label for="definicion_delito_judicial">DEFINICIoN DEL DELITO:</label>
                <textarea class="form-control " rows="6" name="definicion_delito_judicial"><?php echo $rowantecententes['definicion_delito_judicial'] ?></textarea>

                <label for="observacion">RESUMEN:</label>
                <textarea class="form-control " rows="6" name="observacionJudicial"><?php echo $rowantecententes['observacionJudicial'] ?></textarea>
              </div>
            </div>

            <div class="form-group">
              <label for="ant_policial">Antecedentes Policiales: </label>
              <div class="form-group">
                <select class="form-control" id="selpolicial" name ="ant_policial">
                  <option> <?php echo $rowantecententes['ant_policial'] ?></option>
                  <option id="mostrarpolicial" value="POSITIVO">POSITIVO</option>
                  <option id="ocultarpolicial" value="NEGATIVO">NEGATIVO</option>
                </select>
              </div>
              <div class="form-group targetpolicial">
                <label for="motivo_Policial">MOTIVO: </label>
                <input type="text" name="motivo_Policial" class="form-control" id="motivo_Policial" placeholder="motivo_Policial" value="<?php echo $rowantecententes['motivo_Policial'] ?>">

                <label for="autoridad_Policial">AUTORIDAD: </label>
                <input type="text" name="autoridad_Policial" class="form-control" id="autoridad_Policial" placeholder="autoridad_Policial" value="<?php echo $rowantecententes['autoridad_Policial'] ?>">

                <label for="documento_Policial">DOCUMENTO: </label>
                <input type="text" name="documento_Policial" class="form-control" id="documento_Policial" placeholder="documento_Policial" value="<?php echo $rowantecententes['documento_Policial'] ?>">

                <label for="fecha_proceso_Policial">FECHA DE PROCESO: </label>
                <input type="text" name="fecha_proceso_Policial" class="form-control" id="fecha_proceso_Policial" placeholder="fecha_proceso_Policial" value="<?php echo $rowantecententes['fecha_proceso_Policial'] ?>">

                <label for="estado_Policial">ESTADO: </label>
                <input type="text" name="estado_Policial" class="form-control" id="estado_Policial" placeholder="estado_Policial" value="<?php echo $rowantecententes['estado_Policial'] ?>">

                <label for="tipo_ocurrecia_Policial">TIPO DE OCURRENCIA: </label>
                <input type="text" name="tipo_ocurrecia_Policial" class="form-control" id="tipo_ocurrecia_Policial" placeholder="tipo_ocurrecia_Policial" value="<?php echo $rowantecententes['tipo_ocurrecia_Policial'] ?>">

                <label for="tipo_Policial">TIPO: </label>
                <input type="text" name="tipo_Policial" class="form-control" id="tipo_Policial" placeholder="tipo_Policial" value="<?php echo $rowantecententes['tipo_Policial'] ?>">

                <label for="agraviado_Policial">AGRAVIADO: </label>
                <input type="text" name="agraviado_Policial" class="form-control" id="agraviado_Policial" placeholder="agraviado_Policial" value="<?php echo $rowantecententes['agraviado_Policial'] ?>">

                <label for="definicion_delito_Policial">DEFINICIoN DEL DELITO:</label>
                <textarea class="form-control " rows="6" name="definicion_delito_Policial"><?php echo $rowantecententes['definicion_delito_Policial'] ?></textarea>

                <label for="observacion">RESUMEN:</label>
                <textarea class="form-control " rows="6" name="observacionPolicial"><?php echo $rowantecententes['observacionPolicial'] ?></textarea>

              </div>
            </div>


            <div class="form-group">
              <label for="record_cond">Record del conductor: </label>
              <input type="text" name="record_cond" class="form-control" id="record_cond" placeholder="Record del conductor"  value="<?php echo $row['record_cond'] ?>" required="">
            </div>
          </div>
          <div class="col-6 col-sm-4">
          <div class="form-group">
            <input type="text" name="resultado" hidden class="form-control" id="resultado" value="<?php echo $row['resultado'] ?>" >

            </div>

             <div class="form-group">
             <input class="form-group-input" type="checkbox" name="blacklist" id="blacklist" value="1">
                <label class="form-group-label" for="exampleRadios1">
                  Se encuenta en lista Negra
                </label>

            </div>

              <div class="form-group">
                <label for="observacion">Observación:</label>
                <textarea class="form-control" rows="6" id="observacion" name="observacion"><?php echo $rowantecententes['observacion'] ?></textarea>
              </div>

            </div>
          </div>

            <div class="form-group">
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