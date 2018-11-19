<?php
namespace Modelo;
use Purekid\Mongodm\Model;

    class Usuarios extends Model
    {

        static $collection = "usuario_cabify";

        /** use specific config section **/
        public static $config = 'default';

    }