@extends('layout')

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
                    <button class="btn btn-warning">
                        Catégories
                    </button>
                </a>

                <a href="{{ route('addType') }}">
                    <button class="btn btn-info">
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
            <div class="mb-1">
                @foreach ($categories as $category)
                    <a href="{{ route('searchCat', $category->name) }}" class="btn btn-warning" name="searchByCat{{ $category->id }}" id="searchByCat{{ $category->id }}">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>

            <div class="">
                @foreach ($types as $type)
                    <a href="{{ route('searchType', $type->name) }}"  class="btn btn-info" name="searchByType{{ $type->id }}" id="searchByType{{ $type->id }}">
                        {{ $type->name }}
                    </a>
                @endforeach
            </div>

            @foreach ($formations as $formation)
                <div class="col-md-4 mt-2 mb-2">
                    <div class="card @if (Auth::check() && Auth::user()->id == $formation->user) bg-success bg-gradient @endif">
                        <a href="{{ route('detailsFormation', $formation->id) }}">
                            <div>
                                @if ($formation->image && Storage::disk('public')->exists($formation->image))
                                    <div class="image-container" style="max-width: 200px; margin:15px auto; height: 200px; display:flex; justify-content: center; align-items: center;">
                                        <img src="{{ asset("storage/$formation->image") }}" alt="" class="card-img-top">
                                    </div>
                                @else
                                    <div class="card-img-top text-center fw-bold" style="background: white; margin: 15px auto;color:red; text-transform:uppercase; font-size:2em;height:200px; display:flex;justify-content:center; align-items:center;">
                                        {{ $formation->name }}
                                    </div>    
                                @endif
                            </div>
                        </a>

                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('detailsFormation', $formation->id) }}">
                                    {{ $formation->name }}                            
                                </a>
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
                                Créé par {{ $user->firstname . " " . $user->lastname }}</a> 
                            </p>

                            <a href="{{ route('detailsFormation', $formation->id) }}" class="btn btn-primary">Voir la formation</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection