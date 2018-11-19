<?php
require 'vendor/autoload.php'; // incluir lo bueno de Composer
use Modelo\Conductores;
use Modelo\Provincias;
use Modelo\Usuarios;
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
    /*$conductores = Conductores::all()->sortBy(function($conductor){
    return $conductor->_id;

    })->take(1);*/
   // var_dump($conductores);
   /* foreach ($conductores as $key => $value) {
        echo $value->secuencia_arhu_ant . "<br>";
       // echo $value->id_provincia . "<br>";

    }*/
   //var_dump($conductores)

  //reverse collection items
  //echo "<pre>";
  //var_dump($conductores['nombre']);
  /*echo $conductores[0]->secuencia_arhu_ant;*/
  //  echo "</pre>";
  //
   //$conductores = Conductores::count({"fecha": /.*2018-11.*/});
   // $regex = new MongoRegex("/.*2018-11-10.*/");
//$collection->find(array('street_name' => $regex));
  //$regex = new MongoRegex("/.*2018-11-10.*/");
  //$params = array('fecha'=> "/.*2018-11-10.*/");
  //$users = Conductores::find(['dni'=> "/.4.*/"]);     // $users is instance of Collection
  //$users = Conductores::count(array("fecha" => new MongoRegex("/2018-11/")));
  //var_dump($users);
  /*echo $users;*/

  /* $count = Conductores::count(array('fecha'=>2018-11));
   echo $count;*/

/*   $dia=0;
   $mes=10;
  while ($dia <= 31) {
    $dia++;
    $cond = Conductores::count([
                                  'fecha' => new MongoRegex("/2018-$mes-$dia/")
                                ]);
    var_dump($cond) ;
  }*/
$datos = 'admin';
$usuarioscabify = Usuarios::one(['usuario'=>$datos]);
//$usuarioscabify = Usuarios::all();
//var_dump($usuarioscabify);
$usuarioscabify->delete();

?>