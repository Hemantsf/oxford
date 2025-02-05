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
        try {
            $filters = $request->all();

            // Apply filters and eager load relationships
            $courses = Course::filter($filters)->with(['category', 'instructor'])->get();

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
                'format' => 'required|string|in:Video,Text-based,Interactive/Live',
                'certification_available' => 'required|boolean',
                'popularity' => 'required|in:Most Enrolled,Trending,Recently Viewed',
                'rating' => 'required|integer|max:5',
            ]);
            $validatedData['release_date'] = now();
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
                'format' => 'required|string|in:Video,Text-based,Interactive/Live',
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
