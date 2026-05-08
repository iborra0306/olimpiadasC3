<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Curso;
use App\Models\Edicion;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cursos = Curso::with('edicion')->get();
        return view('admin.cursos.index', compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ediciones = Edicion::all();
        return view('admin.cursos.create', compact('ediciones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'curso_moodle_id' => 'required|integer',
            'numero_olimpiada' => 'required|integer',
            'edicion_id' => 'required|exists:ediciones, id'
        ]);

        Curso::create([
            'curso_moodle_id' => $request->curso_moodle_id,
            'numero_olimpiada' => $request->numero_olimpiada,
            'edicion_id' => $request->edicion_id
        ]);

        return redirect()->route('cursos.index')->with('success', 'Curso creado correctamente');
    }

// Metodo show comentado por si hiciera falta en el futuro
    /**
     * Display the specified resource.
     */
//    public function show(Curso $curso)
//    {
        // Cargamos la relacion para mostrar los dsatos de la edicion
//        $curso->load('edicion');

//        return view('admin.cursos.show', compact('curso'));
//    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Curso $curso)
    {
        $ediciones = Edicion::all();
        return view('admin.cursos.edit', compact('curso', 'ediciones'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Curso $curso)
    {
        $request->validate([
            'curso_moodle_id' => 'required|integer',
            'numero_olimpiada' => 'required|integer',
            'edicion_id' => 'required|exists:ediciones, id'
        ]);

        $curso->update([
            'curso_moodle_id' => $request->curso_moodle_id,
            'numero_olimpiada' => $request->numero_olimpiada,
            'edicion_id' => $request->edicion_id
        ]);

        return redirect()->route('cursos.index')->with('success', 'Curso actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Curso $curso)
    {
        $curso->delete();

        return redirect()->route('cursos.index')->with('success', 'Curso eliminado correctamente.');
    }
}
