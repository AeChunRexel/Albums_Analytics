<?php
namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AlbumController extends Controller
{
    public function index(Request $request)
    {
        // Get the total number of artists 
        $totalArtists = Artist::count();
        $totalAlbum = Album::count();
        $overallRating = Album::avg('average_rating');

        $years = Album::all()->map(function ($album) {
            return date('Y', strtotime($album->release_date));
        })->unique()->sortDesc();

        // Get the selected year from the request or default to the first year
        $year = $request->input('year', $years->first());

        // Get the selected view from the request or default to 'Top Albums'
        $view = $request->input('view', 'Top');
        $viewLabel = $view === 'Bottom' ? 'Least Popular Albums' : 'Top Popular Albums';

        // Fetch all albums for the selected year
        $albums = Album::whereYear('release_date', $year)->get();

        // Count the number of albums released in each month
        $albumsByMonth = $albums->groupBy(function ($album) {
            return date('M', strtotime($album->release_date));
        })->map(function ($monthGroup) {
            return $monthGroup->count();
        });

        // Prepare the data for the chart (months and album counts)
        $months = collect(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']);
        $albumCounts = $months->map(function ($month) use ($albumsByMonth) {
            return $albumsByMonth->get($month, 0);
        });

        // Fetch top or bottom 10 albums based on the selected view
        if ($view === 'Bottom') {
            $albumsView = Album::whereYear('release_date', $year)
                ->orderBy('average_rating', 'asc')
                ->take(10)
                ->get();
        } else {
            $albumsView = Album::whereYear('release_date', $year)
                ->orderBy('average_rating', 'desc')
                ->take(10)
                ->get();
        }

        // Multiply ratings by 10 to convert them to whole numbers
        $albumRatings = $albumsView->pluck('average_rating');

        $albumNames = $albumsView->pluck('album');

        // Fetch genre and handle fetching number of albums by genre for each month of the year
        $genre = $request->input('genre');
        $albumsByGenreAndMonth = Album::join('genres_table', 'albums_table.genre_id', '=', 'genres_table.genre_id')
            ->where('genres_table.genres', 'LIKE', '%' . $genre . '%')
            ->whereYear('albums_table.release_date', $year)
            ->get()
            ->groupBy(function ($album) {
                return Carbon::parse($album->release_date)->format('F'); // Group by month name
            })
            ->map(function ($monthGroup) {
                return $monthGroup->count(); // Count albums in each month
            });

        $genreMonths = collect(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']);
        $genreAlbumCounts = $genreMonths->map(function ($month) use ($albumsByGenreAndMonth) {
            return $albumsByGenreAndMonth->get($month, 0);
        });

        // Pass the data to the view
        return view('dashboard', compact('months', 'albumCounts', 'years', 'albumNames', 'albumRatings', 'year',
         'view', 'viewLabel', 'genreMonths', 'genreAlbumCounts', 'totalArtists', 'totalAlbum', 'overallRating'));
    }
}
