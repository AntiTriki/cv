<?php

use Illuminate\Database\Seeder;

class GradeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Grade::insert([
            [
                'grado' => 'Bachiller'
            ],
            [
                'grado' => 'Tecnico'
            ],
            [
                'grado' => 'Tecnico medio'
            ],
            [
                'grado' => 'Tecnico Avanzado'
            ],
            [
                'grado' => 'Congelado'
            ],
            [
                'grado' => 'Cursando Actualmente'
            ],
            [
                'grado' => 'Egresado'
            ],
            [
                'grado' => 'Licenciatura'
            ],
            [
                'grado' => 'Post Grado'
            ],
            [
                'grado' => 'Maestría'
            ],
            [
                'grado' => 'Doctorado'
            ],
            [
                'grado' => 'Curso'
            ],
            [
                'grado' => 'Seminario'
            ],
            [
                'grado' => 'Taller'
            ],
            [
                'grado' => 'Diplomado'
            ],
            [
                'grado' => 'Otro'
            ]
        ]);
    }
}
