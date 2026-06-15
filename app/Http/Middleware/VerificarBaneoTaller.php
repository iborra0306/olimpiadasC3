<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class VerificarBaneoTaller
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (auth()->check()) {
            $userId = auth()->id();

            // 2. Buscamos si existe alguna fila de este usuario con validado = false
            // (En las bases de datos, 'false' suele almacenarse como 0 o false)
            $estaBaneado = DB::table('inscripciones_talleres')
                ->where('user_id', $userId) // O el nombre de tu columna de clave foránea, ej: alumno_id
                ->where('validado', false)
                ->exists();

            // 3. Si existe, abortamos inmediatamente con el código 412
            if ($estaBaneado) {
                abort(412, 'Precondition Failed: Has sido baneado de algún taller por mal comportamiento.');
            }
        }
    }
}
