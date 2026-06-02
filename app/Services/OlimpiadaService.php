<?php

namespace App\Services;

use App\Models\ResultadoOlimpiadasCache;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class OlimpiadaService
{

    public function obtenerPuesto(Request $request): JsonResponse
    {
        // Comprobamos que el nombre sea completo y que sea requerido
        $validator = Validator::make($request->all(), [
            'nombreCompleto' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $nombreCompletoBusqueda = $request->input('nombreCompleto');
        $todosLosResultados = ResultadoOlimpiadasCache::all();

        // Buscamos al alumno filtrando la coleccion
        $misRegistros = $todosLosResultados->filter(function ($item) use ($nombreCompletoBusqueda) {
            $nombreCompletoReal = trim($item->firstname . ' ' . $item->lastname);
            return strtolower($nombreCompletoReal) === strtolower($nombreCompletoBusqueda);
        });

        if ($misRegistros->isEmpty()) {
            return response()->json(['error' => 'Alumno no encontrado en las olimpiadas'], 404);
        }

        $miGrado = $misRegistros->first()->grado;

        // PARCIALES
        $parciales = [];
        foreach ($misRegistros as $miResultado) {
            $nombrePrueba = $miResultado->nombrePrueba;

            $clasificacionPrueba = $todosLosResultados
                ->where('nombrePrueba', $nombrePrueba)
                ->sortBy('TiempoFinal')
                ->values();

            $posicionPrueba = $clasificacionPrueba->contains($miResultado)
                ? $clasificacionPrueba->search($miResultado) + 1
                : null;

            $parciales[] = [
                'nombrePrueba' => $nombrePrueba,
                'TiempoFinal'  => $miResultado->TiempoFinal,
                'posicion'     => $posicionPrueba
            ];
        }

        // RANKING
        $gruposMismoGrado = $todosLosResultados->where('grado', $miGrado);

        $rankingGlobal = $gruposMismoGrado->groupBy(function ($item) {
            return trim($item->firstname . ' ' . $item->lastname);
        })->map(function ($resultadosDelGrupo) {
            return $resultadosDelGrupo->where('maxpuntuacion', 100)->count();
        })
        ->sortDesc();

        $posicionGlobal = 1;
        foreach ($rankingGlobal as $nombreGrupo => $cantidadDeMaximos) {
            if (strtolower($nombreGrupo) === strtolower($nombreCompletoBusqueda)) {
                break;
            }
            $posicionGlobal++;
        }

        return response()->json([
            'parciales' => $parciales,
            'global'    => $posicionGlobal
        ]);
    }
}
