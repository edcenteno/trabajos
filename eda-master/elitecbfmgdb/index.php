<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/conductores.controlador.php";

require_once "modelos/usuarios.modelo.php";
require_once "modelos/conductores.modelo.php";
require_once "modelos/prospecto.modelo.php";

require 'vendor/autoload.php'; //


$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();