

<?php 
	date_default_timezone_set('America/Lima');
	function conexion()
	{
		return $conexion=mysqli_connect("localhost","root","","arhuantecedentes");
	}

 ?>