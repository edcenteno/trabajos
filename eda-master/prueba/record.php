<?php
include 'scripts.php';
?>

<body>
Introduce dni
<form id="form" name="form">
<select id="tipo"> 
	<option value="1" name="dni">DNI</option>
	<option value="2" name="dni">DNI</option>
	<option value="3" name="dni">DNI</option>
	<option value="4" name="dni">DNI</option>
	<option value="5" name="dni">DNI</option>
</select>
<input type="text" pattern="[0-9]{8}" minlength="8" maxlength="8"name="dni" id="dni" value="" placeholder="DNI" /> 

 Realiza info
<input type="button" href="javascript:;" onclick="realizaProceso()" value="enviar"/>
</form>

<script type="text/javascript">

function realizaProceso(){


	type= $('#tipo').val();
    dni = $('#dni').val();
          
/*	$.ajax({
    type: "POST",
    url: 'https://captcharh.ddns.net/api/record',
    data: {
        type: type, //tipo de documento 
        documento: dni, //numero de documento
        datas: 'record' //tipo de solicitud
    }
    
	}).done(function(msg){
		$("#resultado").html(msg);
		//console.log(msg)
	
	});*/

	$.ajax({
    type: "GET",
    url: 'https://captcharh.ddns.net/api/record/principal/'+ dni
    
	}).done(function(msg){
		$("#resultado").html(msg);
		//console.log(msg)
	
	});

	/*$.ajax({
    type: "GET",
    url: 'https://captcharh.ddns.net/api/record/multas/'+ dni
    
	}).done(function(msg){
		$("#resultado").html(msg);
		//console.log(msg)
	
	});*/
}

</script>

<div id="resultado"></div>