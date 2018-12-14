<?php

  $con=mysqli_connect("localhost","root" , "","arhuantecedentes");

  // Check connection
  if (mysqli_connect_errno())
  {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $tabla="conductores";
  $mes = date("m");


  /////////////////////////////////////////
  //apto
  ////////////////////////////////////////

      $params = ([
                  'resultado'=>'apto',
                  'fecha' => new MongoRegex("/2018-$mes/")
                ]);
      $apto = ModeloConductor::count($params);
      json_encode($apto);
      echo $apto;


  /////////////////////////////////////////
  //noapto
  ////////////////////////////////////////
  $query = "SELECT COUNT(*) as noapto FROM conductores WHERE resultado = 'no apto' and fecha like '2018-$mes%'";
  $result = mysqli_query($con,$query);
  $noapto = array();
  while($r = mysqli_fetch_array($result)) {
    $noapto[] = $r;
  }
  json_encode($noapto);

    /////////////////////////////////////////
  //act_cbf
  ////////////////////////////////////////
  $query = "SELECT COUNT(*) as act_cbf FROM conductores WHERE act_cbf = '1'";
  $result = mysqli_query($con,$query);
  $act_cbf = array();
  while($r = mysqli_fetch_array($result)) {
    $act_cbf[] = $r;
  }
  json_encode($act_cbf);

  /////////////////////////////////////////
  //act_easy
  ////////////////////////////////////////
  $query = "SELECT COUNT(*) as act_easy FROM conductores WHERE act_easy = '1'";
  $result = mysqli_query($con,$query);
  $act_easy = array();
  while($r = mysqli_fetch_array($result)) {
    $act_easy[] = $r;
  }
  json_encode($act_easy);

  /////////////////////////////////////////
  //Mes corriendo
  ////////////////////////////////////////

  /////////////////////////////////////////
  //Dia1
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia1 FROM conductores WHERE fecha like '2018-$mes-01%'";
  $result = mysqli_query($con,$query);
  $dia1 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia1[] = $r;
  }
  json_encode($dia1);



  /////////////////////////////////////////
  //dia2
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia2 FROM conductores WHERE fecha like '2018-$mes-02%'";
  $result = mysqli_query($con,$query);
  $dia2 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia2[] = $r;
  }
  json_encode($dia2);


  /////////////////////////////////////////
  //dia3
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia3 FROM conductores WHERE fecha like '2018-$mes-03%'";
  $result = mysqli_query($con,$query);
  $dia3 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia3[] = $r;
  }
  json_encode($dia3);



  /////////////////////////////////////////
  //dia4
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia4 FROM conductores WHERE fecha like '2018-$mes-04%'";
  $result = mysqli_query($con,$query);
  $dia4 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia4[] = $r;
  }
  json_encode($dia4);


  /////////////////////////////////////////
  //dia5
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia5 FROM conductores WHERE fecha like '2018-$mes-05%'";
  $result = mysqli_query($con,$query);
  $dia5 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia5[] = $r;
  }
  json_encode($dia5);

  /////////////////////////////////////////
  //dia6
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia6 FROM conductores WHERE fecha like '2018-$mes-06%'";
  $result = mysqli_query($con,$query);
  $dia6 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia6[] = $r;
  }
  json_encode($dia6);


/////////////////////////////////////////
  //dia7
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia7 FROM conductores WHERE fecha like '2018-$mes-07%'";
  $result = mysqli_query($con,$query);
  $dia7 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia7[] = $r;
  }
  json_encode($dia7);


/////////////////////////////////////////
  //dia8
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia8 FROM conductores WHERE fecha like '2018-$mes-08%'";
  $result = mysqli_query($con,$query);
  $dia8 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia8[] = $r;
  }
  json_encode($dia8);


/////////////////////////////////////////
  //dia9
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia9 FROM conductores WHERE fecha like '2018-$mes-09%'";
  $result = mysqli_query($con,$query);
  $dia9 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia9[] = $r;
  }
  json_encode($dia9);


/////////////////////////////////////////
  //dia10
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia10 FROM conductores WHERE fecha like '2018-$mes-10%'";
  $result = mysqli_query($con,$query);
  $dia10 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia10[] = $r;
  }
  json_encode($dia10);


