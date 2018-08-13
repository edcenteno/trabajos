<style type="text/css">

input:valid, textarea:valid {
  border-color:blue;
}
input:invalid, textarea:invalid {
  border-color:red;
}
</style>
<?php

//include 'scripts.php';
?>
<html>
<head>


<script>
function realizaProceso(dni){
      
        var parametros = {
                
                "dni" : dni
        };
        $.ajax({
                data:  parametros, 
                url:   'vistas/modulos/reniec/consulta.php',
                type:  'post', 
                beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                       // alert(response);
                        $("#resultado").html(response);
                        //console.log(response)
                        var rsp=response;
                       // consultadni.style.display = 'none'; // No ocupa espacio
                       if (rsp.length > "1000"){
                          $("#consultadni").hide("slow");
                          $("#x").hide("slow");
                       }
                         
                        
                }
        });
}
</script>
</head>
<body>

<form class="form-horizontal p-t-20" id="consul">
  <div class="form-group row" id="x">
      <label for="exampleInputuname3" id="algo" class="col-sm-3 control-label" id="label">Introduce dni</label>
      <div class="col-sm-9">
          <div class="input-group">
              <div class="input-group-prepend" id="div"><span class="input-group-text"><i id="ico" class="ti-user"></i></span></div>
              <input type="text" class="form-control" pattern="[0-9]{8}" minlength="8" maxlength="8" name="dni" id="dni" value="" placeholder="DNI" /> 

          </div>
      </div>
  </div>
  <div class="form-group row m-b-0">
      <div class="offset-sm-3 col-sm-9">
          <button type="button" href="javascript:;" class="btn btn-success waves-effect waves-light" onclick="realizaProceso($('#dni').val());return false;" id="consultadni" name="consultadni">Consultar</button>
      </div>
  </div>
</form>

 <span id="resultado">

