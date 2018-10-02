<?php

use Illuminate\Support\Facades\Schema;
use Jenssegers\Mongodb\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::connection('mongodb')->create('companys', function ($collection) {
            $collection->increments('id');
            $collection->string('ruc', 11)->unique();
            $collection->longText('razon_social');
            $collection->string('condicion', 20);
            $collection->string('nombre_comercial', 250);
            $collection->string('tipo', 150);
            $collection->date('fecha_inscripcion');
            $collection->string('estado', 10);
            $collection->longText('direccion')->nullable();
            $collection->string('sistema_emision', 250);
            $collection->string('actividad_exterior', 250);
            $collection->string('oficio', 250)->nullable();
            $collection->string('actividad_economica', 250)->nullable();
            $collection->string('sistema_contabilidad', 100);
            $collection->date('emision_electronica');
            $collection->string('ple', 250)->nullable();
            $collection->longText('representantes_legales')->nullable();
            $collection->longText('cantidad_trabajadores')->nullable();
            $collection->string('telefono', 12)->nullable();
            $collection->string('email', 200)->nullable();
            $collection->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companys');
    }
}
