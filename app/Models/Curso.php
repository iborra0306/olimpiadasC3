<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Curso extends Model
{

    protected $fillable = [
        'id',
        'curso_moodle_id',
        'numero_olimpiada',
        'edicion_id'
    ];


    // El curso pertenece a una edición.
    public function edicion(): BelongsTo
    {
        return $this->belongsTo(Edicion::class, 'edicion_id');
    }

}
