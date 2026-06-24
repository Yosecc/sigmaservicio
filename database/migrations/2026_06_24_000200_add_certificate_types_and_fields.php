<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddCertificateTypesAndFields extends Migration
{
    public function up()
    {
        Schema::table('certificados', function (Blueprint $table) {
            $table->string('tipo_certificado', 20)->default('persona')->after('token');
            $table->string('nombre_cliente')->nullable()->after('nombre_titular');
            $table->string('nombre_empresa')->nullable()->after('nombre_cliente');
            $table->text('domicilio')->nullable()->after('nombre_empresa');
            $table->string('equipo_tipo')->nullable()->after('domicilio');
            $table->string('equipo_marca')->nullable()->after('equipo_tipo');
            $table->string('equipo_modelo')->nullable()->after('equipo_marca');
            $table->string('equipo_serial')->nullable()->after('equipo_modelo');
            $table->string('codigo_interno')->nullable()->after('equipo_serial');
            $table->string('capacidad_certificada')->nullable()->after('codigo_interno');
            $table->text('normas_aplicadas')->nullable()->after('capacidad_certificada');
            $table->string('lugar_inspeccion')->nullable()->after('normas_aplicadas');
            $table->index('tipo_certificado');
        });

        // Estos campos solo aplican a uno de los dos tipos y deben aceptar NULL.
        DB::statement('ALTER TABLE certificados MODIFY nombre_titular VARCHAR(255) NULL');
        DB::statement('ALTER TABLE certificados MODIFY documento_identidad VARCHAR(100) NULL');
        DB::statement('ALTER TABLE certificados MODIFY nombre_certificacion VARCHAR(255) NULL');
        DB::statement('ALTER TABLE certificados MODIFY institucion_emisora VARCHAR(255) NULL');
    }

    public function down()
    {
        Schema::table('certificados', function (Blueprint $table) {
            $table->dropIndex(['tipo_certificado']);
            $table->dropColumn([
                'tipo_certificado',
                'nombre_cliente',
                'nombre_empresa',
                'domicilio',
                'equipo_tipo',
                'equipo_marca',
                'equipo_modelo',
                'equipo_serial',
                'codigo_interno',
                'capacidad_certificada',
                'normas_aplicadas',
                'lugar_inspeccion',
            ]);
        });
    }
}
