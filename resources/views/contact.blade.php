@extends('layout')

@section('content')
    <div>
        <h1 class="text-center fw-bold">
            Formulaire de contact
        </h1>

        <p class="text-secondary mb-2 mt-2">
            Remplissez ce formulaire, l'administrateur va analyser votre demande.
            Si votre demande est acceptée vous recevrez un email avec vos identifiants.
        </p>

        <form action="{{ route('sendEmail') }}" method="post">
            @csrf
            <div class="form-group mb-1 mt-1">
                <input type="text" name="lastname" id="lastname" class="form-control rounded" placeholder="Nom" required value="{{ old("lastname") }}">
            </div>

            <div class="form-group mb-1 mt-1">
                <input type="text" name="firstname" id="firstname" class="form-control rounded" placeholder="Prénom" required value="{{ old("firstname") }}">
            </div>

            <div class="form-group mb-1 mt-1">
                <input type="email" name="email" id="email" class="form-control rounded" placeholder="Email" required value="{{ old("email") }}">
            </div>

            <div class="form-group">
                <textarea name="message" id="message" rows="6" placeholder="Votre message" class="form-control mb-1  mt-1 rounded" required></textarea>
            </div>

            <div>
                <button class="btn btn-primary" type="submit">
                    Envoyer
                </button>
            </div>
        </form>
    </div>
@endsection