<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $this->hasMany(ResultadoOlimpiadaCache::class, 'id_prueba');
    }

}
