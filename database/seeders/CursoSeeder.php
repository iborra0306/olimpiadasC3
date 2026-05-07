<?php

namespace Database\Seeders;

use App\Models\Curso;
use App\Models\Edicion;
use Illuminate\Database\Seeder;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Limpiamos la tabla antes de sembrar
        Curso::truncate();

        foreach (self::$cursos as $dato) {
            // Buscamos la edición por el curso_escolar para obtener su ID
            $edicion = Edicion::where('curso_escolar', $dato['curso_escolar'])->first();

            if ($edicion) {
                Curso::create([
                    'numero_olimpiada' => $dato['numero_olimpiada'],
                    'curso_moodle_id'  => $dato['curso_moodle_id'],
                    'edicion_id'       => $edicion->id,
                ]);
            }
        }
    }

    /**
     * Datos de los cursos relacionados con las ediciones mediante curso_escolar
     */
    private static $cursos = array(
        array('curso_escolar' => '21/22', 'numero_olimpiada' => 13, 'curso_moodle_id' => 7),
        array('curso_escolar' => '22/23', 'numero_olimpiada' => 14, 'curso_moodle_id' => 9),
        array('curso_escolar' => '23/24', 'numero_olimpiada' => 15, 'curso_moodle_id' => 10),
        array('curso_escolar' => '24/25', 'numero_olimpiada' => 16, 'curso_moodle_id' => 13),
    );
}
