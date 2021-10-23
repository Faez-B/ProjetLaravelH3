@extends('layout')

@section('content')
    <h1 class="text-center">
        Ajouter des catégories
    </h1>

    <h3>
        Voici la liste des catégories :
    </h3>

    @if (count($categories) <= 0)
        Aucune catégorie existante
    @else
        <ul>
            @foreach ($categories as $category)
                <li>
                    {{ $category->name }}
                </li>
                @if (Auth::check() && Auth::user()->role == "admin")
                    <form action="{{ route('deleteCategory', $category->id) }}" method="post">
                        @csrf
                        @method("DELETE")

                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                @endif
            @endforeach
        </ul>
    @endif

    <form action="{{ route('storeCategory') }}" method="post">
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