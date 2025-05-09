@extends('layouts.backend')
@section('title', 'Nieuwe Post Aanmaken')
@section('cards')
@endsection
@section('charts')
@endsection
@section('content')
    <h1 class="h3 mb-4">Nieuwe Post</h1>

    @include('layouts.partials.form_error')

    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
        @csrf
        <!-- Titel -->
        <div class="form-group mb-3">
            <label for="title">Titel:</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
            @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <!-- Inhoud -->
        <div class="form-group mb-3">
            <label for="content">Inhoud:</label>
            <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" rows="5">{{ old('content') }}</textarea>
            @error('content')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <!-- Categorieën -->
        <div class="form-group mb-3">
            <label>Categorieën:</label>
            <div class="d-flex flex-wrap">
                @foreach($categories as $id => $name)
                    <div class="form-check me-3">
                        <input type="checkbox" name="categories[]" value="{{ $id }}" id="category-{{ $id }}" class="form-check-input"
                            {{ in_array($id, old('categories', [])) ? 'checked' : '' }}>
                        <label for="category-{{ $id }}" class="form-check-label">{{ $name }}</label>
                    </div>
                @endforeach
            </div>
            @error('categories')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- Publicatie status (Radio buttons) -->
        <div class="form-group mb-3">
            <label>Publiceren:</label>
            <div>
                <div class="form-check form-check-inline">
                    <input type="radio" name="is_published" value="1" id="published-yes" class="form-check-input"
                        {{ old('is_published') == "1" ? 'checked' : '' }}>
                    <label for="published-yes" class="form-check-label">Ja</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" name="is_published" value="0" id="published-no" class="form-check-input"
                        {{ old('is_published', "0") == "0" ? 'checked' : '' }}>
                    <label for="published-no" class="form-check-label">Nee</label>
                </div>
            </div>
            @error('is_published')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- Afbeelding -->
        <div class="form-group mb-3">
            <label for="photo_id">Afbeelding Uploaden:</label>
            <input type="file" name="photo_id" id="photo_id" class="form-control @error('photo_id') is-invalid @enderror">
            @error('photo_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <!-- Submit knop -->
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Post Aanmaken</button>
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Annuleren</a>
        </div>
    </form>

@endsection
