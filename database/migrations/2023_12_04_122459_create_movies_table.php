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
        Schema::create('movies', function (Blueprint $table) {
            $table->bigIncrements('movieID');
            $table->string('title')->nullable();
            $table->string('director')->nullable();
            $table->string('cast')->nullable();
            $table->string('genre')->nullable();
            $table->string('poster')->nullable();
            $table->longText('synopsis')->nullable();
            $table->string('year')->nullable();
            $table->integer('average_rating')->default(0);
            $table->integer('total_review_count')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
