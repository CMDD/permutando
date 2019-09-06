<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo_inmueble')->nullable();
            $table->string('tipo_publicacion')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('valor')->nullable();
            $table->string('imagen')->nullable();

            $table->integer('inmueble_id')->unsigned()->nullable();
            $table->foreign('inmueble_id')
                  ->references('id')
                  ->on('inmuebles')
                  ->onDelete('cascade');

            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
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
        Schema::dropIfExists('contactados');
    }
}
