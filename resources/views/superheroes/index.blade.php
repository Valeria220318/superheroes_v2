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
            <label for="foto_file" class="block text-lg font-semibold mb-2 text-gray-700">📸 Subir Foto (opcional):</label>
            <input type="file" id="foto_file" name="foto_file" accept="image/*"
                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            @error('foto_file')
                <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- URL de la Foto - Oculto por defecto -->
        <div class="hidden">
            <label for="foto_url" class="block text-lg font-semibold mb-2 text-gray-700">🌐 URL de la Foto (opcional):</label>
            <input type="text" id="foto_url" name="foto_url" value="{{ old('foto_url') }}"
                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            @error('foto_url')
                <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Información Adicional - Alineada a la izquierda como los demás campos -->
        <div>
            <label for="informacion" class="block text-lg font-semibold mb-2 text-gray-700">📄 Información Adicional:</label>
            <textarea id="informacion" name="informacion" rows="6"
                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">{{ old('informacion') }}</textarea>
            @error('informacion')
                <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>
    </form>

    <!-- Botón Volver (solo flecha) -->
    <div class="mt-8 flex justify-start">
        <a href="{{ route('superheroes.index') }}"
            class="bg-gray-200 text-gray-700 px-6 py-3 rounded-lg shadow-md hover:bg-gray-300 transition duration-300 font-medium">
            ⬅️
        </a>
    </div>

    <!-- Botón Guardar (verde) -->
    <div class="mt-4 flex justify-end">
        <button type="submit" form="" class="bg-green-500 text-white px-6 py-3 rounded-lg shadow-md hover:bg-green-600 transition duration-300 font-medium">
            ✅ Guardar Superhéroe
        </button>
    </div>
</div>
@endsection




