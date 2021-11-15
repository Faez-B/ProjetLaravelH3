<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <script src="../js/app.js"></script>
    <script src="../js/main.js"></script>


    <title>
        @yield('title', "Plateforme SIGMA")
    </title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('index') }}">
                Accueil
            </a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    @if (Auth::check())
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('detailsUser', Auth::user()->id) }}">
                                Compte
                            </a>
                        </li>

                    @else
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('contact') }}">
                                Contact
                            </a>
                        </li>
                    @endif
                </ul>

                <div style="width: 100%; text-align:center; font-weight : bold; text-transform : uppercase;font-size: 1.5em;">
                    @if (Auth::check())
                        <a class="nav-link active" style="display: inline-block;" aria-current="page" href="{{ route('detailsUser', Auth::user()->id) }}">
                            <div style="display: flex;justify-content: center;align-items: center; color: black;">
                                {{-- face.jpg ou empty-avatar.png --}}
                                @if (Auth::user()->image && Storage::disk('public')->exists(Auth::user()->image)) 
                                    <img src="{{ asset("storage/" . Auth::user()->image) }}" alt="" class="user-avatar" 
                                        style="max-width: 50px; border: solid black 1px; border-radius:100%; padding:5px;margin:0 5px;">

                                @elseif (Storage::disk('public')->exists("empty-avatar.png"))
                                    <img src="{{ asset("storage/empty-avatar.png") }}" alt="" class="user-avatar" 
                                        style="max-width: 50px; border: solid black 1px; border-radius:100%; padding:5px;margin:0 5px;">
                                        
                                @endif
                                <span>{{ Auth::user()->firstname }}</span>
                            </div>
                        </a>
                    @endif
                </div>

                <form class="d-flex" action="{{ route('searchName') }}" method="post">
                    @csrf
                    <input class="form-control me-2" type="search" placeholder="Recherche" aria-label="Recherche" name="nom_formation" id="nom_formation">
                    <button class="btn btn-outline-success" type="submit">Recherche</button>
                </form>

                @if (!Auth::check())
                    <a href="{{ route('login') }}">
                        <button class="btn btn-success ml-3">
                            Connexion
                        </button>
                    </a>
                @else
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger ml-3">
                            Déconnexion
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </nav>
    <div class="container mt-4 mb-4">
        @yield('content')
    </div>
</body>
</html>