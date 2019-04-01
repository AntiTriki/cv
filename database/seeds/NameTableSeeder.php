<?php

use Illuminate\Database\Seeder;

class NameTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Name::insert([
            [
                'nombre' => 'Nulo'
            ],
            [
                'nombre' => 'Basico'
            ],
            [
                'nombre' => 'Intermedio'
            ],
            [
                'nombre' => 'Avanzado'
            ],
            [
                'nombre' => 'Soltero'
            ],
            [
                'nombre' => 'Casado'
            ],
            [
                'nombre' => 'Divorciado'
            ],
            [
                'nombre' => 'Viudo'
            ]
        ]);
    }
}
