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
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Define relationship with Instructor
    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }
}
