@extends('layout')

@section('title')
    Ajouter une formation    
@endsection

@section('content')
    <h1 class="text-center">
        Ajouter une formation
    </h1>

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('storeFormation') }}" method="post">
        @csrf
        <div class="form-group mt-3 mb-3">
            <input type="text" name="chapitre[]" id="" placeholder="Titre du chapitre" class="form-control" 
                    value="{{ old("chapitre") }}" required>
        </div>

        <div class="form-group mb-3">
            <textarea name="content[]" id="" rows="5" placeholder="Le contenu du chapitre" class="form-control" required>
            </textarea>
        </div>

        <button type="submit" class="btn btn-primary">
            Ajouter
        </button>
    </form>
@endsection