/////////////////////////////////////////
  //dia11
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia11 FROM conductores WHERE fecha like '2018-$mes-11%'";
  $result = mysqli_query($con,$query);
  $dia11 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia11[] = $r;
  }
  json_encode($dia11);


/////////////////////////////////////////
  //dia12
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia12 FROM conductores WHERE fecha like '2018-$mes-12%'";
  $result = mysqli_query($con,$query);
  $dia12 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia12[] = $r;
  }
  json_encode($dia12);


/////////////////////////////////////////
  //dia13
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia13 FROM conductores WHERE fecha like '2018-$mes-13%'";
  $result = mysqli_query($con,$query);
  $dia13 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia13[] = $r;
  }
  json_encode($dia13);


/////////////////////////////////////////
  //dia14
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia14 FROM conductores WHERE fecha like '2018-$mes-14%'";
  $result = mysqli_query($con,$query);
  $dia14 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia14[] = $r;
  }
  json_encode($dia14);


/////////////////////////////////////////
  //dia15
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia15 FROM conductores WHERE fecha like '2018-$mes-15%'";
  $result = mysqli_query($con,$query);
  $dia15 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia15[] = $r;
  }
  json_encode($dia15);


/////////////////////////////////////////
  //dia16
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia16 FROM conductores WHERE fecha like '2018-$mes-16%'";
  $result = mysqli_query($con,$query);
  $dia16 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia16[] = $r;
  }
  json_encode($dia16);


/////////////////////////////////////////
  //dia17
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia17 FROM conductores WHERE fecha like '2018-$mes-17%'";
  $result = mysqli_query($con,$query);
  $dia17 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia17[] = $r;
  }
  json_encode($dia17);


/////////////////////////////////////////
  //dia18
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia18 FROM conductores WHERE fecha like '2018-$mes-18%'";
  $result = mysqli_query($con,$query);
  $dia18 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia18[] = $r;
  }
  json_encode($dia18);


/////////////////////////////////////////
  //dia19
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia19 FROM conductores WHERE fecha like '2018-$mes-19%'";
  $result = mysqli_query($con,$query);
  $dia19 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia19[] = $r;
  }
  json_encode($dia19);


/////////////////////////////////////////
  //dia20
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia20 FROM conductores WHERE fecha like '2018-$mes-20%'";
  $result = mysqli_query($con,$query);
  $dia20 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia20[] = $r;
  }
  json_encode($dia20);


/////////////////////////////////////////
  //dia21
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia21 FROM conductores WHERE fecha like '2018-$mes-21%'";
  $result = mysqli_query($con,$query);
  $dia21 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia21[] = $r;
  }
  json_encode($dia21);


/////////////////////////////////////////
  //dia22
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia22 FROM conductores WHERE fecha like '2018-$mes-22%'";
  $result = mysqli_query($con,$query);
  $dia22 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia22[] = $r;
  }
  json_encode($dia22);


/////////////////////////////////////////
  //dia23
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia23 FROM conductores WHERE fecha like '2018-$mes-23%'";
  $result = mysqli_query($con,$query);
  $dia23 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia23[] = $r;
  }
  json_encode($dia23);


/////////////////////////////////////////
  //dia24
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia24 FROM conductores WHERE fecha like '2018-$mes-24%'";
  $result = mysqli_query($con,$query);
  $dia24 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia24[] = $r;
  }
  json_encode($dia24);


/////////////////////////////////////////
  //dia25
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia25 FROM conductores WHERE fecha like '2018-$mes-25%'";
  $result = mysqli_query($con,$query);
  $dia25 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia25[] = $r;
  }
  json_encode($dia25);


/////////////////////////////////////////
  //dia26
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia26 FROM conductores WHERE fecha like '2018-$mes-26%'";
  $result = mysqli_query($con,$query);
  $dia26 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia26[] = $r;
  }
  json_encode($dia26);


/////////////////////////////////////////
  //dia27
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia27 FROM conductores WHERE fecha like '2018-$mes-27%'";
  $result = mysqli_query($con,$query);
  $dia27 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia27[] = $r;
  }
  json_encode($dia27);


