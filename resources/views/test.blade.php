@extends('layout')

@section('content')

    @if (Auth::check() && Auth::user()->role == "admin")
        
        <a href="{{ route('addCategory') }}">
            <button class="btn btn-primary">
                Catégories
            </button>
        </a>

        <a href="{{ route('addType') }}">
            <button class="btn btn-primary">
                Type
            </button>
        </a>
    @endif

@endsection