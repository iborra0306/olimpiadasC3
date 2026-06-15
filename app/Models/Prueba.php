<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Prueba extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nombre',
        'categorias_ediciones_id',
        'patrocinadores_id'
    ];

    public function resultados()
    {
        return $this->hasMany(ResultadoOlimpiadasCache::class, 'id_prueba');
    }

    public function inscripcion_talleres(): HasMany
    {
        return $this->hasMany(InscripcionTaller::class);
    }

}
