<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    public function reviewAjax(Request $request)
    {
        if ($request->boolean('showReview')) {
            $movieID = $request->movieID;
            $review = Review::with('user', 'movie')->where('movieID', $movieID)->get();
            return response()->json(['review' => $review]);
        } elseif ($request->boolean('addReview')) {

            // dd($request->datas);

            $datas = $request->datas;
            $movieID = $datas['movieID'];

            $data_array = [
                'movieID' => $movieID,
                'userID' => $datas['userID'],
                'rating' => $datas['stars'],
                'review_subject' => $datas['review_subject'],
                'review_text' => $datas['review'],
                'review_date' => date('Y-m-d'),  // Assuming you want to format the date
            ];


            Review::create($data_array);

            $movie = Movie::findOrFail($movieID);

            $totalRating = Review::where('movieID', $movieID)->sum('rating');
            $totalReviews = Review::where('movieID', $movieID)->count();

            $averageRating = ($totalRating / ($totalReviews * 5)) * 100;

            $movie->total_review_count += 1;
            $movie->average_rating = $averageRating;
            $movie->update();

            return response()->json(['movie' => true]);
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
}
