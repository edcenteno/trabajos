<?php
namespace Modelos;
require 'vendor/autoload.php'; //

use Purekid\Mongodm\Model;

    class ModeloUsuarios extends Model {

        static $collection = "usuario_cabify";

        /** use specific config section **/
        public static $config = 'default';

    /*=============================================
    MOSTRAR USUARIOS
    =============================================*/

    static public function MdlMostrarUsuarios($item, $valor){

        if($item != null){

            $params = array($item=>$valor);
            $usuarioscabify = ModeloUsuarios::one($params);
           // var_dump($usuarioscabify);
           return $usuarioscabify;

        }else{

           $usuarioscabify = ModeloUsuarios::all();
            //var_dump($usuarioscabify);
           return $usuarioscabify;
        }

    }

    /*=============================================
    REGISTRO DE USUARIO
    =============================================*/

    static public function mdlIngresarUsuario($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, usuario, password, perfil, foto, dni, correo, telefono, empresa, id_provincia) VALUES (:nombre, :usuario, :password, :perfil, :foto, :dni, :correo, :telefono, :empresa, :id_provincia)");

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
        $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
        $stmt->bindParam(":dni", $datos["dni"], PDO::PARAM_STR);
        $stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":empresa", $datos["empresa"], PDO::PARAM_STR);
        $stmt->bindParam(":id_provincia", $datos["id_provincia"], PDO::PARAM_STR);

        if($stmt->execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt->close();

        $stmt = null;

    }

    /*=============================================
    EDITAR USUARIO
    =============================================*/

    static public function mdlEditarUsuario($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, password = :password, perfil = :perfil, empresa = :empresa, foto = :foto WHERE usuario = :usuario");

        $stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt -> bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
        $stmt -> bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
        $stmt -> bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
        $stmt -> bindParam(":empresa", $datos["empresa"], PDO::PARAM_STR);

        if($stmt -> execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt -> close();

        $stmt = null;

    }

    /*=============================================
    ACTUALIZAR USUARIO
    =============================================*/

    static public function mdlActualizarUsuario($item1, $valor1, $item2, $valor2){

        $usuarioscabify = ModeloUsuarios::one([
            $item2=>$valor2
            ]);

        $fecha = $usuarioscabify->ultimo_login;

        $usuarioscabify->update([
            $item1=>$valor1
        ]);
        $usuarioscabify->save();

       // var_dump($usuarioscabify);

        if($fecha != $usuarioscabify->ultimo_login){

            return "ok";

        }else{

            return "error";

        }

    }

    /*=============================================
    BORRAR USUARIO
    =============================================*/

    static public function mdlBorrarUsuario($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

        $stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

        if($stmt -> execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt -> close();

        $stmt = null;


    }

}