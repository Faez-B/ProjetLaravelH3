@extends('layout')

@section('title')
    Détails de la formation    
@endsection

@section('content')
    <h1 class="text-center">
        {{ $formation->name }}
    </h1>
    
@endsection