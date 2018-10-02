<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Company extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'companys';

    protected $fillable = ['ruc','razon_social','condicion','nombre_comercial','tipo','fecha_inscripcion','estado','direccion','sistema_emision','actividad_exterior','oficio','actividad_economica','sistema_contabilidad','emision_electronica','ple','emision_electronica','cantidad_trabajadores'];
}
