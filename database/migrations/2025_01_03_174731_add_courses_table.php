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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->decimal('price', 8, 2);  // Adjust the size as necessary
            $table->foreignId('instructor_id')->constrained('instructors');
            $table->foreignId('category_id')->constrained('categories');
            $table->enum('difficulty', ['Beginner', 'Intermediate', 'Advanced']);
            $table->enum('duration', ['< 2 hours', '2–5 hours', '5–10 hours', '> 10 hours']);
            $table->enum('format', ['Video', 'Text-based', 'Interactive/Live']);
            $table->boolean('certification_available');
            $table->date('release_date');
            $table->integer('rating');
            $table->enum('popularity',['Most Enrolled', 'Trending', 'Recently Viewed']);  // For tracking most enrolled, trending, etc.    
            $table->timestampTz('created_at')->useCurrent();
            $table->timestampTz('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
