<?php

class ControladorProspecto{

	/*=============================================
	MOSTRAR USUARIO
	=============================================*/

	static public function ctrMostrarProspecto($item, $valor){

		$tabla = "prospecto";

		$respuesta = ModeloProspecto::mdlMostrarProspecto($tabla, $item, $valor);

		return $respuesta;
	}
}