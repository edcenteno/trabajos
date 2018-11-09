<?php
namespace Modelo;
use Purekid\Mongodm\Model;

    class Provincias extends Model
    {

        static $collection = "provincias";

        /** use specific config section **/
        public static $config = 'default';

    }