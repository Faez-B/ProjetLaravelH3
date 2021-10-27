@extends('layout')

@section('title')
    Page d'accueil
@endsection

@section('content')

    <h1 class="text-center">
        Voici la liste des formations
    </h1>

    @if (Auth::check())
        <div class="mb-4">
            {{-- Un admin peut aussi créer des formations (dans le cas où le formateur ne pourrait le faire, ceci est utile) --}}
            <a href="{{ route('addFormation') }}">
                <button class="btn btn-primary">
                    Formations
                </button>
            </a>

            @if (Auth::user()->role == "admin")
                <a href="{{ route('addCategory') }}">
                    <button class="btn btn-primary">
                        Catégories
                    </button>
                </a>

                <a href="{{ route('addType') }}">
                    <button class="btn btn-primary">
                        Types
                    </button>
                </a>
            @endif
        </div>
        <p class="fw-bold mt-4 mb-4">
            Vos formations s'affichent en vert
        </p>
    @endif

    @if (empty($formations))
        <p>Aucune formation disponible</p>
    @else
        <div class="row">
            @foreach ($formations as $formation)
                <div class="col-md-4 mt-2 mb-2">
                    <div class="card @if (Auth::check() && Auth::user()->id == $formation->user) bg-success bg-gradient @endif">
                        <img src="" alt="" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">
                                {{ $formation->name }}                            
                            </h5>

                            @if (!empty($formation->categories))
                                <div>
                                    @foreach ($formation->categories as $category)
                                        <div class="btn btn-warning mt-1">
                                            {{ $category->name }}        
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                            @if (!empty($formation->types))
                                <div>
                                    @foreach ($formation->types as $type)
                                        <div class="btn btn-info mt-1">
                                            {{ $type->name }}        
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                            <p class="card-text border border-success bg-light p-3 mt-2 mb-2 rounded-3">
                                {{ $formation->description }}
                            </p>

                            <p class="card-text border border-success bg-light p-3 mb-2 rounded-3">
                                Prix : {{ $formation->prix }} euros
                            </p>

                            <p class="card-text">
                                {{-- Créé par {{ $users::find($formation->user) }}  --}}
                            </p>

                            <a href="{{ route('detailsFormation', $formation->id) }}" class="btn btn-primary">Voir la formation</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

@endsection