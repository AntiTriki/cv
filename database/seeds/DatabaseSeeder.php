<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(SkillTableSeeder::class);
         $this->call(NameTableSeeder::class);
         $this->call(GradeTableSeeder::class);
    }
}
