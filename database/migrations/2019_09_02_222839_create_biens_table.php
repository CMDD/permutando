<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mensaje_id')->unsigned()->nullable();
            $table->string('tipo')->nullable();
            $table->string('bien')->nullable();
            $table->string('valor')->nullable();
            $table->integer('inmueble_id')->unsigned()->nullable();
            $table->foreign('inmueble_id')
                  ->references('id')
                  ->on('inmuebles')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('biens');
    }
}
