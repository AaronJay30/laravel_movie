<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Review;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $featuredMovies = Movie::query()
            ->orderByDesc('average_rating')
            ->limit(5)
            ->get();

        $topMovie = Movie::query()
            ->orderByDesc('average_rating')
            ->limit(1)
            ->first();

        $specialMovie = Movie::query()
            ->where('title', '=', 'Home Alone')
            ->first();

        $movies = Movie::inRandomOrder()
            ->limit(8)
            ->get();

        return view('index')->with(compact('featuredMovies', 'topMovie', 'specialMovie', 'movies'));
    }

    public function showAllMovie()
    {
        $genres = Movie::distinct('genre')
            ->pluck('genre')
            ->flatMap(fn ($string) => explode(', ', $string))
            ->map(fn ($genre) => strtoupper($genre))
            ->unique()
            ->sort()
            ->values()
            ->toArray();

        return view('Movies.movie')->with(compact('genres'));
    }

    public function genreAjax(Request $request)
    {
        if ($request->boolean('showMovie')) {
            $movies = Movie::all();
            return response()->json(['movie' => $movies]);
        }
        if ($request->boolean('filterMovie')) {
            $validatedData = $request->validate([
                'searchInput' => 'nullable|string',
                'genreSelect' => 'nullable|string',
            ]);

            $searchInput = $validatedData['searchInput'] ?? '';
            $genreSelect = $validatedData['genreSelect'] ?? '';

            $movies = Movie::query()
                ->when(!empty($genreSelect), function ($query) use ($genreSelect) {
                    return $query->where('genre', 'LIKE', "%$genreSelect%");
                })
                ->when(!empty($searchInput), function ($query) use ($searchInput) {
                    return $query->where('title', 'LIKE', "%$searchInput%");
                })
                ->get();

            return response()->json(['movies' => $movies]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        $validatedData = $request->validate([
            'title' => 'required',
            'director' => 'required',
            'cast' => 'required',
            'year' => 'required',
            'genre' => 'required',
            'synopsis' => 'required',
            'file' => 'file|required|mimes:jpg,png,jpeg,webp'
        ]);

        $filename = "";
        if ($request->hasFile('file')) {
            $filename = $validatedData['title'] . '.' . $request->file->extension();

            $request->file->move(public_path('/img/posters/'), $filename);
        }

        $movie = Movie::create([
            'title' => $validatedData['title'],
            'director' => $validatedData['director'],
            'synopsis' => $validatedData['synopsis'],
            'year' => $validatedData['year'],
            'cast' => $validatedData['cast'],
            'genre' => $validatedData['genre'],
            'poster' => $filename,
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $movie = Movie::find($id);
        $review = Review::where('movieID', '=', $id)->get();

        $movieID = $id;

        $ratingsCount = array();
        $totalReviewCount = 0;

        for ($rating = 1; $rating <= 5; $rating++) {
            $reviewQuery = Review::where('movieID', $id)->where('rating', $rating)->get();

            $ratingsCount[$rating] = $reviewQuery->count();
            $totalReviewCount += $ratingsCount[$rating];
        }


        return view('Movies.movieInfo')->with(compact('movie', 'review', 'ratingsCount', 'totalReviewCount', 'movieID'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // ADMIN
    public function adminIndex()
    {
        return view('Admin.admin');
    }

    public function adminMovieAjax(Request $request)
    {
        if ($request->boolean('showMovie')) {
            $movies = Movie::all();
            return response()->json(['movie' => $movies]);
        } elseif ($request->boolean('deleteMovie')) {
            $movieID = $request['movieID'];
            $movies = Movie::findOrFail($movieID)->delete();
            return response()->json(['movie' => $movies]);
        } elseif ($request->boolean('searchMovies')) {
            $query = $request['query'];
            $movies = Movie::where('title', 'LIKE', '%' . $query . '%')->get();
            return response()->json(['movie' => $movies]);
        }
    }

    public function adminMovie($movieID)
    {

        $movie = Movie::findOrFail($movieID);

        return view('Admin.admin_movie')->with(compact('movie', 'movieID'));
    }
}
