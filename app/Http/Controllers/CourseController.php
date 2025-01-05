<?php
namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Category;
use App\Models\Instructor;
use Illuminate\Http\Request;

class CourseController extends BaseController
{
    // Retrieve all courses (with filtering)
    public function index(Request $request)
    {
        try{
            $query = Course::query();
    
            // Filter by category
            if ($request->has('category') && $request->category != '') {
                $query->where('category_id', $request->category);
            }
    
            // Filter by price
            if ($request->has('price') && $request->price != '') {
                $priceRange = explode('-', $request->price);
                if (count($priceRange) == 2) {
                    $query->whereBetween('price', [trim($priceRange[0]), trim($priceRange[1])]);
                } elseif ($request->price == 'Free') {
                    $query->where('price', 0);
                } elseif ($request->price == 'Paid') {
                    $query->where('price', '>', 0);
                }
            }
    
            // Filter by difficulty
            if ($request->has('difficulty') && !empty($request->difficulty)) {
                // Split the difficulty string into an array
                $difficulties = explode(',', $request->difficulty);
                $difficulties = array_map(function($difficulty) {
                    return ucwords(strtolower($difficulty));
                }, $difficulties);
                // Apply the filter using whereIn
                $query->whereIn('difficulty', $difficulties);
            }
    
            // Filter by duration
            if ($request->has('duration') && $request->duration != '') {
                $query->where('duration', $request->duration);
            }
    
            // Filter by ratings
            if ($request->has('rating') && $request->rating != '') {
                $rating = $request->rating;
                if ($rating == '4+') {
                    $query->where('rating', '>=', 4); // Get courses with rating >= 4
                } elseif ($rating == '3+') {
                    $query->where('rating', '>=', 3); // Get courses with rating >= 3
                } elseif ($rating == '2') {
                    $query->where('rating', '<', 3); // Get courses with rating < 3 (2 Stars and below)
                }
            }
    
            // Filter by course format
            if ($request->has('format') && $request->format != '') {
                $query->where('format', $request->format);
            }
    
            // Filter by certification
            if ($request->has('certification') && $request->certification != '') {
                $query->where('certification_available', $request->certification);
            }
    
            // Filter by release date
            if ($request->has('release_date') && $request->release_date != '') {
                if ($request->release_date == '30_days') {
                    $query->where('release_date', '>=', now()->subDays(30));
                } elseif ($request->release_date == '6_months') {
                    $query->where('release_date', '>=', now()->subMonths(6));
                } elseif ($request->release_date == '1_year') {
                    $query->where('release_date', '>=', now()->subYear());
                }
            }
    
            // Filter by popularity
            if ($request->has('popularity') && $request->popularity != '') {
                $query->where('popularity', $request->popularity);
            }
    
            // Eagerly load category and instructor relationships
            $courses = $query->with(['category', 'instructor'])->get();
    
            return $this->apiSuccess($courses);
        } catch (\Exception $e) {
            return $this->apiError('Unable to fetch courses', 'fetch_error', ['error' => $e->getMessage()]);
        }
    }

    public function create_course(){
        // echo 'hiii12';
        // die();
       return view('create_course');
    }

    public function show($id)
    {
        try {
            $course = Course::with(['category', 'instructor'])->findOrFail($id);

            return $this->apiSuccess($course);
        } catch (\Exception $e) {
            return $this->apiError('Course not found', 'not_found', ['error' => $e->getMessage()], 404);
        }
    }

    // Add a new course
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'price' => 'required|numeric',
                'category_id' => 'required|exists:categories,id',
                'instructor_id' => 'required|exists:instructors,id',
                'difficulty' => 'required|in:Intermediate,Beginner,Advanced',
                'duration' => 'required|in:< 2 hours,2–5 hours,5–10 hours,> 10 hours',
                'format' => 'required|string',
                'certification_available' => 'required|in:true,false',
                'popularity' => 'required|in:Most Enrolled,Trending,Recently Viewed',
                'rating' => 'required|integer|max:5',
            ]);
            $validatedData['release_date'] = now();
            // print_r($validatedData);
            // die();
            $course = Course::create($validatedData);

            return $this->apiSuccess($course, 201);
        } catch (\Exception $e) {
            return $this->apiError('Unable to create course', 'create_error', ['error' => $e->getMessage()]);
        }
    }

    // Update an existing course
    public function update(Request $request, $id)
    {
        try {
            $course = Course::findOrFail($id);

            $validatedData = $request->validate([
                'title' => 'required|string|max:100',
                'description' => 'required|string|max:255',
                'price' => 'required|numeric',
                'category_id' => 'required|exists:categories,id',
                'instructor_id' => 'required|exists:instructors,id',
                'difficulty' => 'required|in:Intermediate,Beginner,Advanced',
                'duration' => 'required|in:< 2 hours,2–5 hours,5–10 hours,> 10 hours',
                'format' => 'required|string',
                'certification_available' => 'required|boolean',
                'popularity' => 'required|in:Most Enrolled,Trending,Recently Viewed',
                'rating' => 'required|integer|max:5',
            ]);

            $course->update($validatedData);

            return $this->apiSuccess($course);
        } catch (\Exception $e) {
            return $this->apiError('Unable to update course', 'update_error', ['error' => $e->getMessage()]);
        }
    }

    // Delete a course
    public function destroy($id)
    {
        try {
            $course = Course::findOrFail($id);
            if(empty($course)){
                return $this->apiError('Invalid Id', ['error' => $e->getMessage()]); 
            }
            $course->delete();

            return $this->apiSuccess(['message' => 'Course deleted successfully']);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Return custom error if course is not found
            return $this->apiError('Invalid Id', 'invalid_id', ['error' => $e->getMessage()]);
        } catch (\Exception $e) {
            // Return generic error if something else fails
            return $this->apiError('Unable to delete course', 'delete_error', ['error' => $e->getMessage()]);
        }
    }
}
