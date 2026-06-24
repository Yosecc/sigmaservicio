<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Role::firstOrCreate(
          ['name' => 'admin'],
          ['description' => 'Administrator']
      );

      Role::firstOrCreate(
          ['name' => 'user'],
          ['description' => 'User']
      );

      Role::firstOrCreate(
          ['name' => 'certificados'],
          ['description' => 'Administrador de certificados QR']
      );
    }
}
