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
                'email' => 'admin@admin.com',
                'password' => bcrypt('123'),
                'permiso' => 1
            ],
            [
                'name' => 'Juan',
                'email' => 'no@no.com',
                'password' => bcrypt('123'),
                'permiso' => 0
            ]
        ]);
    }
}
