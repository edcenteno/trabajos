<?php


class ControladorRoles{


    /*=============================================
    MOSTRAR USUARIO
    =============================================*/

    static public function ctrMostrarRoles($item, $valor){

        $respuesta = ModeloRoles::MdlMostrarRoles($item, $valor);

        return $respuesta;
    }



}
?>