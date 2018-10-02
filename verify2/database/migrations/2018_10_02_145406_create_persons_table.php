<?php

use Illuminate\Support\Facades\Schema;
use Jenssegers\Mongodb\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mongodb')->create('persons', function ($collection) {
            $collection->increments('id');
            $collection->string('doc_type', 1);
            $collection->string('doc_value', 12)->unique();
            $collection->string('name', 250);
            $collection->string('first_last_name', 250);
            $collection->string('last_last_name', 250);
            $collection->string('id_company', 200);
            $collection->string('phone', 12);
            $collection->string('email', 250);

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
        Schema::dropIfExists('persons');
    }
}
