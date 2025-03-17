@extends('layouts.app')

@section('title', 'Lista de Superhéroes')

@section('content')
<div class="container">
    <h1>🦸‍♂️ Lista de Superhéroes</h1>

    <a href="{{ route('superheroes.create') }}" class="btn-add" style="display: none;">➕ Agregar Superhéroe</a>

    @if($superheroes->isEmpty())
        <p class="text-danger fw-bold">❌ No hay superhéroes registrados.</p>
    @endif

    <table class="table table-striped">
        <thead class="table-primary">
            <tr>
                <th>Nombre Real</th>
                <th>Alias</th>
                <th>Foto</th>
                <th>Información Adicional</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($superheroes as $superheroe)
                <tr>
                    <td>{{ $superheroe->nombre_real }}</td>
                    <td>{{ $superheroe->alias }}</td>
                    <td>
                        @if($superheroe->foto)
                            <img src="{{ asset('storage/' . $superheroe->foto) }}" alt="Foto de {{ $superheroe->alias }}" width="80">
                        @else
                            <span>🔳 Sin imagen</span>
                        @endif
                    </td>
                    <td>{{ $superheroe->informacion }}</td>
                    <td>
                        <a href="{{ route('superheroes.show', $superheroe) }}" class="btn btn-info btn-sm">👁️ Ver</a>
                        <a href="{{ route('superheroes.edit', $superheroe) }}" class="btn btn-warning btn-sm">✏️ Editar</a>
                        <form action="{{ route('superheroes.destroy', $superheroe) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de querer eliminar este superhéroe?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">🗑️ Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">❌ No hay superhéroes registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection



