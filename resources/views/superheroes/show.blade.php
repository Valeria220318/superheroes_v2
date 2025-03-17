@extends('layouts.app')

@section('title', 'Detalles del Superhéroe')

@section('content')
    <h1>👁️ {{ $superheroe->alias }}</h1>

    <p><strong>Nombre Real:</strong> {{ $superheroe->nombre_real }}</p>
    <p><strong>Alias:</strong> {{ $superheroe->alias }}</p>

    <p><strong>Foto:</strong></p>
    @if ($superheroe->foto)
        @if (filter_var($superheroe->foto, FILTER_VALIDATE_URL))
            <img src="{{ $superheroe->foto }}" width="300" alt="Foto de {{ $superheroe->alias }}">
        @else
            <img src="{{ asset('storage/' . $superheroe->foto) }}" width="300" alt="Foto de {{ $superheroe->alias }}">
        @endif
    @else
        <p>🚫 No hay imagen disponible.</p>
    @endif

    <p><strong>Información Adicional:</strong> {{ $superheroe->informacion ?? 'Sin información adicional.' }}</p>

    <a href="{{ route('superheroes.index') }}" class="btn btn-secondary">⬅️ Volver</a>
    <a href="{{ route('superheroes.edit', $superheroe->id) }}" class="btn btn-primary">✏️ Editar</a>

    <form action="{{ route('superheroes.destroy', $superheroe->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que deseas eliminar este superhéroe?')">🗑️ Eliminar</button>
    </form>
@endsection

