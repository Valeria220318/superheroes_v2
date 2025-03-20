<?php

namespace App\Http\Controllers;

use App\Models\Superheroe;
use Illuminate\Http\Request;

class SuperheroeController extends Controller
{
    // Mostrar lista de superhéroes activos
    public function index()
    {
        $superheroes = Superheroe::where('activo', true)->get();
        return view('superheroes.index', compact('superheroes'));
    }

    // Mostrar un superhéroe en detalle
    public function show(Superheroe $superheroe)
    {
        return view('superheroes.show', compact('superheroe'));
    }

    // Formulario para crear un nuevo superhéroe
    public function create()
    {
        return view('superheroes.create');
    }

    // Almacenar un nuevo superhéroe
    public function store(Request $request)
    {
        $request->validate([
            'nombre_real' => 'required|string|max:255',
            'alias' => 'required|string|max:255',
            'foto' => 'nullable|string',
            'informacion' => 'nullable|string',
        ]);

        Superheroe::create($request->all());

        return redirect()->route('superheroes.index')->with('success', '¡Superhéroe creado con éxito!');
    }

    // Formulario para editar un superhéroe
    public function edit(Superheroe $superheroe)
    {
        return view('superheroes.edit', compact('superheroe'));
    }

    // Actualizar un superhéroe
    public function update(Request $request, Superheroe $superheroe)
    {
        $request->validate([
            'nombre_real' => 'required|string|max:255',
            'alias' => 'required|string|max:255',
            'foto' => 'nullable|string',
            'informacion' => 'nullable|string',
            'activo' => 'boolean',
        ]);

        $superheroe->update($request->all());

        return redirect()->route('superheroes.index')->with('success', '¡Superhéroe actualizado con éxito!');
    }

    // Eliminar lógicamente un superhéroe
    public function destroy(Superheroe $superheroe)
    {
        $superheroe->delete();

        return redirect()->route('superheroes.index')->with('success', '¡Superhéroe eliminado lógicamente!');
    }

    // Mostrar superhéroes inactivos (eliminados lógicamente)
    public function inactivos()
    {
        $superheroes = Superheroe::onlyTrashed()->get();
        return view('superheroes.inactivos', compact('superheroes'));
    }

    // Restaurar un superhéroe eliminado
    public function restore($id)
    {
        $superheroe = Superheroe::withTrashed()->findOrFail($id);
        $superheroe->restore();

        return redirect()->route('superheroes.index')->with('success', '¡Superhéroe restaurado con éxito!');
    }

    // Eliminar permanentemente un superhéroe
    public function forceDelete($id)
    {
        $superheroe = Superheroe::withTrashed()->findOrFail($id);
        $superheroe->forceDelete();

        return redirect()->route('superheroes.inactivos')->with('success', '¡Superhéroe eliminado permanentemente!');
    }
}
