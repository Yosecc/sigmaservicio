<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role_user = Role::where('name', 'user')->first();
        $role_admin = Role::where('name', 'admin')->first();

        $user = new User();
        $user->name = 'Anthoni';
        $user->email = 'yosec.cervino@gmail.com';
        $user->password = bcrypt('123456');
        $user->save();
        $user->roles()->attach($role_admin);

        $user = new User();
        $user->name = 'Ruben';
        $user->email = 'rubentorres26@gmail.com';
        $user->password = bcrypt('123456');
        $user->save();
        $user->roles()->attach($role_admin);

        $user = new User();
        $user->name = 'Kleiderman';
        $user->email = 'kleidermanctrok@gmail.com';
        $user->password = bcrypt('123456');
        $user->save();
        $user->roles()->attach($role_admin);

        $user = new User();
        $user->name = 'Admin';
        $user->email = 'info@consuljuridica.com';
        $user->password = bcrypt('123456');
        $user->save();
        $user->roles()->attach($role_admin);

        $user = new User();
        $user->name = 'Jose';
        $user->email = 'jbello262@gmail.com';
        $user->password = bcrypt('123456');
        $user->save();
        $user->roles()->attach($role_admin);

        $user = new User();
        $user->name = 'Yoelis';
        $user->email = 'yoe318@gmail.com';
        $user->password = bcrypt('123456');
        $user->save();
        $user->roles()->attach($role_admin);

        $user = new User();
        $user->name = 'Jose';
        $user->email = 'carlosspf24@gmail.com';
        $user->password = bcrypt('123456');
        $user->save();
        $user->roles()->attach($role_admin);

         $user = new User();
        $user->name = 'Luis';
        $user->email = 'leip1493@gmail.com';
        $user->password = bcrypt('123456');
        $user->save();
        $user->roles()->attach($role_admin);
    }
}
