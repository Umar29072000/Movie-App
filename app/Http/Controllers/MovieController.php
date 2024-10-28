<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\FavoriteMovie;

class MovieController extends Controller
{
    public function listMovies(Request $request)
    {
        $query = $request->input('query', 'Marvel');
        $page = $request->input('page', 1);

        $client = new Client();

        $response = $client->get("http://www.omdbapi.com", [
            'query' => [
                'apikey' => env('OMDB_API_KEY'),
                's' => $query,
                'page' => $page
            ]
        ]);

        $movies = json_decode($response->getBody(), true)['Search'] ?? [];

        if ($request->ajax()) {
            return view('movies.partials.movie-items', compact('movies'))->render();
        }

        return view('movies.list', compact('movies'));
    }

    public function showMovie($id)
    {
        $client = new Client();

        $response = $client->get("http://www.omdbapi.com", [
            'query' => [
                'apikey' => env('OMDB_API_KEY'),
                'i' => $id
            ]
        ]);

        $movie = json_decode($response->getBody(), true);
        return view('movies.detail', compact('movie'));
    }

    public function addFavorite(Request $request)
    {
        $existingFavorite = FavoriteMovie::where('user_id', Auth::id())
            ->where('movie_id', $request->movie_id)
            ->first();

        if (!$existingFavorite) {
            FavoriteMovie::create([
                'user_id' => Auth::id(),
                'movie_id' => $request->movie_id,
                'title' => $request->title,
                'poster_url' => $request->poster_url,
            ]);
            session()->flash('success', 'Movie added to favorites!');
        } else {
            session()->flash('info', 'Movie is already in your favorites.');
        }

        return redirect()->back();
    }

    public function removeFavorite($id)
    {
        $favorite = FavoriteMovie::where('id', $id)->where('user_id', Auth::id())->first();
        
        if ($favorite) {
            $favorite->delete();
            session()->flash('success', 'Movie removed from favorites!');
        } else {
            session()->flash('error', 'Movie not found in your favorites.');
        }

        return redirect()->back();
    }

    public function favorites()
    {
        $favorites = FavoriteMovie::where('user_id', Auth::id())->get();
        return view('movies.favorites', compact('favorites'));
    }
}