/////////////////////////////////////////
  //dia28
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia28 FROM conductores WHERE fecha like '2018-$mes-28%'";
  $result = mysqli_query($con,$query);
  $dia28 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia28[] = $r;
  }
  json_encode($dia28);


/////////////////////////////////////////
  //dia29
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia29 FROM conductores WHERE fecha like '2018-$mes-29%'";
  $result = mysqli_query($con,$query);
  $dia29 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia29[] = $r;
  }
  json_encode($dia29);


/////////////////////////////////////////
  //dia30
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia30 FROM conductores WHERE fecha like '2018-$mes-30%'";
  $result = mysqli_query($con,$query);
  $dia30 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia30[] = $r;
  }
  json_encode($dia30);

  /////////////////////////////////////////
  //dia31
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia31 FROM conductores WHERE fecha like '2018-$mes-31%'";
  $result = mysqli_query($con,$query);
  $dia31 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia31[] = $r;
  }
  json_encode($dia31);

  /////////////////////////////////////////
  //Mes anterior
  ////////////////////////////////////////

  /////////////////////////////////////////
  //Dia1
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia01 FROM conductores WHERE fecha like '2018-07-01%'";
  $result = mysqli_query($con,$query);
  $dia01 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia01[] = $r;
  }
  json_encode($dia01);



  /////////////////////////////////////////
  //dia02
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia02 FROM conductores WHERE fecha like '2018-07-02%'";
  $result = mysqli_query($con,$query);
  $dia02 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia02[] = $r;
  }
  json_encode($dia02);


  /////////////////////////////////////////
  //dia03
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia03 FROM conductores WHERE fecha like '2018-07-03%'";
  $result = mysqli_query($con,$query);
  $dia03 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia03[] = $r;
  }
  json_encode($dia03);



  /////////////////////////////////////////
  //dia04
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia04 FROM conductores WHERE fecha like '2018-07-04%'";
  $result = mysqli_query($con,$query);
  $dia04 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia04[] = $r;
  }
  json_encode($dia04);


  /////////////////////////////////////////
  //dia05
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia05 FROM conductores WHERE fecha like '2018-07-05%'";
  $result = mysqli_query($con,$query);
  $dia05 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia05[] = $r;
  }
  json_encode($dia05);

  /////////////////////////////////////////
  //dia6
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia06 FROM conductores WHERE fecha like '2018-07-06%'";
  $result = mysqli_query($con,$query);
  $dia06 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia06[] = $r;
  }
  json_encode($dia06);


/////////////////////////////////////////
  //dia07
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia07 FROM conductores WHERE fecha like '2018-07-07%'";
  $result = mysqli_query($con,$query);
  $dia07 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia07[] = $r;
  }
  json_encode($dia07);


/////////////////////////////////////////
  //dia08
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia08 FROM conductores WHERE fecha like '2018-07-08%'";
  $result = mysqli_query($con,$query);
  $dia08 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia08[] = $r;
  }
  json_encode($dia08);


/////////////////////////////////////////
  //dia09
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia09 FROM conductores WHERE fecha like '2018-07-09%'";
  $result = mysqli_query($con,$query);
  $dia09 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia09[] = $r;
  }
  json_encode($dia09);


/////////////////////////////////////////
  //dia010
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia010 FROM conductores WHERE fecha like '2018-07-10%'";
  $result = mysqli_query($con,$query);
  $dia010 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia010[] = $r;
  }
  json_encode($dia010);


/////////////////////////////////////////
  //dia011
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia011 FROM conductores WHERE fecha like '2018-07-11%'";
  $result = mysqli_query($con,$query);
  $dia011 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia011[] = $r;
  }
  json_encode($dia011);


/////////////////////////////////////////
  //dia012
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia012 FROM conductores WHERE fecha like '2018-07-12%'";
  $result = mysqli_query($con,$query);
  $dia012 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia012[] = $r;
  }
  json_encode($dia012);


