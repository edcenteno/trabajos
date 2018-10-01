<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Subject extends Eloquent
{
        //realiza el llamado a la BD que me conecto y coleccion (tabla) que trabajare
        protected $connection = 'mongodb';
        protected $collection = 'subjects';

        protected $fillable = ['doc_type','doc_value','name','first_last_name','last_last_name','birthday'];


}
