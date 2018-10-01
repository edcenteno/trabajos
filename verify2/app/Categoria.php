<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Categoria extends Eloquent
{
        //realiza el llamado a la BD que me conecto y coleccion (tabla) que trabajare
        protected $connection = 'mongodb';
        protected $collection = 'categorias';


        //protected $table = 'categorias'; //toma por defecto el primary key y la tabla, (las tablas tienen S al final la clase sin S)
        protected $fillable = ['nombre','descripcion','condicion','precio'];


}
