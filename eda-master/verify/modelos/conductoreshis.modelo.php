<?php

date_default_timezone_set('America/Lima');

require_once "conexion.php";

class ModeloConductor{

 static public function mdlMostrarunConductorHistorial($item, $valor, $idconductor){


        $sql = "SELECT
                    T1.*, T2.*, T3.*, T4.*, T5.*
                FROM
                historial T1
                INNER JOIN vehiculos T2
                INNER JOIN empresas T3
                INNER JOIN antecedentes T4
                INNER JOIN blacklist T5
                ON
                    T1.id_vehiculo = T2.id
                AND
                    T1.id_empresa = T3.id
                AND
                    T1.id  = T4.id_historial
                AND
                T1.id  = T5.id_historial
                WHERE
                    dni = $idconductor";

        if($item != null){

            $stmt = Conexion::conectar()->prepare("$sql");

            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt -> execute();

            return $stmt -> fetch();

        }else{

            $stmt = Conexion::conectar()->prepare("$sql");

            $stmt -> execute();

            return $stmt -> fetchAll();

        }

        $stmt -> close();

        $stmt = null;

    }
}