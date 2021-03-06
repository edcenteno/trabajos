<?php 

  namespace DatosPeru;
error_reporting(0);
  include "php/conexion.php";
  $conexion=conexion();

$dni=$_POST['dni'];

if (is_numeric($dni) && strlen($dni) == 8) {

  function buscaRepetido($dni,$conexion){
    $sql="SELECT * from conductores where dni='$dni'";
    $result=mysqli_query($conexion,$sql);
    while($row = $result->fetch_array(MYSQLI_ASSOC)){
      $rows[] = $row;
    }

    if(mysqli_num_rows($result) > 0){
      return 1;
    }else{
      return 0;
    }
  }

  if(buscaRepetido($dni,$conexion)==0){
 // $dni=$_POST['dni'];
  class Peru  {
    function __construct()
    { 
      $this->reniec = new \Reniec\Reniec(); 
      $this->essalud = new \EsSalud\EsSalud();
      $this->mintra = new \MinTra\mintra();
    }
    function search( $dni )
    {
      $response = $this->reniec->search( $dni );
      if($response->success == true)
      {
        $rpt = (object)array(
          "success"     => true,
          "source"    => "reniec",
          "result"    => $response->result
        );
        return $rpt;
      }
      
      $response = $this->essalud->check( $dni );
      if($response->success == true)
      {
        $rpt = (object)array(
          "success"     => true,
          "source"    => "essalud",
          "result"    => $response->result
        );
        return $rpt;
      }
            
      $response = $this->mintra->check( $dni );
      if( $response->success == true )
      {
        $rpt = (object)array(
          "success"     => true,
          "source"    => "mintra",
          "result"    => $response->result
        );
        return $rpt;
      }
      
      $rpt = (object)array(
        "success"     => false,
        "msg"       => "No se encontraron datos"
      );
      return $rpt;
    }
  }
  
  
  require_once( __DIR__ . "/src/autoload.php" );
 
  $test = new \DatosPeru\Peru();
  
  $out=$test->search("$dni");
  $a = json_encode($out);
  var_dump($a);

  if (strlen($a) < 150) {
     echo '<script>

                swal({
                    type: "error",
                    title: "¡Error de DNI, ingrese uno valido!",
                    showConfirmButton: true,
                    confirmButtonColor: "#dd6b55",
                    confirmButtonText: "Cerrar"
                    }).then(function(result) {
                      $("#consul")[0].reset();
                    
                  })

                </script>';
  } else {
   
 echo '<form class="form-horizontal p-t-20">
    <div class="form-group row">
        <label for="exampleInputuname3" class="col-sm-3 control-label">Nombre</label>
        <div class="col-sm-9">
            <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="ti-user"></i></span></div>
                <input type="text" readonly="" class="form-control" name="nombre" id="nombre">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="exampleInputEmail3" class="col-sm-3 control-label">Apellido</label>
        <div class="col-sm-9">
            <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="ti-user"></i></span></div>
                <input type="text" readonly="" class="form-control" name="apellidos" id="apellidos">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="web" class="col-sm-3 control-label">DNI</label>
        <div class="col-sm-9">
            <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="ti-id-badge"></i></span></div>
                <input type="text" readonly="" class="form-control" name="dni" id="dni" value="'.$dni.'">
            </div>
        </div>
    </div>
    
</form>
';
?>

<script type="text/javascript">
  var x =<?php echo $a ?>;

  $(document).ready(function(){
    $('#nombre').val(x.result.Nombres);
    $('#apellidos').val(x.result.apellidos);
    $('#dni').val(x.result.DNI);
    $('#registrarNuevo').click(function(){

    });
  });

function realizaProcesoplaca(){
        cadena="placa=" + $('#placa').val() +
        "&dni=" + $('#dni').val() +
        "&nombre=" + $('#nombre').val() + 
        "&apellidos=" + $('#apellidos').val();
        $.ajax({
                data:  cadena, 
                url:   'vistas/modulos/reniec/placa.php',
                type:  'post', 
                beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) { 
                        $("#resultado").html(response);
                }
        });
}
</script>

<?php
 echo 'Introduce placa

<form class="form-horizontal p-t-20">
    <div class="form-group row">
        <label for="exampleInputuname3" class="col-sm-3 control-label">Placa</label>
        <div class="col-sm-9">
            <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="ti-car"></i></span></div>
                <input type="text" name="caja_texto" id="placa" value="" class="form-control" pattern="[A-Z0-9]{6}"/> 
            </div>
        </div>

      <button type="button" href="javascript:;" class="btn btn-success waves-effect waves-light" onclick="realizaProcesoplaca();return false;" id="consultaplaca" name="consultaplaca">Consultar</button>

    </div>
    
</form>
<!-- <input type="button" href="javascript:;" onclick="realizaProcesoplaca();return false;" value="enviar2" pattern="[A-Z0-9]{5,40}" title="Letras y números. Tamaño mínimo: 5. Tamaño máximo: 40"/> -->

<span id="resultado">
';
       
}
}else{
  echo '<script>

                swal({
                    type: "warning",
                    title: "¡Conductor ya existe, intente con otro DNI!",
                    showConfirmButton: true,
                    confirmButtonColor: "#fec107",
                    confirmButtonText: "Cerrar"
                    }).then(function(result) {
                      $("#consul")[0].reset();
                    
                  })

                </script>';
}


/*if ($out == 0) {

} else {

echo 'Temporalmente el sistema no esta prestando servicios';

}*/

} else {
  echo '<script>

                swal({
                    type: "error",
                    title: "¡Introduzca un DNI valido!",
                    showConfirmButton: true,
                    confirmButtonColor: "#dd6b55",
                    confirmButtonText: "Cerrar"
                    }).then(function(result) {
                      $("#consul")[0].reset();
                    
                  })

                </script>';
  
}
?>
