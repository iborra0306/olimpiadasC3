<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\InscripcionTallerResource;
use App\Models\Curso;
use App\Models\Edicion;
use App\Models\InscripcionTaller;
use App\Models\Prueba;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function solicitarPlaza($id)
    {
        $solictud = InscripcionTaller::create([
            'prueba_id' => $id,
            'user_id' => auth()->id(),
            'validado' => null
        ]);

        return new InscripcionTallerResource($solictud);
    }

    public function validarPlaza($id)
    {

        $prueba = Prueba::where('user_id', auth()->id()->findOrFail($id));

        $inscripcion = InscripcionTaller::where('prueba_id', $prueba->id)
                                        ->where('user_id', $id)
                                        ->firstOrFail();

        $inscripcion->validado = true;
        $inscripcion->save();

        return new InscripcionTallerResource($inscripcion);

    }
}
