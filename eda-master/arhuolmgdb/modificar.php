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
$placa=$row['placa'];
/*var_dump($pdf);*/

$cabify = $row["cabify"];
$easytaxi = $row["easytaxi"];

if ($cabify == '1' && $easytaxi == 1) {
    $cabify= "<font color='purpure'>Cabify</font> &nbsp&nbsp  <br> <font color='green'>Easytaxi</font> ";
}else if ($easytaxi == 1 && $cabify == 0) {
    $cabify= "<font color='green'>easytaxi </font>";
}else if ($easytaxi == 0 && $cabify == 1) {
    $cabify = "<font color='purpure'>cabify</font>";
}else if ($easytaxi == 0 && $cabify == 0) {
    $cabify = "";
}
?>
<html lang="es">

<head>
  <title>ARHU Internacional</title>
  <link rel="shortcut icon" href="img/favicon.ico" type="image/ico" />

<script type="text/javascript">

  placa = '<?php echo $placa ?>'
  $.ajax({
    type: "GET",
    url: 'https://captcharh.ddns.net/api/record/placa/'+placa

    }).done(function(msg){
        //$("#resultado").html(msg);
       //console.log(msg['Especificaciones'][0]['class'])//msg.vin.co
       if (msg != "No existe la placa, intente mas tarde.") {

        $('.vehiculo')[0].innerText = msg['Vin']['modelYear'];

      }
    });

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
              value="<?php echo $dni ?>">
            </div>

            <div class="form-group">
              <label for="nombre">Nombre: </label>
              <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre" value="<?php echo $row['nombre'] ?>">
            </div>

            <div class="form-group">
              <label for="apellido">Apellido: </label>
              <input type="text" name="apellido" class="form-control" id="apellido" placeholder="Apellido" value="<?php echo $row['apellido'] ?>">
            </div>

            <div class="form-group">
              <label for="placa">Placa: </label>
              <input type="text" name="placa" class="form-control" id="placa" placeholder="Placa" value="<?php echo $row['placa'] ?>">
            </div>

            <div class="form-group">
              <label for="">Año del modelo de Vehiculo: </label>
              <p class="text-danger vehiculo"></p>
            </div>

            <div class="form-group">
              <label for="empresa">Empresa: </label>
              <?php echo $cabify ?>
            </div>


            <div class="form-group">

              <input type="text" name="soat" hidden class="form-control" id="soat" placeholder="soat" value="<?php echo $row['soat'] ?>">
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

                <label for="documento_penal">DOCUMENTO: </label>
                <input type="text" name="documento_penal" class="form-control" id="documento_penal" placeholder="documento_penal" value="<?php echo $row['documento_penal'] ?>">

                <label for="fecha_proceso_penal">FECHA DE PROCESO: </label>
                <input type="text" name="fecha_proceso_penal" class="form-control" id="fecha_proceso_penal" placeholder="fecha_proceso_penal" value="<?php echo $row['fecha_proceso_penal'] ?>">

                <label for="estado_penal">ESTADO: </label>
                <input type="text" name="estado_penal" class="form-control" id="estado_penal" placeholder="estado_penal" value="<?php echo $row['estado_penal'] ?>">

                <label for="tipo_ocurrecia_penal">TIPO DE OCURRENCIA: </label>
                <input type="text" name="tipo_ocurrecia_penal" class="form-control" id="tipo_ocurrecia_penal" placeholder="tipo_ocurrecia_penal" value="<?php echo $row['tipo_ocurrecia_penal'] ?>">

                <label for="tipo_penal">TIPO: </label>
                <input type="text" name="tipo_penal" class="form-control" id="tipo_penal" placeholder="tipo_penal" value="<?php echo $row['tipo_penal'] ?>">

                <label for="agraviado_penal">AGRAVIADO: </label>
                <input type="text" name="agraviado_penal" class="form-control" id="agraviado_penal" placeholder="agraviado_penal" value="<?php echo $row['agraviado_penal'] ?>">

                <label for="definicion_delito_penal">DEFINICIÓN DEL DELITO:</label>
                <textarea class="form-control " rows="6" name="definicion_delito_penal"><?php echo $row['definicion_delito_penal'] ?></textarea>

                <label for="observacion">RESUMEN:</label>
                <textarea class="form-control " rows="6" name="observacionPenales"><?php echo $row['observacionPenales'] ?></textarea>
              </div>
            </div>

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

                <label for="documento_judicial">DOCUMENTO: </label>
                <input type="text" name="documento_judicial" class="form-control" id="documento_judicial" placeholder="documento_judicial" value="<?php echo $row['documento_judicial'] ?>">

                <label for="fecha_proceso_judicial">FECHA DE PROCESO: </label>
                <input type="text" name="fecha_proceso_judicial" class="form-control" id="fecha_proceso_judicial" placeholder="fecha_proceso_judicial" value="<?php echo $row['fecha_proceso_judicial'] ?>">

                <label for="estado_judicial">ESTADO: </label>
                <input type="text" name="estado_judicial" class="form-control" id="estado_judicial" placeholder="estado_judicial" value="<?php echo $row['estado_judicial'] ?>">

                <label for="tipo_ocurrecia_judicial">TIPO DE OCURRENCIA: </label>
                <input type="text" name="tipo_ocurrecia_judicial" class="form-control" id="tipo_ocurrecia_judicial" placeholder="tipo_ocurrecia_judicial" value="<?php echo $row['tipo_ocurrecia_judicial'] ?>">

                <label for="tipo_judicial">TIPO: </label>
                <input type="text" name="tipo_judicial" class="form-control" id="tipo_judicial" placeholder="tipo_judicial" value="<?php echo $row['tipo_judicial'] ?>">

                <label for="agraviado_judicial">AGRAVIADO: </label>
                <input type="text" name="agraviado_judicial" class="form-control" id="agraviado_judicial" placeholder="agraviado_judicial" value="<?php echo $row['agraviado_judicial'] ?>">

                <label for="definicion_delito_judicial">DEFINICIoN DEL DELITO:</label>
                <textarea class="form-control " rows="6" name="definicion_delito_judicial"><?php echo $row['definicion_delito_judicial'] ?></textarea>

                <label for="observacion">RESUMEN:</label>
                <textarea class="form-control " rows="6" name="observacionJudicial"><?php echo $row['observacionJudicial'] ?></textarea>
              </div>
            </div>

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

                <label for="documento_Policial">DOCUMENTO: </label>
                <input type="text" name="documento_Policial" class="form-control" id="documento_Policial" placeholder="documento_Policial" value="<?php echo $row['documento_Policial'] ?>">

                <label for="fecha_proceso_Policial">FECHA DE PROCESO: </label>
                <input type="text" name="fecha_proceso_Policial" class="form-control" id="fecha_proceso_Policial" placeholder="fecha_proceso_Policial" value="<?php echo $row['fecha_proceso_Policial'] ?>">

                <label for="estado_Policial">ESTADO: </label>
                <input type="text" name="estado_Policial" class="form-control" id="estado_Policial" placeholder="estado_Policial" value="<?php echo $row['estado_Policial'] ?>">

                <label for="tipo_ocurrecia_Policial">TIPO DE OCURRENCIA: </label>
                <input type="text" name="tipo_ocurrecia_Policial" class="form-control" id="tipo_ocurrecia_Policial" placeholder="tipo_ocurrecia_Policial" value="<?php echo $row['tipo_ocurrecia_Policial'] ?>">

                <label for="tipo_Policial">TIPO: </label>
                <input type="text" name="tipo_Policial" class="form-control" id="tipo_Policial" placeholder="tipo_Policial" value="<?php echo $row['tipo_Policial'] ?>">

                <label for="agraviado_Policial">AGRAVIADO: </label>
                <input type="text" name="agraviado_Policial" class="form-control" id="agraviado_Policial" placeholder="agraviado_Policial" value="<?php echo $row['agraviado_Policial'] ?>">

                <label for="definicion_delito_Policial">DEFINICIoN DEL DELITO:</label>
                <textarea class="form-control " rows="6" name="definicion_delito_Policial"><?php echo $row['definicion_delito_Policial'] ?></textarea>

                <label for="observacion">RESUMEN:</label>
                <textarea class="form-control " rows="6" name="observacionPolicial"><?php echo $row['observacionPolicial'] ?></textarea>

              </div>
            </div>


            <div class="form-group">
              <label for="record_cond">Record del conductor: </label>
              <input type="text" name="record_cond" class="form-control" id="record_cond" placeholder="Record del conductor"  value="<?php echo $row['record_cond'] ?>" required="">
            </div>

            <div class="form-group">
              <label for="status_licencia">Estado de Licencia: </label>
              <input type="text" name="status_licencia" class="form-control" id="status_licencia" placeholder="Record del conductor"  value="<?php echo $row['status_licencia'] ?>" required="">
            </div>
          </div>
          <div class="col-6 col-sm-4">
          <div class="form-group">
            <input type="text" name="resultado" hidden class="form-control" id="resultado" value="<?php echo $row['resultado'] ?>" >

            </div>

            <div class="form-group">
              <label for="usuario_reg">Operador: </label>
              <input type="text" name="usuario_reg" readonly class="form-control" id="usuario_reg" placeholder="Operador"  value="<?php echo $row['usuario_reg'] ?>" required="">
            </div>
            <div class="form-group">
              <label for="color_vehiculo">Color del Vehiculo: </label>
              <input type="text" name="color_vehiculo" class="form-control" id="color_vehiculo" placeholder="Color del Vehiculo"  value="<?php echo $row['color_vehiculo'] ?>">
            </div>

             <div class="form-group">
             <input class="form-group-input" type="checkbox" name="blacklist" id="blacklist" value="1">
                <label class="form-group-label" for="exampleRadios1">
                  Se encuenta en lista Negra
                </label>

            </div>

              <div class="form-group">
                <label for="observacion">Observación:</label>
                <textarea class="form-control" rows="6" id="observacion" name="observacion"><?php echo $row['observacion'] ?></textarea>
              </div>

            </div>
          </div>

            <div class="form-group">
             <div class="col-sm-offset-2 col-sm-10">
              <a href="inicio.php" class="btn btn-warning">Regresar</a>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </div>
          <?php
        }
          ?>
        </div>
      </div>
    </form>
    <?php require 'footer.php' ?>
  </div>
</body>
</html>