<?php

namespace App\Models;

use App\Http\Controllers\MovieController;
use App\Http\Controllers\UserController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';

    protected $primaryKey = 'reviewID';

    public $timestamps = false;

    protected $fillable = [
        'movieID',
        'userID',
        'review_subject',
        'rating',
        'review_text',
        'review_date',
        'flags',

    ];

    public function movie()
    {
        return $this->belongsTo(Movie::class, 'movieID', 'movieID');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userID', 'userID');
    }
}
