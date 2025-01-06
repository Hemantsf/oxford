<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'price', 'category_id', 'instructor_id', 'difficulty', 'duration', 'format', 'certification_available','popularity','rating','release_date'
    ];

    // Define relationship with Category
    public function scopeFilter($query, $filters)
    {
        // Simple filters
        $simpleFilters = [
            'category_id' => $filters['category'] ?? null,
            'duration' => $filters['duration'] ?? null,
            'format' => $filters['format'] ?? null,
    
            'popularity' => $filters['popularity'] ?? null,
        ];

        foreach ($simpleFilters as $field => $value) {
            if (!empty($value)) {
                $query->where($field, $value);
            }
        }
        if (isset($filters['certification'])) { // Check for both 0 and 1
            $query->where('certification_available', $filters['certification']);
        }
        // Price filter
        if (!empty($filters['price'])) {
            $this->applyPriceFilter($query, $filters['price']);
        }

        // Difficulty filter
        if (!empty($filters['difficulty'])) {
            $this->applyDifficultyFilter($query, $filters['difficulty']);
        }

        // Rating filter
        if (!empty($filters['rating'])) {
            $this->applyRatingFilter($query, $filters['rating']);
        }

        // Release date filter
        if (!empty($filters['release_date'])) {
            $this->applyReleaseDateFilter($query, $filters['release_date']);
        }

        return $query;
    }

    private function applyPriceFilter($query, $price)
    {
        if ($price == 'Free') {
            $query->where('price', 0);
        } elseif ($price == 'Paid') {
            $query->where('price', '>', 0);
        } else {
            $priceRange = explode('-', $price);
            if (count($priceRange) == 2) {
                $query->whereBetween('price', [trim($priceRange[0]), trim($priceRange[1])]);
            }
        }
    }

    private function applyDifficultyFilter($query, $difficulty)
    {
        $difficulties = array_map('ucwords', explode(',', $difficulty));
        $query->whereIn('difficulty', $difficulties);
    }

    private function applyRatingFilter($query, $rating)
    {
        if ($rating == '4+') {
            $query->where('rating', '>=', 4);
        } elseif ($rating == '3+') {
            $query->where('rating', '>=', 3);
        } elseif ($rating == '2') {
            $query->where('rating', '<', 3);
        }
    }

    private function applyReleaseDateFilter($query, $releaseDate)
    {
        if ($releaseDate == '30_days') {
            $query->where('release_date', '>=', now()->subDays(30));
        } elseif ($releaseDate == '6_months') {
            $query->where('release_date', '>=', now()->subMonths(6));
        } elseif ($releaseDate == '1_year') {
            $query->where('release_date', '>=', now()->subYear());
        }
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }

}
