<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChaletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chalets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('holidaypark_id');
            $table->text('description'); 
            $table->decimal('price');
            $table->string('country');
            $table->integer('housenr');
            $table->string('addition')->nullable();
            $table->string('street');
            $table->string('place');
            $table->float('longitude', 8, 6);
            $table->float('latitude', 8, 6);
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chalets');
    }
}