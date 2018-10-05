<?php

use Illuminate\Support\Facades\Schema;
use Jenssegers\Mongodb\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mongodb')->create('roles', function ($collection) {
            $collection->increments('id');
            $collection->string('name', 30)->unique();
            $collection->string('description', 100)->nullable();
            $collection->boolean('condition')->default(1);
            $collection->timestamps();
        });
        DB::collection('roles')->insert(array('id'=>'1','name'=>'Developer', 'description'=>'Desarrollador', 'condition'=>'1'));
        DB::collection('roles')->insert(array('id'=>'2','name'=>'SuperAdministrador', 'description'=>'Administradores de área', 'condition'=>'1'));
        DB::collection('roles')->insert(array('id'=>'3','name'=>'Administrador', 'description'=>'Administradores', 'condition'=>'1'));
        DB::collection('roles')->insert(array('id'=>'4','name'=>'Operador', 'description'=>'Operador de área', 'condition'=>'1'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
