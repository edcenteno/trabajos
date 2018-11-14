<?php
require_once("srchector/autoload.php" );
require 'modelo/modeloconductor.php';

  $essalud = new \EsSalud\EsSalud();
  $mintra = new \MinTra\mintra();


  $conductores = ModeloConductor::one(['dni'=>$dni]);
  $act = $conductores->act;
  $act++;
  $act_cbf = $conductores->act_cbf;
  $act_cbf++;
  $act_easy = $conductores->act_easy;
  $act_easy ++;

  $fecha_reg = date("Y-m-d H:i:s");
  $dni=$_POST['dni'];
  $placa=$_POST['placa'];
  $cabify = $_POST['cabify'];
  $easy = $_POST['easy'];
  $type = $_POST['type'];

  $search1 = $essalud->search( $dni );

    if( $search1->success == true ){
        $nombre = $search1->Nombres;
        $apellido = $search1->ApellidoPaterno;
        $apellidom = $search1->ApellidoMaterno;
        $fecha_nacimiento = $search1->FechaNacimiento;

    }else{
        $search2 = $mintra->search( $dni );
         if( $search2->success == true ){
              $nombre = $search2->nombre;
              $apellido = $search2->paterno;
              $apellidom = $search2->materno;
              $fecha_nacimiento = $search2->nacimiento;

          }

 // var_dump($out);
if ($type == 1) {
  $dni=$out->result->DNI;
  $apellidos=$out->result->ApellidoPaterno. " " .$out->result->ApellidoMaterno;
  $nombre=$out->result->Nombres;
  $fechanac=$out->result->FechaNacimiento;


  $conductores->update([
                        'nombre'=>$nombre,
                        'apellido'=>$apellidos,
                        'fecha_nacimiento'=>$fechanac,
                        'resultado'=>''
                            ]);
  $conductores->save();

}



if ($placa == "NINGUNO" || $placa == "" || $placa == "NINGUNA") {

  if ($cabify == 1 && $easy == 1) {

    $conductores->update([
                          'act'=>$act,
                          'act_cbf'=>$act_cbf,
                          'act_easy'=>$act_easy,
                          'fecha_act'=>$fecha_reg
                              ]);
    $conductores->save();

  }

  if ($cabify == 0 && $easy == 0) {

    $conductores->update([
                          'act'=>$act,
                          'act_cbf'=>$act_cbf,
                          'act_easy'=>$act_easy,
                          'fecha_act'=>$fecha_reg
                              ]);
    $conductores->save();

  }

  if ($cabify == 1 && $easy == 0) {

   $conductores->update([
                        'act'=>$act,
                        'act_cbf'=>$act_cbf,
                        'fecha_act'=>$fecha_reg
                            ]);
    $conductores->save();

  }

  if ($cabify == 0 && $easy == 1) {

   $conductores->update([
                        'act'=>$act,
                        'act_easy'=>$act_easy,
                        'fecha_act'=>$fecha_reg
                            ]);
    $conductores->save();

  }

}else {
   // Modo de Uso
    require_once("crv/src/autoload.php");

    $test = new \Pit\Pit();
    $out=$test->check( "$placa" ); // Sin Requisitoria


    $crv = $out['message'];
    //echo $crv;

$token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.MTA2MQ.mNioS0vL0ckba0lPV955HvekjFHzvIcqEVqy1_kBerM';//token prestado
$query = "
query {
    soat(placa:\"$placa\") {
        NombreCompania
        FechaInicio
        FechaFin
        Estado
    }
}";


$body = json_encode($query);
$headers = [
    'Content-Type: application/json',
    'Content-Length: '.strlen($body),
    'Authorization: Bearer ' . $token,
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"http://quertium.com/api/v1/apeseg/soat/$placa");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$jsonString = curl_exec ($ch);
curl_close ($ch);
$out = json_decode($jsonString, true);
/*//echo "<pre>";
var_dump($out);

//echo"</pre>";*/


$dni = $_POST['dni'];
$estado = $out['Estado'];
$FechaInicio = $out['FechaInicio'];
$FechaFin = $out['FechaFin'];
$NombreCompania= $out['NombreCompania'];
$NumeroPoliza = $out['NumeroPoliza'];
$NombreUsoVehiculo = $out['NombreUsoVehiculo'];
$NombreClaseVehiculo = $out['NombreClaseVehiculo'];
$FechaControlPolicial = $out['FechaControlPolicial'];
$TipoCertificado = $out['TipoCertificado'];


if ($estado == "VIGENTE") {
  $soat = "VIGENTE";

  if ($cabify == 1 && $easy == 1) {

      $conductores->update([
          'act'=>$act,
          'act_cbf'=>$act_cbf,
          'act_easy'=>$act_easy,
          'fecha_act'=>$fecha_reg,
          'soat'=>$estado,
          'fecha_inicio_soat'=>$FechaInicio,
          'fecha_fin_soat'=>$FechaFin,
          'nombrecompania'=>$NombreCompania,
          'numeropoliza'=>$NumeroPoliza,
          'NombreUsoVehiculo'=>$NombreUsoVehiculo,
          'orden_captura'=>$crv,
          'nombreclasevehiculo'=>$NombreClaseVehiculo,
          'fechacontrolpolicial'=>$FechaControlPolicial,
          'contsoat'=>$contsoat,
          'observacion'=>'',
          'resultado'=>'APTO',
          'TipoCertificado'=>$TipoCertificado
              ]);
      $conductores->save();

  }
if ($cabify == 0 && $easy == 0) {
  $conductores->update([
          'act'=>$act,
          'act_cbf'=>$act_cbf,
          'act_easy'=>$act_easy,
          'fecha_act'=>$fecha_reg,
          'soat'=>$estado,
          'fecha_inicio_soat'=>$FechaInicio,
          'fecha_fin_soat'=>$FechaFin,
          'nombrecompania'=>$NombreCompania,
          'numeropoliza'=>$NumeroPoliza,
          'NombreUsoVehiculo'=>$NombreUsoVehiculo,
          'orden_captura'=>$crv,
          'nombreclasevehiculo'=>$NombreClaseVehiculo,
          'fechacontrolpolicial'=>$FechaControlPolicial,
          'contsoat'=>$contsoat,
          'observacion'=>'',
          'resultado'=>'APTO',
          'TipoCertificado'=>$TipoCertificado
              ]);
      $conductores->save();
  }

  if ($cabify == 1 && $easy == 0) {

    $conductores->update([
          'act'=>$act,
          'act_cbf'=>$act_cbf,
          'fecha_act'=>$fecha_reg,
          'soat'=>$estado,
          'fecha_inicio_soat'=>$FechaInicio,
          'fecha_fin_soat'=>$FechaFin,
          'nombrecompania'=>$NombreCompania,
          'numeropoliza'=>$NumeroPoliza,
          'NombreUsoVehiculo'=>$NombreUsoVehiculo,
          'orden_captura'=>$crv,
          'nombreclasevehiculo'=>$NombreClaseVehiculo,
          'fechacontrolpolicial'=>$FechaControlPolicial,
          'contsoat'=>$contsoat,
          'observacion'=>'',
          'resultado'=>'APTO',
          'TipoCertificado'=>$TipoCertificado
              ]);
      $conductores->save();
  }

  if ($cabify == 0 && $easy == 1) {

      $conductores->update([
          'act'=>$act,
          'act_easy'=>$act_easy,
          'fecha_act'=>$fecha_reg,
          'soat'=>$estado,
          'fecha_inicio_soat'=>$FechaInicio,
          'fecha_fin_soat'=>$FechaFin,
          'nombrecompania'=>$NombreCompania,
          'numeropoliza'=>$NumeroPoliza,
          'NombreUsoVehiculo'=>$NombreUsoVehiculo,
          'orden_captura'=>$crv,
          'nombreclasevehiculo'=>$NombreClaseVehiculo,
          'fechacontrolpolicial'=>$FechaControlPolicial,
          'contsoat'=>$contsoat,
          'observacion'=>'',
          'resultado'=>'APTO',
          'TipoCertificado'=>$TipoCertificado
              ]);
      $conductores->save();
  }
} else {
  $soat = 'El vehiculo consultado no posee SOAT';

  if ($cabify == 1 && $easy == 1) {

    $conductores->update([
          'act'=>$act,
          'act_cbf'=>$act_cbf,
          'act_easy'=>$act_easy,
          'fecha_act'=>$fecha_reg,
          'soat'=>$soat,
          'observacion'=>$soat,
          'resultado'=>'NO APTO'
              ]);
    $conductores->save();

  }
if ($cabify == 0 && $easy == 0) {
  $sentencia="UPDATE conductores SET
                 act = act+1,
                 act_cbf = act_cbf + 1,
                 act_easy = act_easy + 1,
                 fecha_act = '".$fecha_reg."',
                 soat = '".$soat."',
                 placa = '".$placa."',
                 orden_captura = '".$crv."',
                 observacion = '".$soat."',
                 resultado = 'NO APTO'
                 WHERE dni='".$dni."' ";
$mysqli->query($sentencia) or die ("Error al actualizar datos".mysqli_error($mysqli));
////echo $sentencia;
}

if ($cabify == 1 && $easy == 0) {
  $sentencia="UPDATE conductores SET
                 act = act+1,
                 act_cbf = act_cbf + 1,
                 fecha_act = '".$fecha_reg."',
                 soat = '".$soat."',
                 placa = '".$placa."',
                 orden_captura = '".$crv."',
                 observacion = '".$soat."',
                 resultado = 'NO APTO'
                 WHERE dni='".$dni."' ";
$mysqli->query($sentencia) or die ("Error al actualizar datos".mysqli_error($mysqli));
////echo $sentencia;
}

if ($cabify == 0 && $easy == 1) {
  $sentencia="UPDATE conductores SET
                 act_easy = act_easy + 1,
                 act = act+1,
                 fecha_act = '".$fecha_reg."',
                 soat = '".$soat."',
                 placa = '".$placa."',
                 orden_captura = '".$crv."',
                 observacion = '".$soat."',
                  resultado = 'NO APTO'
                  WHERE dni='".$dni."' ";
$mysqli->query($sentencia) or die ("Error al actualizar datos".mysqli_error($mysqli));
}
}

}


?>