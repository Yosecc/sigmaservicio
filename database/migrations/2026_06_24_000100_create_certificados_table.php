<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCertificadosTable extends Migration
{
    public function up()
    {
        Schema::create('certificados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero_certificado')->unique();
            $table->string('token', 64)->unique();
            $table->string('nombre_titular');
            $table->string('documento_identidad');
            $table->string('nombre_certificacion');
            $table->string('institucion_emisora');
            $table->date('fecha_emision');
            $table->date('fecha_vencimiento')->nullable();
            $table->string('estado', 20)->default('vigente');
            $table->text('observaciones')->nullable();
            $table->integer('creado_por')->unsigned()->nullable();
            $table->integer('actualizado_por')->unsigned()->nullable();
            $table->timestamps();

            $table->index('documento_identidad');
            $table->index('nombre_titular');
            $table->index('estado');
        });
    }

    public function down()
    {
        Schema::dropIfExists('certificados');
    }
}
