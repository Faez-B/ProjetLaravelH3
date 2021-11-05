@extends('layout')

@section('content')
    <h1 class="text-center">
        Mes informations
    </h1>

    <div>
        <form action="{{ route('updateUser', $user->id) }}" method="post">
            @csrf
            <div class="form-group">
                <label>
                    Prénom
                </label>
                <input type="text" class="form-control" value="{{ $user->firstname }}" name="modifFirstName" id="modifFirstName">
            </div>

            <div class="form-group">
                <label>
                    Nom
                </label>
                <input type="text" class="form-control" value="{{ $user->lastname }}" name="modifLastName" id="modifLastName">
            </div>

            <div class="form-group">
                <label>
                    Email
                </label>
                <input type="text" class="form-control" value="{{ $user->email }}" name="modifEmail" id="modifEmail">
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