<?php

class ControladorPersonas{


    /*=============================================
    MOSTRAR USUARIO
    =============================================*/

    static public function ctrMostrarPersonas($item, $valor){

        $respuesta = ModeloPersonas::MdlMostrarPersonas($item, $valor);

        return $respuesta;
    }



}
?>