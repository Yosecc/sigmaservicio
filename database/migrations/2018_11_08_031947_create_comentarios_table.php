<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->longText('nombre');
            $table->longText('procedencia');
            $table->longText('contenido');
            $table->longText('url_imagen');
            $table->integer('role_user_id')->unsigned();
        });
        Schema::table('comentarios', function($table) {
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
        Schema::dropIfExists('comentarios');
    }
}
