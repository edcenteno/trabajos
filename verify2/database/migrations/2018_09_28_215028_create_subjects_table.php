<?php

use Illuminate\Support\Facades\Schema;
use Jenssegers\Mongodb\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        Schema::connection('mongodb')->create('subjects', function ($collection) {
            $collection->string('doc_type', 1);
            $collection->string('doc_value', 12);
            $collection->string('name', 250);
            $collection->string('first_last_name', 250);
            $collection->string('last_last_name', 250);
            $collection->date('birthday');
            $collection->boolean('condicion')->default(1);
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
        Schema::dropIfExists('subjects');
    }
}
