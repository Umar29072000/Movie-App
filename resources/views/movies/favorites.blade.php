@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Your Favorite Movies</h1>

    <div id="favorites-list">
        @forelse ($favorites as $favorite)
            <div class="movie-item">
                <img src="{{ $favorite->poster_url }}" alt="{{ $favorite->title }}" />
                <h3>{{ $favorite->title }}</h3>

                <form method="POST" action="{{ route('movies.removeFavorite', $favorite->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="remove-favorite-button">Remove from Favorites</button>
                </form>
            </div>
        @empty
            <p>You have no favorite movies yet.</p>
        @endforelse
    </div>
</div>
@endsection
