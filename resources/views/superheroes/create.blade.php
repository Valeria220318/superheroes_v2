@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg mt-10">
    <h1 class="font-bold text-center mb-8 text-gray-800" style="font-size: xx-large;">➕ Agregar Superhéroe</h1>

    <form action="{{ route('superheroes.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 px-4">
        @csrf

        <!-- Nombre Real -->
        <div>
            <label for="nombre_real" class="block text-lg font-semibold mb-2 text-gray-700">🧔‍♂️ Nombre Real:</label>
            <input type="text" id="nombre_real" name="nombre_real" value="{{ old('nombre_real') }}" required
                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            @error('nombre_real')
                <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Alias -->
        <div>
            <label for="alias" class="block text-lg font-semibold mb-2 text-gray-700">🦸 Alias:</label>
            <input type="text" id="alias" name="alias" value="{{ old('alias') }}" required
                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            @error('alias')
                <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Subir Foto -->
        <div>
            <label for="foto_file" class="block text-lg font-semibold mb-2 text-gray-700">📸 Subir Foto:</label>
            <input type="file" id="foto_file" name="foto_file" accept="image/*"
                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            @error('foto_file')
                <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- URL de la Foto -->
        <div>
            <label for="foto_url" class="block text-lg font-semibold mb-2 text-gray-700">🌐 URL de la Foto:</label>
            <input type="text" id="foto_url" name="foto_url" value="{{ old('foto_url') }}"
                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            @error('foto_url')
                <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Información Adicional -->
        <div>
            <label for="informacion" class="block text-lg font-semibold mb-2 text-gray-700">📄 Información Adicional:</label>
            <textarea id="informacion" name="informacion" rows="6"
                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">{{ old('informacion') }}</textarea>
            @error('informacion')
                <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>
    </form>

    <!-- Contenedor para los botones -->
    <div class="flex justify-between mt-8">
        <!-- Botón Volver (a la izquierda) -->
        <a href="{{ route('superheroes.index') }}"
            class="flex items-center text-gray-700 font-medium text-xl no-underline hover:text-gray-700">
            ⬅︎ Volver
        </a>

        <!-- Botón Guardar (a la derecha) -->
        <button type="submit" form=""
            class="bg-green-500 text-white px-6 py-3 rounded-lg shadow-md hover:bg-green-600 transition duration-300 font-medium">
            ✅ Guardar Superhéroe
        </button>
    </div>
</div>
@endsection
