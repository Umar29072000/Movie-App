@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Movie List</h1>

    <form method="GET" action="{{ route('movies.list') }}" class="search-form">
        <input type="text" name="query" placeholder="Search movies..." />
        <button type="submit">Search</button>
    </form>

    <div id="movie-list">
        @foreach ($movies as $movie)
        <div class="movie-item">
            <img data-src="{{ $movie['Poster'] }}" class="lazyload" alt="{{ $movie['Title'] }}" />
            <a href="{{ route('movies.show', $movie['imdbID']) }}">{{ $movie['Title'] }}</a>
            
            <!-- Tombol Add to Favorites -->
            <form method="POST" action="{{ route('movies.addFavorite') }}">
                @csrf
                <input type="hidden" name="movie_id" value="{{ $movie['imdbID'] }}" />
                <input type="hidden" name="title" value="{{ $movie['Title'] }}" />
                <input type="hidden" name="poster_url" value="{{ $movie['Poster'] }}" />
                <button type="submit" class="favorite-button">Add to Favorites</button>
            </form>
        </div>
        @endforeach
    </div>
    
    <div id="loader" style="text-align:center; display: none; margin-top: 20px;">
        <p>Loading more movies...</p>
    </div>
</div>
@endsection

@section('scripts')
<script>
    let page = 2;
    let loading = false;
    let endOfMovies = false;

    window.addEventListener('scroll', () => {
        if (loading || endOfMovies) return;

        if (window.innerHeight + window.scrollY >= document.body.offsetHeight - 500) {
            loading = true;
            document.getElementById('loader').style.display = 'block';

            fetchMovies();
        }
    });

    function fetchMovies() {
        const url = `?page=${page}&query=${encodeURIComponent("{{ request('query', 'Marvel') }}")}`;

        fetch(url, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.text())
        .then(data => {
            if (data.trim() === '') {
                endOfMovies = true;
            } else {
                document.getElementById('movie-list').insertAdjacentHTML('beforeend', data);
                page++;
            }
        })
        .finally(() => {
            loading = false;
            document.getElementById('loader').style.display = 'none';
        });
    }
</script>
@endsection
