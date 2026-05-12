<?php

namespace Database\Factories;

use App\Models\Prueba;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ResultadoOlimpiadaCache>
 */
class ResultadoOlimpiadasCacheFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Se asigan valores aqui para poder hacer el resto de operaciones

        $grado = fake()->randomElement(['GM', 'GS']);

        $momentoConsecucion = fake()->dateTimeBetween('2026-05-13 00:00:00', '2026-05-13 23:59:59'); // hora del 13 de mayo

        $penalizaciones = fake()->numberBetween(0, 5);

        // Calcular tiempo final usando la clase carbon para facilitar el calculo
        $tiempoFinal = Carbon::instance($momentoConsecucion)->addSeconds($penalizaciones * 30);

        // Asiganar nombre de la prueba segun el grado
        $prueba =
            ($grado === 'GS')
                ? ['Programación', 'Bases de datos', 'Redes Locales', 'Sistemas', 'Lenguajes de Marcas']
                : ['Hardware', 'Sistemas', 'Redes Locales'];

        $nombrePrueba = fake()->randomElement($prueba); // Indicamos que recoja solo un string si no da error

        return [
            'grado' => $grado,
            'lastname' => fake()->lastName(),
            'firstname' => fake()->firstName(),
            'id_prueba' => Prueba::all()->random()->id,
            'maxpuntuacion' => fake()->randomElement([0, 33, 66, 100]),
            'MomentoConsecución' => $momentoConsecucion,
            'penalizaciones' => $penalizaciones,
            'TiempoFinal' => $tiempoFinal,
            'nombrePrueba' => $nombrePrueba,
        ];
    }
}