/////////////////////////////////////////
  //dia013
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia013 FROM conductores WHERE fecha like '2018-07-13%'";
  $result = mysqli_query($con,$query);
  $dia013 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia013[] = $r;
  }
  json_encode($dia013);


/////////////////////////////////////////
  //dia014
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia014 FROM conductores WHERE fecha like '2018-07-14%'";
  $result = mysqli_query($con,$query);
  $dia014 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia014[] = $r;
  }
  json_encode($dia014);


/////////////////////////////////////////
  //dia015
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia015 FROM conductores WHERE fecha like '2018-07-15%'";
  $result = mysqli_query($con,$query);
  $dia015 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia015[] = $r;
  }
  json_encode($dia015);


/////////////////////////////////////////
  //dia016
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia016 FROM conductores WHERE fecha like '2018-07-16%'";
  $result = mysqli_query($con,$query);
  $dia016 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia016[] = $r;
  }
  json_encode($dia016);


/////////////////////////////////////////
  //dia017
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia017 FROM conductores WHERE fecha like '2018-07-17%'";
  $result = mysqli_query($con,$query);
  $dia017 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia017[] = $r;
  }
  json_encode($dia017);


/////////////////////////////////////////
  //dia018
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia018 FROM conductores WHERE fecha like '2018-07-18%'";
  $result = mysqli_query($con,$query);
  $dia018 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia018[] = $r;
  }
  json_encode($dia018);


/////////////////////////////////////////
  //dia019
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia019 FROM conductores WHERE fecha like '2018-07-19%'";
  $result = mysqli_query($con,$query);
  $dia019 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia019[] = $r;
  }
  json_encode($dia019);


/////////////////////////////////////////
  //dia020
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia020 FROM conductores WHERE fecha like '2018-07-20%'";
  $result = mysqli_query($con,$query);
  $dia020 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia020[] = $r;
  }
  json_encode($dia020);


/////////////////////////////////////////
  //dia021
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia021 FROM conductores WHERE fecha like '2018-07-21%'";
  $result = mysqli_query($con,$query);
  $dia021 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia021[] = $r;
  }
  json_encode($dia021);


/////////////////////////////////////////
  //dia022
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia022 FROM conductores WHERE fecha like '2018-07-22%'";
  $result = mysqli_query($con,$query);
  $dia022 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia022[] = $r;
  }
  json_encode($dia022);


/////////////////////////////////////////
  //dia23
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia023 FROM conductores WHERE fecha like '2018-07-23%'";
  $result = mysqli_query($con,$query);
  $dia023 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia023[] = $r;
  }
  json_encode($dia023);


/////////////////////////////////////////
  //dia024
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia024 FROM conductores WHERE fecha like '2018-07-24%'";
  $result = mysqli_query($con,$query);
  $dia024 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia024[] = $r;
  }
  json_encode($dia024);


/////////////////////////////////////////
  //dia025
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia025 FROM conductores WHERE fecha like '2018-07-25%'";
  $result = mysqli_query($con,$query);
  $dia025 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia025[] = $r;
  }
  json_encode($dia025);


/////////////////////////////////////////
  //dia26
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia026 FROM conductores WHERE fecha like '2018-07-26%'";
  $result = mysqli_query($con,$query);
  $dia026 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia026[] = $r;
  }
  json_encode($dia026);


/////////////////////////////////////////
  //dia027
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia027 FROM conductores WHERE fecha like '2018-07-27%'";
  $result = mysqli_query($con,$query);
  $dia027 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia027[] = $r;
  }
  json_encode($dia027);


/////////////////////////////////////////
  //dia028
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia028 FROM conductores WHERE fecha like '2018-07-28%'";
  $result = mysqli_query($con,$query);
  $dia028 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia028[] = $r;
  }
  json_encode($dia028);


/////////////////////////////////////////
  //dia029
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia029 FROM conductores WHERE fecha like '2018-07-29%'";
  $result = mysqli_query($con,$query);
  $dia029 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia029[] = $r;
  }
  json_encode($dia029);


