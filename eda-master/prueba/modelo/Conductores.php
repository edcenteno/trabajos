<?php
namespace Modelo;
use Purekid\Mongodm\Model;

    class Conductores extends Model
    {

        static $collection = "conductores";

        /** use specific config section **/
        public static $config = 'default';

    }