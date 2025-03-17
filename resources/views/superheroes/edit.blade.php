@extends('layouts.app')

@section('title', '✏️ Editar Superhéroe')

@section('content')
    <h1>✏️ Editar Superhéroe</h1>

    <form action="{{ route('superheroes.update', $hero->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="nombre_real">Nombre Real:</label>
        <input id="nombre_real" type="text" name="nombre_real" value="{{ old('nombre_real', $hero->nombre_real) }}" required>
        @error('nombre_real')
            <p class="error">{{ $message }}</p>
        @enderror

        <label for="alias">Alias:</label>
        <input id="alias" type="text" name="alias" value="{{ old('alias', $hero->alias) }}" required>
        @error('alias')
            <p class="error">{{ $message }}</p>
        @enderror

        <label>Foto Actual:</label><br>
        @if ($hero->foto)
            <img src="{{ asset('storage/' . $hero->foto) }}" alt="Foto de {{ $hero->alias }}">
        @endif

        <label for="foto_file">Subir Nueva Foto (opcional):</label>
        <input id="foto_file" type="file" name="foto_file" accept="image/*">
        @error('foto_file')
            <p class="error">{{ $message }}</p>
        @enderror

        <label for="foto_url">O URL de la Foto (opcional):</label>
        <input id="foto_url" type="text" name="foto_url" value="{{ old('foto_url') }}">
        @error('foto_url')
            <p class="error">{{ $message }}</p>
        @enderror

        <label for="informacion">Información Adicional:</label>
        <textarea id="informacion" name="informacion">{{ old('informacion', $hero->informacion) }}</textarea>
        @error('informacion')
            <p class="error">{{ $message }}</p>
        @enderror

        <button type="submit">Actualizar</button>
    </form>

    <a href="{{ route('superheroes.index') }}" class="back-link">⬅️ Volver</a>
@endsection

