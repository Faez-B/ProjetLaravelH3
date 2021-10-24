@extends('layout')

@section('title')
    Page d'accueil
@endsection

@section('content')

    <h1 class="text-center">
        Voici la liste des formations
    </h1>

    @if (Auth::check() && Auth::user()->role == "admin")
        <a href="{{ route('addCategory') }}">
            <button class="btn btn-primary">
                Catégories
            </button>
        </a>

        <a href="{{ route('addType') }}">
            <button class="btn btn-primary">
                Type
            </button>
        </a>
    @endif

    @if (empty($formations))
        <p>Aucune formation disponible</p>
    @else
        <div class="row">
            @foreach ($formations as $formation)
                <div class="col-md-4">
                    <div class="card @if (Auth::check() && Auth::user()->id == $formation->user) bg-success @endif">
                        <img src="" alt="" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">
                                {{ $formation->name }}                            
                            </h5>

                            @if (!empty($formation->categories))
                                <div>
                                    @foreach ($formation->categories as $category)
                                        <div class="btn btn-warning">
                                            {{ $category->name }}        
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                            @if (!empty($formation->types))
                                <div>
                                    @foreach ($formation->types as $type)
                                        <div class="btn btn-info">
                                            {{ $type->name }}        
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                            <p class="card-text">
                                {{ $formation->description }}
                            </p>

                            <p class="card-text">
                                {{-- Créé par {{ $users::find($formation->user) }}  --}}
                            </p>

                            <a href="#">Voir la formation</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

@endsection