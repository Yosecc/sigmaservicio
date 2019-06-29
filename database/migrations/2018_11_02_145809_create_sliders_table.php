<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->longText('titulo');
            $table->longText('contenido');
            $table->longText('contenido2')->nullable();
            $table->boolean('publico');
            $table->bigInteger('posicion');
            $table->longText('url_imagen');
            $table->integer('servicio_id')->nullable();
            $table->integer('role_user_id')->unsigned();

        });
        Schema::table('sliders', function($table) {
              $table->foreign('role_user_id')->references('id')->on('role_user');
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sliders');
    }
}
