@extends('layouts.app')

@section('content')
<div class="container movie-detail">
    <h1>{{ $movie['Title'] }}</h1>
    <img src="{{ $movie['Poster'] }}" alt="{{ $movie['Title'] }}" />
    <p>{{ $movie['Plot'] }}</p>

    <!-- Tombol Add to Favorites -->
    <form method="POST" action="{{ route('movies.addFavorite') }}">
        @csrf
        <input type="hidden" name="movie_id" value="{{ $movie['imdbID'] }}" />
        <input type="hidden" name="title" value="{{ $movie['Title'] }}" />
        <input type="hidden" name="poster_url" value="{{ $movie['Poster'] }}" />
        <button type="submit" class="favorite-button">Add to Favorites</button>
    </form>
</div>
@endsection
