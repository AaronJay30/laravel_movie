<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $table = "movies";

    protected $primaryKey = 'movieID';


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'director',
        'cast',
        'genre',
        'poster',
        'synopsis',
        'year',
        'average_rating',
        'total_review_count',
    ];

    public $timestamps = false;
}
