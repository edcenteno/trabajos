<?php

//controladores
require_once "controladores/plantilla.controlador.php";
require_once "controladores/clientes.controlador.php";
require_once "controladores/usuarios.controlador.php";


//modelos
require_once "modelos/clientes.modelo.php";
require_once "modelos/usuarios.modelo.php";



$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();