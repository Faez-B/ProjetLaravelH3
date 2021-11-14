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

    <form action="{{ route('storeFormation') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group mt-3 mb-3">
            <input type="text" name="name" id="" placeholder="Nom de la formation" class="form-control" 
                    value="{{ old("name") }}" required autofocus>
        </div>

        <div class="form-group mb-3">
            <textarea name="description" id="" rows="5" placeholder="Description" class="form-control" required></textarea>
        </div>

        <div class="form-group mb-3">
            <input type="text" name="prix" id="prix" placeholder="Prix de la formation" class="form-control" required>
        </div>

        <div class="form-group">
            <input type="file" name="image" id="image" class="form-control" required accept="image/png,image/jpeg,image/jpg">
        </div>

        <div class="mt-2">
            <h3>
                Catégories de la formation
            </h3>
            @foreach ($categories as $category)
                <div class="form-check form-check-inline">
                    <input type="checkbox" class="form-check-input" id="checkCat-{{ $category->id }}" value="{{ $category->id }}" 
                        name="checkboxCategories[{{ $category->id }}]">
                    <label for="checkCat-{{ $category->id }}" class="form-check-label">{{ $category->name }}</label>
                </div>
            @endforeach
        </div>

        <div class="mt-2">
            <h3>
                Type de la formation
            </h3>
            @foreach ($types as $type)
                <div class="form-check form-check-inline">
                    <input type="checkbox" class="form-check-input" id="checkType-{{ $type->id }}" value="{{ $type->id }}" 
                        name="checkboxTypes[{{ $type->id }}]">
                    <label for="checkType-{{ $type->id }}" class="form-check-label">{{ $type->name }}</label>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary mt-2">
            Ajouter
        </button>
    </form>
@endsection