# Project Name

A brief description of your project.

## Table of Contents
- [Project Overview](#project-overview)
- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
- [API Endpoints](#api-endpoints)
- [Contributing](#contributing)
- [License](#license)

## Project Overview

Provide a short description of your project. What does it do? Who is it for? 

## Features

- Feature 1
- Feature 2
- Feature 3

## Installation

Follow these steps to install and set up the project locally.

### Prerequisites

- PHP 7.4+
- Composer
- Laravel (or appropriate framework)
- MySQL / PostgreSQL (or your database of choice)

### Steps

1. Clone the repository:
   ```bash
   git clone https://github.com/Hemantsf/oxford.git
   cd yourproject


composer install
php artisan key:generate
php artisan migrate
php artisan db:seed --class=DatabaseSeeder
npm run dev
php artisan serve


Usage
To run the application, navigate to http://localhost:8000 in your browser.
Interact with the app and explore the features.
API Endpoints
1. GET /api/courses
Fetches a list of courses.

Parameters:
category (optional): The category of the course.
price (optional): Price range (min-max).
difficulty (optional): Comma-separated list of difficulty levels (beginner, intermediate, advanced).
duration=2–5 hours: Filters courses with a duration between hours.
format=Interactive/Live: Filters courses with the format Interactive/Live,Video,Text-based.
popularity=Trending: Filters courses marked with Trending,Most Enrolled.
popularity=True: Filters courses Certificate Available,Not Available based on boolean value.
release_date= 30_days : Filters courses marked with 30_days,6_months,1_year.

Example Requests
GET /api/courses?category=1&price=10-100&difficulty=intermediate,advanced&duration=2–5+hours&format=Interactive/Live&popularity=Trending&certification=1&release_date=30_days



Response
{
    "status": "success",
    "message": "",
    "data": [
        {
            "id": 2,
            "title": "Advanced Laravel",
            "description": "Master Laravel with advanced techniques.",
            "price": "99.99",
            "instructor_id": 2,
            "category_id": 1,
            "difficulty": "Advanced",
            "duration": "2–5 hours",
            "format": "Interactive/Live",
            "certification_available": false,
            "release_date": "2025-01-03",
            "rating": 2,
            "popularity": "Trending",
            "created_at": "2025-01-03T13:59:34.000000Z",
            "updated_at": "2025-01-03T13:59:34.000000Z",
            "category": {
                "id": 1,
                "name": "Programming",
                "created_at": "2025-01-03T19:29:33.000000Z",
                "updated_at": "2025-01-03T19:29:33.000000Z"
            },
            "instructor": {
                "id": 2,
                "name": "Jane Smith",
                "bio": "Expert in Web Design",
                "created_at": "2025-01-03T19:29:34.000000Z",
                "updated_at": "2025-01-03T19:29:34.000000Z"
            }
        }
    ]
}


2. GET /api/categories
Fetches the list of available categories.

{
    "status": "success",
    "message": "",
    "data": [
        {
            "id": 1,
            "name": "Programming",
            "created_at": "2025-01-03T19:29:33.000000Z",
            "updated_at": "2025-01-03T19:29:33.000000Z"
        },
        {
            "id": 2,
            "name": "Design",
            "created_at": "2025-01-03T19:29:33.000000Z",
            "updated_at": "2025-01-03T19:29:33.000000Z"
        },
        {
            "id": 3,
            "name": "Business",
            "created_at": "2025-01-03T19:29:33.000000Z",
            "updated_at": "2025-01-03T19:29:33.000000Z"
        },
        {
            "id": 4,
            "name": "Marketing",
            "created_at": "2025-01-03T19:29:33.000000Z",
            "updated_at": "2025-01-03T19:29:33.000000Z"
        }
    ]
}

3.POST /api/courses
Body : 
{
    "title" : "testing api two",
    "description" : "testing description",
    "price": 0,
    "category_id": 1,
    "instructor_id" : 2,
    "difficulty" : "Intermediate",
    "duration" : "< 2 hours",
    "format" : "Video",
    "certification_available" : true,
    "popularity" : "Most Enrolled",
    "rating" : 5
}

Response: 
{
    "status": "success",
    "message": "",
    "data": {
        "title": "testing api two",
        "description": "testing description",
        "price": 0,
        "category_id": 1,
        "instructor_id": 2,
        "difficulty": "Intermediate",
        "duration": "< 2 hours",
        "format": "Video",
        "certification_available": true,
        "popularity": "Most Enrolled",
        "rating": 5,
        "release_date": "2025-01-04T06:46:12.144145Z",
        "updated_at": "2025-01-04T06:46:12.000000Z",
        "created_at": "2025-01-04T06:46:12.000000Z",
        "id": 15
    }
}
4.GET /api/courses/1

5.PUT /api/courses/1

Body: 
{
    "title" : "testing api two",
    "description" : "testing description",
    "price": 0,
    "category_id": 1,
    "instructor_id" : 2,
    "difficulty" : "Intermediate",
    "duration" : "2–5 hours",
    "format" : "Video",
    "certification_available" : true,
    "popularity" : "Most Enrolled",
    "rating" : 4
}

Response
{
    "status": "success",
    "message": "",
    "data": {
        "id": 1,
        "title": "testing api two",
        "description": "testing description",
        "price": 0,
        "instructor_id": 2,
        "category_id": 1,
        "difficulty": "Intermediate",
        "duration": "2–5 hours",
        "format": "Video",
        "certification_available": true,
        "release_date": "2023-01-03",
        "rating": 4,
        "popularity": "Most Enrolled",
        "created_at": "2025-01-03T13:59:34.000000Z",
        "updated_at": "2025-01-04T06:51:36.000000Z"
    }
}

6.DELETE /api/courses/1


