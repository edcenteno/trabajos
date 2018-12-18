<?php

require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";


class AjaxUsuarios{

    /*=============================================
    EDITAR USUARIO
    =============================================*/

    public $idUsuario;

    public function ajaxEditarUsuario(){

        $item = "clientes";
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

        $item2 = "clientes";
        $valor2 = $this->activarId;

        $respuesta =ModeloClientes::one([
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

        $item = "clientes";
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