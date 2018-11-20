<?php
namespace Modelos;
session_start();
require '../vendor/autoload.php'; //

use Purekid\Mongodm\Model;

    class ModeloUsuarios extends Model {

        static $collection = "usuarios";

        /** use specific config section **/
        public static $config = 'default';

}
		$usuario=$_POST['usuario'];
		$pass=sha1($_POST['password']);

		$params = array('usuario'=>$usuario
						);

        $respuesta = ModeloUsuarios::one($params);
       // var_dump($respuesta);

		if($respuesta->usuario == $_POST["usuario"] && $respuesta->password == $pass){
			$_SESSION['user']=$usuario;
			echo 1;
		}else{
			echo 0;
		}
 ?>