@foreach ($deletedHeroes as $hero)
    <div>{{ $hero->name }} - <form action="{{ route('heroes.restore', $hero->id) }}" method="POST">
        @csrf
        <button type="submit">Restaurar</button>
    </form></div>
@endforeach
