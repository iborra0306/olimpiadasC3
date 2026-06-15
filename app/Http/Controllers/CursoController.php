<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Edicion;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Edicion $edicion)
    {
        $edicion->load('cursos');

        $curso = $edicion->cursos;

        return view('admin.cursos.index', compact('edicion', 'curso'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Edicion $edicion, Curso $curso)
    {
        $this->authorize('update', $curso);

        return view('admin.cursos.create', compact('edicion'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Edicion $edicion, Curso $curso)
    {
        $this->authorize('update', $curso);

        $request->validate([
            'nombre' => 'required|string|max:100',
            'url' => 'required|string|max:255',
        ]);

        Curso::create([
            'nombre' => $request->nombre,
            'url' => $request->url,
            'edicion_id' => $edicion->id,
        ]);

        return redirect()->route('admin.ediciones.curso.index', $edicion->id)->with('Confirmado', 'Curso creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Edicion $edicion, Curso $curso)
    {
        return view('admin.cursos.show', compact('edicion', 'curso'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Edicion $edicion, Curso $curso)
    {
        $this->authorize('update', $curso);

        return view('admin.cursos.edit', compact('edicion', 'curso'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Edicion $edicion, Curso $curso)
    {
        $this->authorize('update', $curso);

        $request->validate([
            'nombre' => 'required|string|max:100',
            'url' => 'required|string|max:255',
        ]);

        Curso::create([
            'nombre' => $request->nombre,
            'url' => $request->url,
            'edicion_id' => $edicion->id,
        ]);

        return redirect()->route('admin.ediciones.curso.index', $edicion->id)->with('Confirmado', 'Curso actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Edicion $edicion, Curso $curso)
    {
        $this->authorize('update', $curso);

        $curso->delete();

        return redirect()->route('admin.ediciones.cursos.index', $edicion->id)->with('Confirmado', 'Curso borrado correctamente');
    }
}