/////////////////////////////////////////
  //dia030
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia030 FROM conductores WHERE fecha like '2018-07-30%'";
  $result = mysqli_query($con,$query);
  $dia030 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia030[] = $r;
  }
  json_encode($dia030);

  /////////////////////////////////////////
  //dia31
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as dia031 FROM conductores WHERE fecha like '2018-07-31%'";
  $result = mysqli_query($con,$query);
  $dia031 = array();
  while($r = mysqli_fetch_array($result)) {
    $dia031[] = $r;
  }
  json_encode($dia031);


  /////////////////////////////////////////
  //Mayo
  ////////////////////////////////////////
  $query = "SELECT COUNT(*) as mayo FROM conductores WHERE fecha like '2018-05%' ";
  $result = mysqli_query($con,$query);
  $mayo = array();
  while($r = mysqli_fetch_array($result)) {
    $mayo[] = $r;
  }
  json_encode($mayo);

  /////////////////////////////////////////
  //Junio
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as junio FROM conductores WHERE fecha like '2018-06%' ";
  $result = mysqli_query($con,$query);
  $junio = array();
  while($r = mysqli_fetch_array($result)) {
    $junio[] = $r;
  }
  json_encode($junio);

  /////////////////////////////////////////
  //Julio
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as julio FROM conductores WHERE fecha like '2018-07%'";
  $result = mysqli_query($con,$query);
  $julio = array();
  while($r = mysqli_fetch_array($result)) {
    $julio[] = $r;
  }
  json_encode($julio);


  /////////////////////////////////////////
  //agosto
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as agosto FROM conductores WHERE fecha like '2018-08%'";
  $result = mysqli_query($con,$query);
  $agosto = array();
  while($r = mysqli_fetch_array($result)) {
    $agosto[] = $r;
  }
  json_encode($agosto);


  /////////////////////////////////////////
  //septiembre
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as septiembre FROM conductores WHERE fecha like '2018-09%'";
  $result = mysqli_query($con,$query);
  $septiembre = array();
  while($r = mysqli_fetch_array($result)) {
    $septiembre[] = $r;
  }
  json_encode($septiembre);


  /////////////////////////////////////////
  //octubre
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as octubre FROM conductores WHERE fecha like '2018-10%'";
  $result = mysqli_query($con,$query);
  $octubre = array();
  while($r = mysqli_fetch_array($result)) {
    $octubre[] = $r;
  }
  json_encode($octubre);


  /////////////////////////////////////////
  //noviembre
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as noviembre FROM conductores WHERE fecha like '2018-11%'";
  $result = mysqli_query($con,$query);
  $noviembre = array();
  while($r = mysqli_fetch_array($result)) {
    $noviembre[] = $r;
  }
  json_encode($noviembre);


  /////////////////////////////////////////
  //diciembre
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as diciembre FROM conductores WHERE fecha like '2018-12%'";
  $result = mysqli_query($con,$query);
  $diciembre = array();
  while($r = mysqli_fetch_array($result)) {
    $diciembre[] = $r;
  }
  json_encode($diciembre);

    /////////////////////////////////////////
  //enero
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as enero FROM conductores WHERE fecha like '2018-01%'";
  $result = mysqli_query($con,$query);
  $enero = array();
  while($r = mysqli_fetch_array($result)) {
    $enero[] = $r;
  }
  json_encode($enero);


  /////////////////////////////////////////
  //febrero
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as febrero FROM conductores WHERE fecha like '2018-02%'";
  $result = mysqli_query($con,$query);
  $febrero = array();
  while($r = mysqli_fetch_array($result)) {
    $febrero[] = $r;
  }
  json_encode($febrero);


  /////////////////////////////////////////
  //marzo
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as marzo FROM conductores WHERE fecha like '2018-03%'";
  $result = mysqli_query($con,$query);
  $marzo = array();
  while($r = mysqli_fetch_array($result)) {
    $marzo[] = $r;
  }
  json_encode($marzo);


  /////////////////////////////////////////
  //abril
  ////////////////////////////////////////

  $query = "SELECT COUNT(*) as abril FROM conductores WHERE fecha like '2018-04%'";
  $result = mysqli_query($con,$query);
  $abril = array();
  while($r = mysqli_fetch_array($result)) {
    $abril[] = $r;
  }
  json_encode($abril);




  mysqli_close($con);
?>