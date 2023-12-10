<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->bigIncrements('reviewID')->unsigned();
            $table->unsignedBigInteger('movieID');
            $table->unsignedBigInteger('userID');
            $table->integer('rating');
            $table->string('review_subject');
            $table->string('flags')->default("Show");
            $table->longText('review_text');
            $table->date('review_date');

            $table->foreign('movieID')->references('movieID')->on('movies');
            $table->foreign('userID')->references('userID')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
