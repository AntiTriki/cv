<?php

use Illuminate\Database\Seeder;

class SkillTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Skill::insert([
            [
                'name' => 'Excel'
            ],
            [
                'name' => 'Word'
            ],
            [
                'name' => 'PowerPoint'
            ],
            [
                'name' => 'Ingles'
            ],
            [
                'name' => 'Manejo de internet'
            ]
        ]);
    }
}
