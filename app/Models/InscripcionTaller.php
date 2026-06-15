<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InscripcionTaller extends Model
{
    protected $table = 'inscripciones_talleres';

    protected $fillable = [
        'id',
        'user_id',
        'prueba_id',
        'validado'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function prueba(): BelongsTo
    {
        return $this->belongsTo(Prueba::class);
    }

}
