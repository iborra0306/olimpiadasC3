<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CursoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'edicion_id' => $this->edicion_id,
            'curso' => $this->curso,
            'num_olimpiada' => $this->num_olimpiada,
            'enlace_moddle' => $this->enlace_moddle,
            'datos_edicion' => new EdicionResource($this->edicion),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

        ];
    }
}
