<?php

class ControladorProvincias{


    /*=============================================
    REGISTRO DE PROVINCIA
    =============================================*/

    static public function ctrCrearProvincias(){

    }


    /*=============================================
    MOSTRAR PROVINCIA
    =============================================*/

    static public function ctrMostrarProvincias($item, $valor){

        $tabla = "provincias";

        $respuesta = ModeloProvincias::MdlMostrarProvincias($tabla, $item, $valor);

        return $respuesta;
    }





}



