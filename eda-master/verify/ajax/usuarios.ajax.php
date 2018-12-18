<?php

require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";

use Purekid\Mongodm\Model;
class ModeloUsuarios extends Model {

        static $collection = "usuarios";

        /** use specific config section **/
        public static $config = 'default';
    }

class AjaxUsuarios{

	/*=============================================
	EDITAR USUARIO
	=============================================*/

	public $idUsuario;

	public function ajaxEditarUsuario(){

		$item = "usuarios";
		$valor = $this->idUsuario;

		$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

		echo json_encode($respuesta->cleanData);

	}

	/*=============================================
	ACTIVAR USUARIO
	=============================================*/

	public $activarUsuario;
	public $activarId;


	public function ajaxActivarUsuario(){

		$item1 = "estado";
		$valor1 = $this->activarUsuario;

		$item2 = "usuarios";
		$valor2 = $this->activarId;

		$respuesta =ModeloUsuarios::one([
						            $item2=>$valor2
						            ]);

						        //$fecha = $respuesta->ultimo_login;

						        $respuesta->update([
						            $item1=>$valor1
						        ]);
						        $respuesta->save();

						       // var_dump($usuarioscabify);


						            return "ok";

	}

	/*=============================================
	VALIDAR NO REPETIR USUARIO
	=============================================*/

	public $validarUsuario;

	public function ajaxValidarUsuario(){

		$item = "usuarios";
		$valor = $this->validarUsuario;

		$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR USUARIO
=============================================*/
if(isset($_POST["idUsuario"])){

	$editar = new AjaxUsuarios();
	$editar -> idUsuario = $_POST["idUsuario"];
	$editar -> ajaxEditarUsuario();

}

/*=============================================
ACTIVAR USUARIO
=============================================*/

if(isset($_POST["activarUsuario"])){

	$activarUsuario = new AjaxUsuarios();
	$activarUsuario -> activarUsuario = $_POST["activarUsuario"];
	$activarUsuario -> activarId = $_POST["activarId"];
	$activarUsuario -> ajaxActivarUsuario();

}

/*=============================================
VALIDAR NO REPETIR USUARIO
=============================================*/

if(isset( $_POST["validarUsuario"])){

	$valUsuario = new AjaxUsuarios();
	$valUsuario -> validarUsuario = $_POST["validarUsuario"];
	$valUsuario -> ajaxValidarUsuario();

}