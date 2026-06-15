<?php

namespace Database\Seeders;

use App\Models\Curso;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CursosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Curso::truncate();
        foreach(self::$cursos as $curso){
            Curso::create([
                'nombre' => $curso['nombre'],
                'url' => $curso['url'],
                'edicion_id' => $curso['edicion_id'],
            ]);
        }
    }

    private static $cursos = array(
        array(
            'nombre' => 'Curso 2024-2025',
            'url' => 'https://cifpcarlos3.net/codeweek/course/view.php?id=13',
            'edicion_id' => 4
        ),
        array(
            'nombre' => 'Curso 2023-2024',
            'url' => 'https://cifpcarlos3.net/codeweek/course/view.php?id=10',
            'edicion_id' => 3
        ),
        array(
            'nombre' => 'Curso 2022-2023',
            'url' => 'https://cifpcarlos3.net/codeweek/course/view.php?id=9',
            'edicion_id' => 2
        ),
    );

}
