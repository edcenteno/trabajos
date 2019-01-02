<?php


class ControladorItems{


    /*=============================================
    MOSTRAR USUARIO
    =============================================*/

    static public function ctrMostrarItems($item, $valor){

        $respuesta = ModeloItems::MdlMostrarItems($item, $valor);

        return $respuesta;
    }



}
?>