<?php

namespace App\Http\Controllers;

use App\Models\Superheroe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuperheroeController extends Controller
{
    // Mostrar todos los superhéroes
    public function index()
    {
        $superheroes = Superheroe::all();
        return view('superheroes.index', compact('superheroes'));
    }

    // Formulario para crear un nuevo superhéroe
    public function create()
    {
        return view('superheroes.create');
    }

    // Guardar un nuevo superhéroe
    public function store(Request $request)
    {
        $request->validate([
            'nombre_real' => 'required|string|max:255',
            'alias' => 'required|string|max:255',
            'foto_file' => 'nullable|image|max:2048', // Imagen opcional (máx 2MB)
            'foto_url' => 'nullable|url',             // URL opcional
            'informacion' => 'nullable|string',
        ]);

        // Manejar la imagen (archivo o URL)
        $fotoPath = null;

        if ($request->hasFile('foto_file')) {
            $fotoPath = $request->file('foto_file')->store('superheroes', 'public');
        } elseif ($request->foto_url) {
            $fotoPath = $request->foto_url;
        }

        Superheroe::create([
            'nombre_real' => $request->nombre_real,
            'alias' => $request->alias,
            'foto' => $fotoPath,
            'informacion' => $request->informacion,
        ]);

        return redirect()->route('superheroes.index')
                         ->with('success', '¡Superhéroe creado exitosamente!');
    }

    // Mostrar un superhéroe específico
    public function show(Superheroe $superheroe)
    {
        return view('superheroes.show', compact('superheroe'));
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
            'foto_file' => 'nullable|image|max:2048',
            'foto_url' => 'nullable|url',
            'informacion' => 'nullable|string',
        ]);

        // Manejar la imagen (archivo o URL)
        $fotoPath = $superheroe->foto;

        if ($request->hasFile('foto_file')) {
            // Eliminar la imagen anterior si existe y no es una URL
            if ($fotoPath && !filter_var($fotoPath, FILTER_VALIDATE_URL)) {
                Storage::delete('public/' . $fotoPath);
            }

            // Guardar la nueva imagen
            $fotoPath = $request->file('foto_file')->store('superheroes', 'public');
        } elseif ($request->foto_url) {
            // Si se proporciona una URL, usarla
            $fotoPath = $request->foto_url;
        }

        $superheroe->update([
            'nombre_real' => $request->nombre_real,
            'alias' => $request->alias,
            'foto' => $fotoPath,
            'informacion' => $request->informacion,
        ]);

        return redirect()->route('superheroes.index')
                         ->with('success', '¡Superhéroe actualizado!');
    }

    // Eliminar un superhéroe
    public function destroy(Superheroe $superheroe)
    {
        // Eliminar la imagen almacenada si existe y no es una URL
        if ($superheroe->foto && !filter_var($superheroe->foto, FILTER_VALIDATE_URL)) {
            Storage::delete('public/' . $superheroe->foto);
        }

        $superheroe->delete();

        return redirect()->route('superheroes.index')
                         ->with('success', '¡Superhéroe eliminado!');
    }
}
