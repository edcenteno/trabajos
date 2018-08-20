<?php
	date_default_timezone_set('America/Lima');
	$mysqli = new mysqli('localhost', 'root', '', 'arhuantecedentes');
		$mysqli->set_charset('utf8');
	if($mysqli->connect_error){
		
		die('Error en la conexion' . $mysqli->connect_error);
		
	}
?>