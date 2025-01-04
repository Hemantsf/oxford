<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CourseTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_course()
    {
        $response = $this->postJson('/api/courses', [
            'title' => 'Laravel Basics',
            'description' => 'Learn the basics of Laravel.',
            'price' => 49.99,
            'instructor' => 'John Doe',
            'category' => 'Programming',
            'difficulty' => 'Beginner',
            'duration' => '5-10 hours',
            'format'=> 'Video'
        ]);

        $response->assertStatus(201)
                 ->assertJson([
                     'title' => 'Laravel Basics',
                 ]);
    }
}
