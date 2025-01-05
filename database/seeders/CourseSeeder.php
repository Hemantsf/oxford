<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Category;
use App\Models\Instructor;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run()
    {
        // Fetch category and instructor IDs dynamically
        $programmingCategory = Category::where('name', 'Programming')->first();
        $designCategory = Category::where('name', 'Design')->first();
        $johnDoeInstructor = Instructor::where('name', 'John Doe')->first();
        $janeSmithInstructor = Instructor::where('name', 'Jane Smith')->first();

        // Define possible dynamic values for difficulty, duration, format, and certification
        $difficulties = ['Beginner', 'Intermediate', 'Advanced'];
        $durations = ['< 2 hours', '2–5 hours', '5–10 hours', '> 10 hours'];
        $formats = ['Video', 'Text-based', 'Interactive/Live'];
        $certifications = [True, False];
        $popularitys = ['Most Enrolled', 'Trending', 'Recently Viewed'];
        $ratings = [1,2,3,4,5];

        // Define course data array
        $coursesData = [
            ['title' => 'Laravel Basics', 'description' => 'Learn the basics of Laravel.', 'price' => 49, 'category' => $programmingCategory, 'instructor' => $johnDoeInstructor],
            ['title' => 'Advanced Laravel', 'description' => 'Master Laravel with advanced techniques.', 'price' => 99, 'category' => $programmingCategory, 'instructor' => $janeSmithInstructor],
            ['title' => 'HTML and CSS Basics', 'description' => 'Start from scratch and build beautiful websites.', 'price' => 29, 'category' => $designCategory, 'instructor' => $johnDoeInstructor],
            ['title' => 'JavaScript for Beginners', 'description' => 'Learn JavaScript fundamentals for web development.', 'price' => 39, 'category' => $programmingCategory, 'instructor' => $johnDoeInstructor],
            ['title' => 'Python Programming', 'description' => 'Learn Python for data analysis and automation.', 'price' => 59, 'category' => $programmingCategory, 'instructor' => $johnDoeInstructor],
            ['title' => 'Responsive Web Design', 'description' => 'Design websites that work on any screen size.', 'price' => 49, 'category' => $designCategory, 'instructor' => $janeSmithInstructor],
            ['title' => 'Data Structures and Algorithms', 'description' => 'Master data structures and algorithms for programming.', 'price' => 89, 'category' => $programmingCategory, 'instructor' => $johnDoeInstructor],
            ['title' => 'Business Strategy 101', 'description' => 'Learn the fundamentals of business strategy and management.', 'price' => 79, 'category' => $designCategory, 'instructor' => $janeSmithInstructor],
            ['title' => 'Marketing Fundamentals', 'description' => 'Understand the core principles of marketing and digital strategies.', 'price' => 49, 'category' => $designCategory, 'instructor' => $johnDoeInstructor],
            ['title' => 'UI/UX Design for Beginners', 'description' => 'Learn the basics of user interface and user experience design.', 'price' => 59, 'category' => $designCategory, 'instructor' => $janeSmithInstructor]
        ];

        // Loop through the courses data and insert each course with dynamic values
        foreach ($coursesData as $courseData) {
            Course::create([
                'title' => $courseData['title'],
                'description' => $courseData['description'],
                'price' => $courseData['price'],
                'category_id' => $courseData['category']->id,
                'instructor_id' => $courseData['instructor']->id,
                'difficulty' => $difficulties[array_rand($difficulties)],  // Random difficulty
                'duration' => $durations[array_rand($durations)],        // Random duration
                'format' => $formats[array_rand($formats)],              // Random format
                'certification_available' => $certifications[array_rand($certifications)], // Random certification
                'popularity'=>$popularitys[array_rand($certifications)],
                'rating'=>$ratings[array_rand($ratings)],
                'release_date' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
