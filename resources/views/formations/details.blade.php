@extends('layout')

@section('title')
    Détails de la formation    
@endsection

@section('content')
    <h1 class="text-center">
        {{ $formation->name }}
    </h1>
    
    <form action="{{ route('deleteFormation',$formation->id) }}" method="post">
        @csrf
        @method("DELETE")

        <button type="submit" class="btn btn-danger">
            Supprimer
        </button>
    
    </form>
@endsection