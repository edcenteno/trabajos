<?php

include 'scripts.php';
?>

<script type="text/javascript">
    carnet = '001625434';

    $.ajax({
          type: "POST",
          url: 'https://captcharh.ddns.net/api/record/principal/carnet',
          data: {
              carnet: carnet, //tipo de documento
          }

        }).done(function(msg){
         // $("#resultado").html(msg);
          console.log(msg)
       $('.carnet')[0].innerText = msg['Nombres'];
       $('.carnet')[1].innerText = msg['ApellidoPaterno'];
       $('.carnet')[2].innerText = msg['ApellidoMaterno'];

       var nombre = msg['Nombres'];
       var ApellidoPaterno = msg['ApellidoPaterno'];
       var ApellidoMaterno = msg['ApellidoMaterno'];

       var miJSON = JSON.encode(msg);
       console.log(miJSON)
        });


</script>
<script>
var variableJS = "contenido de la variable javascript";
</script>
<?php
$nombre = "<script> document.write(nombre) </script>";
$ApellidoPaterno = "<script> document.write(ApellidoPaterno) </script>";
$ApellidoMaterno = "<script> document.write(ApellidoMaterno) </script>";

echo "variablePHP = ".$nombre . ' ' .$ApellidoMaterno . '' .$ApellidoPaterno;
?>

<div class="col-md-3 col-xs-6 b-r"> <strong>Fecha de Firme</strong>
    <br>
    <p class="text-muted carnet"></p>
</div>
<div class="col-md-3 col-xs-6 b-r"> <strong>Fecha de Papeleta</strong>
    <br>
    <p class="text-muted carnet"></p>
</div>
<div class="col-md-3 col-xs-6 b-r"> <strong>Fecha de Registro</strong>
    <br>
    <p class="text-muted carnet">Falta</p>
</div>

