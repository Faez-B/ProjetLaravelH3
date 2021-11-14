@extends('layout')

@section('title')
    Détails de la formation    
@endsection

@section('content')
    <div class="details">
        @if (!Auth::check() || 
            (Auth::user()->id != $formation->user && Auth::user()->role != "admin"))
            {{-- Si c'est un visiteur du site => montrer la formation normalement --}}
            <h1 class="text-center">
                {{ $formation->name }}
            </h1>

            @if ($formation->image)
                <div class="image" style="text-align: center; max-width: 200px; margin:15px auto; height: 200px; display:flex; justify-content: center; align-items: center;">
                    <img src="{{ asset("storage/$formation->image") }}" alt="">
                </div>
            @endif

            @if (!empty($formation->categories))
                <div>
                    @foreach ($formation->categories as $category)
                        <a href="" name="searchByCat{{ $category->id }}" id="searchByCat{{ $category->id }}">
                            <div class="btn btn-warning mt-1">
                                {{ $category->name }}
                            </div>
                        </a>     
                    @endforeach
                </div>
            @endif

            @if (!empty($formation->types))
                <div>
                    @foreach ($formation->types as $type)
                        <a href="" name="searchByType{{ $type->id }}" id="searchByType{{ $type->id }}">
                            <div class="btn btn-info mt-1">
                                {{ $type->name }}
                            </div>
                        </a>      
                    @endforeach
                </div>
            @endif

            <div>
                <label class="fw-bold">
                    Prix : 
                </label>

                {{ $formation->prix }} euros
            </div>
            
            <div>
                {{-- {{ $formation->user }} --}}
                @foreach ($users as $user)
                    @if ($user->id == $formation->user)
                        <p class="card-text">
                            <label class="fw-bold">
                                Créé par : 
                            </label> 
                            <a href="" name="searchByUser{{ $user->id }}" id="searchByUser{{ $user->id }}">{{ $user->firstname . " " . $user->lastname }}</a> 
                        </p>
                    @endif
                @endforeach
            </div>


            <div>
                <label class="fw-bold">
                    Description
                </label>
                {{ $formation->description }}
            </div>

            <div class="chapitres">
                @if ($chapitres)
                    @foreach ($chapitres as $chapitre)
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">
                                    {{ $chapitre->titre }}
                                </h5>
                                
                                <p class="card-text">
                                    {{ $chapitre->content }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>
                        Aucun contenu disponible pour le moment
                    </p>
                @endif
            </div>
        @else
            {{-- Si c'est un utilisateur connecté et que c'est le formateur qui a créé la formation => montrer la formation sous forme d'un formulaire qu'il pourra modifier --}}
            <form action="{{ route('deleteFormation',$formation->id) }}" method="post">
                @csrf
                @method("DELETE")

                <button type="submit" class="btn btn-danger">
                    Supprimer
                </button>
            </form>
            
            <form action="{{ route('updateFormation',$formation->id) }}" method="post">
                @csrf

                @if ($formation->image)
                    <div class="image" style="text-align: center; max-width: 200px; margin:15px auto; height: 200px; display:flex; justify-content: center; align-items: center;" >
                        <img src="{{ asset("storage/$formation->image") }}" alt="">
                    </div>
                @endif

                <input type="text" name="formation_name" class="form_input_name" value="{{ $formation->name }}" id="formation_name">


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

                <div>
                    <label class="fw-bold">
                        Prix : 
                    </label>

                    <input type="text" name="formation_prix" id="formation_prix" value="{{ $formation->prix }}"> 
                </div>

                <div>
                    <label class="fw-bold">
                        Description
                    </label>
                    <textarea type="text" name="formation_description" id="formation_description" value="{{ $formation->decription }}"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">
                    Mettre à jour
                </button>
            </form>
        @endif
    </div>
@endsection