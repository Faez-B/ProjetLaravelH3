@extends('layout')

@section('content')
    <h1 class="text-center">
        Mes informations
    </h1>

    <div>
        <form method="post" action="{{ route('updatePictureUser', $user->id) }}" enctype="multipart/form-data">
            @csrf

            <p class="text-secondary text-center">
                Le changement de la photo se fait indépendamment de vos informations
            </p>
            <div class="card user_img_card">
                <div class="card-img-top">
                    @if ($user->image && Storage::exists("public/$user->image"))
                        <img src="{{ asset("storage/$user->image") }}" alt="">
                    @elseif(Storage::exists("public/empty-avatar.png"))
                        <img src="{{ asset("storage/empty-avatar.png") }}" alt="">
                    @endif
                </div>

                <input type="file" class="form-control" name="user_image" id="user_image"> 

                <button type="submit" class="btn btn-primary">
                    Changer la photo
                </button>
            </div>
        </form>
    </div>

    <div>
        <form method="post" action="{{ route('updateUser', $user->id) }}">
            @csrf
            <div class="form-group">
                <label>
                    Prénom
                </label>
                <input required type="text" class="form-control" value="{{ $user->firstname }}" name="modifFirstName" id="modifFirstName">
            </div>

            <div class="form-group">
                <label>
                    Nom
                </label>
                <input required type="text" class="form-control" value="{{ $user->lastname }}" name="modifLastName" id="modifLastName">
            </div>

            <div class="form-group">
                <label>
                    Email
                </label>
                <input required type="email" class="form-control" value="{{ $user->email }}" name="modifEmail" id="modifEmail">
            </div>

            <div class="form-group">
                <label>
                    Changer le mot de passe
                </label>
                <input type="text" class="form-control" name="modifPassword" id="modifPassword">
            </div>

            <button type="submit" class="btn btn-primary">
                Modifier
            </button>
        </form>
    </div>
@endsection