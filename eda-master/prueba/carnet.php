<?php

include 'scripts.php';
?>

<script type="text/javascript">
    carnet = '00125434';

    $.ajax({
          type: "POST",
          url: 'https://captcharh.ddns.net/api/record/principal/carnet',
          data: {
              carnet: carnet, //tipo de documento
          }

        }).done(function(msg){
         // $("#resultado").html(msg);
          console.log(msg)
      // $('.carnet')[0].innerText = msg['Nombres'];
       //$('.carnet')[1].innerText = msg['ApellidoPaterno']+msg['ApellidoMaterno'];
     //   $('.carnet')[2].innerText = ;
         $('#nombrecarnet').val(msg['Nombres']);
         $('#apellidoscarnet').val(msg['ApellidoPaterno'] + ' ' +msg['ApellidoMaterno']);


        });


</script>


 <div class="form-group row">
    <label for="exampleInputuname3" class="col-sm-3 control-label">Nombre</label>
    <div class="col-sm-10">
      <div class="input-group">
        <div class="input-group-prepend"><span class="input-group-text"><i class="ti-user"></i></span></div>
        <input type="text" style="text-transform: uppercase;" class="form-control carnet" name="nombrecarnet" id="nombrecarnet">
      </div>
    </div>
  </div>

  <div class="form-group row">
    <label for="web" class="col-sm-3 control-label">Apellido</label>
    <div class="col-sm-10">
      <div class="input-group">
        <div class="input-group-prepend"><span class="input-group-text"><i class="ti-user"></i></span></div>
        <input style="text-transform: uppercase;" type="text" class="form-control carnet" name="apellidoscarnet" id="apellidoscarnet">
      </div>
    </div>
  </div>

