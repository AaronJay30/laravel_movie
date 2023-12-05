<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';

    protected $primaryKey = 'reviewID';

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
}
