<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
       //protected $table = 'categorias'; //toma por defecto el primary key y la tabla, (las tablas tienen S al final la clase sin S)
        protected $fillable = ['nombre','descripcion','condicion'];
}
