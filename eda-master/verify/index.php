<?php

//controladores
require_once "controladores/plantilla.controlador.php";
require_once "controladores/clientes.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/personas.controlador.php";
require_once "controladores/items.controlador.php";
require_once "controladores/roles.controlador.php";


//modelos
require_once "modelos/clientes.modelo.php";
require_once "modelos/usuarios.modelo.php";
require_once "modelos/personas.modelo.php";
require_once "modelos/items.modelo.php";
require_once "modelos/roles.modelo.php";



$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();