<?php
namespace Modelo;
require 'vendor/autoload.php';
use Purekid\Mongodm\Model;

class Modelo extends Model {



    public static $collection = "coleccion";

    /** use specific config section **/
    public static $config = 'default';
}