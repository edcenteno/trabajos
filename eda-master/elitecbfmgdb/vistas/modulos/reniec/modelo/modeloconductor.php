<?php

date_default_timezone_set('America/Lima');
require 'vendor3/autoload.php'; // incluir lo bueno de Composer
/*use Modelo\Conductores;*/
use Purekid\Mongodm\Model;
class ModeloConductor extends Model {

        static $collection = "conductores";

        /** use specific config section **/
        public static $config = 'default';

    }