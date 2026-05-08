<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Edicion;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index()
    {
        $ediciones = Edicion::with('curso')->get();

        return response()->json([
            'status' => 'success',
            'data' => $ediciones
        ], 200);
    }
}
