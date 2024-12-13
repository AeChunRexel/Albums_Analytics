<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class Album extends Model
{
    use HasFactory;

    protected $table = 'albums_table';

    protected $fillable = [
        'ranking', 'album', 'artist_id', 'release_date', 
        'average_rating', 'number_of_ratings', 
        'number_of_reviews', 'genre_id'
    ];

    // Automatically cast 'release_date' to a Carbon instance
    protected $casts = [
        'release_date' => 'datetime',
    ];

    // Custom method for fetching the number of albums within a genre for each month of a given year
    public static function albumsByGenreAndYear($genre, $year)
    {
        return self::join('genres_table', 'albums_table.genre_id', '=', 'genres_table.genre_id')
            ->where('genres_table.genres', 'LIKE', '%' . $genre . '%')
            ->whereYear('albums_table.release_date', $year)
            ->get()
            ->groupBy(function ($album) {
                return Carbon::parse($album->release_date)->format('F'); // Group by month name
            })
            ->map(function ($monthGroup) {
                return $monthGroup->count(); // Count albums in each month
            });
    }
}

