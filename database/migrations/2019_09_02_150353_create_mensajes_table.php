<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMensajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensajes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('from')->unsigned()->nullable();
            $table->integer('to')->unsigned()->nullable();
            $table->integer('inmueble')->unsigned()->nullable();

            $table->string('tipo')->nullable();
            $table->string('nombre')->nullable();
            $table->string('tel')->nullable();
            $table->string('email')->nullable(); 
            $table->text('mensaje')->nullable();      
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
        Schema::dropIfExists('mensajes');
    }
}
