@extends('layout')

@section('content')
    <h1 class="text-center">
        Ajouter des types de formation
    </h1>

    <h3>
        Voici la liste des types de formation :
    </h3>

    @if (count($types) <= 0)
        Aucun type existant
    @else
        <ul>
            @foreach ($types as $type)
                <li>
                    {{ $type->name }}
                </li>
                @if (Auth::check() && Auth::user()->role == "admin")
                    <form action="{{ route('deleteType', $type->id) }}" method="post">
                        @csrf
                        @method("DELETE")

                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                @endif
            @endforeach
        </ul>
    @endif

    <form action="{{ route('storeType') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" name="name" class="form-control" required id="name">
        </div>

        <button type="submit" class="btn btn-primary">
            Ajouter
        </button>
    </form>
@endsection