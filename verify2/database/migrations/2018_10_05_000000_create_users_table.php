<?php

use Illuminate\Support\Facades\Schema;
use Jenssegers\Mongodb\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mongodb')->create('users', function ($collection) {
            $table->integer('id')->unsigned();
            $collection->foreign('id')->references('id')->on('profiles')->onDelete('cascade');

            $collection->string('ruc')->unique();
            $collection->string('usuario')->unique();
            $collection->string('password');
            $collection->boolean('condicion')->default(1);
            $collection->integer('idrol')->unsigned();
            $collection->foreign('idrol')->references('id')->on('roles');
            $collection->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
