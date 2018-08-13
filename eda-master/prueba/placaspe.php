<?php
include 'scripts.php';
?>

<body>
Introduce placa
<form id="form" name="form">

<input type="text" name="placa" id="placa" value="" placeholder="Placa" /> 

 Realiza info
<input type="button" href="javascript:;" onclick="realizaProceso()" value="enviar"/>
</form>

<script type="text/javascript">

function realizaProceso(){


	type= $('#tipo').val();
    placa = $('#placa').val();
          
	/*$.ajax({
    type: "POST",
    url: 'https://captcharh.ddns.net/api/record',
    data: {
        type: '1', //tipo de documento 
        documento: placa, //numero de documento
        datas: 'placa' //tipo de solicitud
    }
    
	}).done(function(msg){
		$("#resultado").html(msg);
		console.log(msg)
	});*/
	$.ajax({
    type: "GET",
    url: 'https://captcharh.ddns.net/api/record/placa/'+ placa
    
	}).done(function(msg){
		$("#resultado").html(msg);
		//console.log(msg)
	
	});
}

</script>

<div id="resultado"></div>