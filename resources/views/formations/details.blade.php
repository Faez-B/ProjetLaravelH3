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
            
            <form method="post" action="{{ route('updatePictureFormation', $formation->id) }}" enctype="multipart/form-data" class="mb-3">
                @csrf
    
                <p class="text-secondary text-center">
                    Le changement de la photo se fait indépendamment de vos informations
                </p>
                <div class="card user_img_card" style="margin: 0 auto">
                    <div class="card-img-top">
                        @if ($formation->image && Storage::exists("public/$formation->image"))
                            <div class="image" style="text-align: center; max-width: 200px; margin:15px auto; height: 200px; display:flex; justify-content: center; align-items: center;" >
                                <img src="{{ asset("storage/$formation->image") }}" alt="">
                            </div>
                        @endif
                    </div>
    
                    <input type="file" class="form-control" name="user_image" id="user_image"> 
    
                    <button type="submit" class="btn btn-primary">
                        Changer la photo
                    </button>
                </div>
            </form>

            <form action="{{ route('updateFormation',$formation->id) }}" method="post">
                @csrf

                {{-- @if ($formation->image)
                    <div class="image" style="text-align: center; max-width: 200px; margin:15px auto; height: 200px; display:flex; justify-content: center; align-items: center;" >
                        <img src="{{ asset("storage/$formation->image") }}" alt="">
                    </div>
                @endif --}}

                <input type="text" name="formation_name" class="form_input_name mb-3" value="{{ $formation->name }}" id="formation_name">

                {{-- @if (!empty($formation->categories))
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
                @endif --}}

                <div class="mb-3 form-group">
                    <label class="fw-bold">
                        Description
                    </label>
                    <textarea class="form-control" type="text" name="formation_description" id="formation_description">{{ $formation->description }}</textarea>
                </div>

                <div class="mb-3 form-group">
                    <label class="fw-bold">
                        Prix : 
                    </label>

                    <input class="form-control" type="text" name="formation_prix" id="formation_prix" value="{{ $formation->prix }}"> 
                </div>

                <div class="mt-4">
                    <h3>
                        Catégories de la formation
                    </h3>
                    @foreach ($categories as $category)
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="checkCat-{{ $category->id }}" value="{{ $category->id }}" 
                                name="checkboxCategories[{{ $category->id }}]" @if ($formation->categories->contains($category)) checked @endif>
                            <label for="checkCat-{{ $category->id }}" class="form-check-label">{{ $category->name }}</label>
                        </div>
                    @endforeach
                </div>
        
                <div class="mt-4">
                    <h3>
                        Type de la formation
                    </h3>
                    @foreach ($types as $type)
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="checkType-{{ $type->id }}" value="{{ $type->id }}" 
                                name="checkboxTypes[{{ $type->id }}]" @if ($formation->types->contains($type)) checked @endif>
                            <label for="checkType-{{ $type->id }}" class="form-check-label">{{ $type->name }}</label>
                        </div>
                    @endforeach
                </div>

                <button type="submit" class="btn btn-primary">
                    Mettre à jour
                </button>
            </form>

            <div class="chapitres mt-4">
                @if ($chapitres)
                    <h3>
                        Chapitres de la formation
                    </h3>

                    <p class="text-secondary">
                        Chaque chapitre doit être mis à jour individuellement
                    </p>

                    @foreach ($chapitres as $chapitre)
                        <form action="{{ route('updateChapter', $chapitre->id) }}" method="post">
                            @csrf

                            <div class="form-group">
                                <input required class="form-control fw-bold mb-2" type="text" name="chapitre-titre-update" id="chapitre-titre-[{{ $chapitre->id }}]" value="{{ $chapitre->titre }}">

                                <textarea required class="form-control mb-2" name="chapitre-content-update" id="chapitre-content-[{{ $chapitre->id }}]" cols="30" rows="10">{{ $chapitre->content }}</textarea>
                            </div>

                            <div class="text-right mb-1">
                                <button type="submit" class="btn btn-primary">
                                    Mettre à jour
                                </button>
                            </div>
                        </form>

                        <form action="{{ route('deleteChapter', $chapitre->id) }}" method="post">
                            @csrf

                            @method("DELETE")

                            <div class="text-right mb-4">
                                <button type="submit" class="btn btn-danger">
                                    Supprimer le chapitre
                                </button>
                            </div>
                        </form>

                        {{-- <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">
                                    {{ $chapitre->titre }}
                                </h5>
                                
                                <p class="card-text">
                                    {{ $chapitre->content }}
                                </p>
                            </div>
                        </div> --}}
                    @endforeach
                @else
                    <p>
                        Aucun chapitre pour cette formation
                    </p>
                @endif

                <div class="btn btn-primary add_form_add_chapitre">
                    Ajouter un chapitre
                </div>

                <div class="add_chapitre_div mt-5 d-none">
                    <form action="{{ route('storeChapter', $formation->id) }}" method="post">
                        @csrf

                        <div class="form-group mb-3">
                            <input required class="form-control" type="text" placeholder="Titre du chapitre" name="new_chapitre_titre" id="new_chapitre_titre">
                        </div>

                        <div class="form-group mb-3">
                            <textarea required class="form-control" cols="30" rows="10" min="5" placeholder="Contenu du chapitre" name="new_chapitre_content" id="new_chapitre_content"></textarea>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-warning">
                                Ajouter
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        @endif
    </div>
@endsection