<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FavoriteMovie extends Model
{
    protected $fillable = ['user_id', 'movie_id', 'title', 'poster_url'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
