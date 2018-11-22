<?php

require 'vendor/autoload.php'; //

use Purekid\Mongodm\Model;


class ModeloConductor extends Model {

        static $collection = "conductores";

        /** use specific config section **/
        public static $config = 'default';
}
?>