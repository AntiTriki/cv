<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\User::insert([
            [
                'name' => 'Admin',
                'apellido_p' => 'Nistra',
                'apellido_m' => 'Dor',
                'email' => 'admin@admin.com',
                'ci' => '666666',
                'password' => bcrypt('123'),
                'permiso' => 1
            ],
            [
                'name' => 'Juan',
                'apellido_p' => 'Lopez',
                'apellido_m' => 'Vaca',
                'email' => 'no@no.com',
                'ci' => '6677777',
                'password' => bcrypt('123'),
                'permiso' => 0
            ]
        ]);
    }
}
