<?php
require 'vendor/autoload.php'; // incluir lo bueno de Composer
use Modelo\Conductores;
use Modelo\Provincias;
/*$conductores = Conductores::all();
$count = Conductores::count(array('id_provincia'=>'5'));

$params = array( 'dni'=>'41762372');
$users = Conductores::one($params);     // $users is instance of Collection
echo $users->nombre;*/
//var_dump($users);

/*foreach ($conductores as $key => $value) {
   echo $value->dni;
   break;
}*/

//var_dump($count);
//
//
      /*  $usuarioscabify = Conductores::one([
            'usuario'=>'edcenteno'
            ]);
        $fecha = $usuarioscabify->nombre;
*/
        /*$usuarioscabify->update([
            $item1=>$valor1
        ]);*/
      /*  $usuarioscabify->nombre = 'ed1';
        $usuarioscabify->save();
*/
       // var_dump($usuarioscabify);

        /*if($fecha != $usuarioscabify->nombre){

            echo "ok";

        }else{

            echo "error";

        }*/
        //$usuarioscabify->save();
       // echo "<pre>";
      //  var_dump($usuarioscabify);
        //echo "</pre>";
        //
        //
   /* $usuarioscabify = Conductores::all();


    //var_dump($provincias);

    //echo "<pre>";
    foreach ($usuarioscabify as $key => $value) {
        echo $value->nombre . "<br>";
        echo $value->id_provincia . "<br>";


     $provincias = Provincias::one(['id'=>$value->id_provincia
            ]);
     echo $provincias->descripcion . "<br>";
    break;
    }*/
    $conductores = Conductores::all()->sortBy(function($conductor){
    return $conductor->_id;

    })->take(1);
   // var_dump($conductores);
   /* foreach ($conductores as $key => $value) {
        echo $value->secuencia_arhu_ant . "<br>";
       // echo $value->id_provincia . "<br>";

    }*/
   //var_dump($conductores)




  //reverse collection items
  //echo "<pre>";
  //var_dump($conductores['nombre']);
  echo $conductores[0]->secuencia_arhu_ant;
  //  echo "</pre>";

?>