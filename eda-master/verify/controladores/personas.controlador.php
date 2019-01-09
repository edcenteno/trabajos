<?php

class ControladorPersonas{


    /*=============================================
    MOSTRAR Personas
    =============================================*/

    static public function ctrMostrarPersonas($item, $valor){

        $respuesta = ModeloPersonas::MdlMostrarPersonas($item, $valor);

        return $respuesta;
    }


    /*=============================================
    MOSTRAR Cajas superiores
    =============================================*/

    static public function ctrMostrarPersonashoy($item, $valor, $ruc){

        $respuesta = ModeloPersonas::MdlMostrarPersonashoy($item, $valor, $ruc);

        return $respuesta;
    }

    static public function ctrMostrarPersonasMes($item, $valor, $ruc){

        $respuesta = ModeloPersonas::MdlMostrarPersonasMes($item, $valor, $ruc);

        return $respuesta;
    }



}
?>