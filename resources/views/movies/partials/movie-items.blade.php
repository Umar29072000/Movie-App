@foreach ($movies as $movie)
<div class="movie-item">
    <img data-src="{{ $movie['Poster'] }}" class="lazyload" alt="{{ $movie['Title'] }}" />
    <a href="{{ route('movies.show', $movie['imdbID']) }}">{{ $movie['Title'] }}</a>
</div>
@endforeach
