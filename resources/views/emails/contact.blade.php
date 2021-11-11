Sujet : demande d'un compte de formateur <br><br>
Bonjour Administrateur, <br>
<br>
Vous avez reçu une demande d'un visiteur pour devenir formateur.<br>
<br>
Voici ses informations :<br>
<br>
Nom : {{ $lastname }}
<br>
Prénom : {{ $firstname }}
<br>
Email : {{ $email }}
<br>
Message : {{ $message_content }}

<br><br>
<p>
    Si vous acceptez de créer un formateur pour cette personne cliquez sur le lien ci-dessous :
</p>

{{-- <form action="{{ route('addUser', $email) }}" method="post">
    @csrf

    <button type="submit" class="btn btn-primary">
        Lien
    </button>
</form> --}}

<a href="{{ route('addUser', ['email' => $email, "firstname" => $firstname, "lastname" => $lastname]) }}">Lien</a>