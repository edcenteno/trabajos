<?php


class ControladorAntecedentes{


    /*=============================================
    MOSTRAR USUARIO
    =============================================*/

    static public function ctrMostrarAntecedentes($item, $valor){

        $respuesta = ModeloAntecedentes::MdlMostrarAntecedentes($item, $valor);

        return $respuesta;
    }



}
?>