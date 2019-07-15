<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noticias', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->longText('titulo');
            $table->longText('resumen')->nullable();
            $table->string('fuente',100)->nullable();
            $table->longText('descripcion')->nullable();
            $table->boolean('publico');
            $table->bigInteger('posicion');
            $table->longText('url_multimedia')->nullable();;
            $table->longText('url_imagen')->nullable();;
            $table->integer('role_user_id')->unsigned();
        });
        Schema::table('noticias', function($table) {
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
        Schema::dropIfExists('noticias');
    }
}
