<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AddCertificadosRole extends Migration
{
    public function up()
    {
        if (!DB::table('roles')->where('name', 'certificados')->exists()) {
            DB::table('roles')->insert([
                'name' => 'certificados',
                'description' => 'Administrador de certificados QR',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }

    public function down()
    {
        DB::table('roles')->where('name', 'certificados')->delete();
    }
}
