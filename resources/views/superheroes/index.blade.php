@extends('layouts.app')

@section('title', 'Lista de Superhéroes')

@section('content')
<div class="container">
    <h1>🦸‍♂️ Lista de Superhéroes</h1>

    @if($superheroes->isEmpty())
        <p class="text-danger fw-bold">❌ No hay superhéroes registrados.</p>
    @endif

    <table class="table table-striped">
        <thead class="table-primary">
            <tr>
                <th>Nombre Real</th>
                <th>Alias</th>
                <th>Información Adicional</th>
                <th>Foto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($superheroes as $superheroe)
                <tr>
                    <td>{{ $superheroe->nombre_real }}</td>
                    <td>{{ $superheroe->nombre_superheroe }}</td>
                    <td>{{ $superheroe->informacion }}</td>
                    <td>
                        @if($superheroe->nombre_superheroe == 'Batman')
                            <img src="https://bandai.com.mx/blog/wp-content/uploads/2019/09/Historia-de-Batman-el-superhe%CC%81roe-ma%CC%81s-popular-en-la-era-digital-copia-1.jpg" alt="Foto de {{ $superheroe->nombre_superheroe }}" width="80">
                        @elseif($superheroe->nombre_superheroe == 'Superman')
                            <img src="https://hips.hearstapps.com/hmg-prod/images/henry-cavill-superman-64e5f44558477.jpg?crop=0.627xw:1.00xh;0.181xw,0&resize=1200:*" alt="Foto de {{ $superheroe->nombre_superheroe }}" width="80">
                        @else
                            <span>🔳 Sin imagen</span>
                        @endif
                    </td>
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



