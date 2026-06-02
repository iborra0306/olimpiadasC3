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

    public function convertirARomano($number) {
        $map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
        $returnValue = '';
        while ($number > 0) {
            foreach ($map as $roman => $int) {
                if($number >= $int) {
                    $number -= $int;
                    $returnValue .= $roman;
                    break;
                }
            }
        }
        return $returnValue;
    }

}
