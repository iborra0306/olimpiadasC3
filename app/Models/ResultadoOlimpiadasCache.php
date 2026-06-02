<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultadoOlimpiadasCache extends Model
{
    use HasFactory;

    protected $table      = 'resultados_olimpiadas_cache';

    protected $fillable = [
        'grado',
        'firstname',
        'lastname',
        'id_prueba',
        'maxpuntuacion',
        'MomentoConsecución',
        'penalizaciones',
        'TiempoFinal',
        'nombrePrueba'
    ];

    public function prueba()
    {
        return $this->belongsTo(Prueba::class, 'id_prueba');
    }

}
