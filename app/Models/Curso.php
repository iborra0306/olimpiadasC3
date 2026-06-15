<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Curso extends Model
{
    protected $table = 'cursos';

    protected $fillable = [
        'id',
        'nombre',
        'url',
        'created_at',
        'updated_at',
    ];

    // Relacion 1:1 con Ediciones
    public function edicion()
    {
        return $this->belongsTo(Edicion::class);
    }
}
