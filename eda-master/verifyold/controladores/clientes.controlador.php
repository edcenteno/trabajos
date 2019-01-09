<?php


class ControladorClientes{


    /*=============================================
    MOSTRAR USUARIO
    =============================================*/

    static public function ctrMostrarClientes($item, $valor){

        $respuesta = ModeloClientes::MdlMostrarClientes($item, $valor);

        return $respuesta;
    }



}
?>