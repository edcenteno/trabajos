<?php

  namespace DatosPeru;
error_reporting(0);
$dni=$_POST['dni'];
$placa=$_POST['placa'];
$cabify = $_POST['cabify'];
$easy = $_POST['easy'];

  class Peru  {
    function __construct()
    {
      $this->reniec = new \Reniec\Reniec();
      $this->essalud = new \EsSalud\EsSalud();
      $this->mintra = new \MinTra\mintra();
    }
    function search( $dni )
    {
      $response = $this->reniec->search( $dni );
      if($response->success == true)
      {
        $rpt = (object)array(
          "success"     => true,
          "source"    => "reniec",
          "result"    => $response->result
        );
        return $rpt;
      }

     /* $response = $this->essalud->check( $dni );
      if($response->success == true)
      {
        $rpt = (object)array(
          "success"     => true,
          "source"    => "essalud",
          "result"    => $response->result
        );
        return $rpt;
      }
*/
      /*$response = $this->mintra->check( $dni );
      if( $response->success == true )
      {
        $rpt = (object)array(
          "success"     => true,
          "source"    => "mintra",
          "result"    => $response->result
        );
        return $rpt;
      }*/

      $rpt = (object)array(
        "success"     => false,
        "msg"       => "No se encontraron datos"
      );
      return $rpt;
    }
  }


  require_once( __DIR__ . "/src/autoload.php" );

  $test = new \DatosPeru\Peru();

  $out=$test->search("$dni");

 // var_dump($out);
  $dni=$out->result->DNI;
  //$apellidos=$out->result->ApellidoPaterno;
  $apellidos=$out->result->ApellidoPaterno. " " .$out->result->ApellidoMaterno;
  $nombre=$out->result->Nombres;
  $fechanac=$out->result->FechaNacimiento;



  include "conex.php";

if ($cabify == 1 && $easy == 1) {
  $sentencia="UPDATE conductores SET
                 act = act+1,
                 act_cbf = act_cbf + 1,
                 act_easy = act_easy + 1,
                 fecha_act = NOW( )
                 WHERE dni='".$dni."' ";

$mysqli->query($sentencia) or die ("Error al actualizar datos".mysqli_error($mysqli));
}
if ($cabify == 0 && $easy == 0) {
  $sentencia="UPDATE conductores SET
                 act = act+1,
                 act_cbf = act_cbf + 1,
                 act_easy = act_easy + 1,
                 fecha_act = NOW( )
                 WHERE dni='".$dni."' ";
$mysqli->query($sentencia) or die ("Error al actualizar datos".mysqli_error($mysqli));
echo $sentencia;
}

if ($cabify == 1 && $easy == 0) {
  $sentencia="UPDATE conductores SET
                 act = act+1,
                 act_cbf = act_cbf + 1,
                 fecha_act = NOW( )
                 WHERE dni='".$dni."' ";
$mysqli->query($sentencia) or die ("Error al actualizar datos".mysqli_error($mysqli));
}

if ($cabify == 0 && $easy == 1) {
  $sentencia="UPDATE conductores SET
                 act_easy = act_easy + 1,
                 act = act+1,
                 fecha_act = NOW( )
                 WHERE dni='".$dni."' ";
$mysqli->query($sentencia) or die ("Error al actualizar datos".mysqli_error($mysqli));
}
?>
