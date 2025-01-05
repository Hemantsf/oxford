# Course Management API

This API provides endpoints to manage courses, categories, and course-related data such as instructor,price, difficulty, duration, format, certification, popularity, and release date.

## Table of Contents
- [Project Overview](#project-overview)
- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
- [API Endpoints](#api-endpoints)
- [Contributing](#contributing)
- [License](#license)

## Project Overview

This project allows users to manage courses, including adding, updating, deleting, and viewing courses. It also supports filtering based on various parameters such as category, price, difficulty, duration, format, popularity, and certification availability.

## Features

- Manage courses with attributes like title, description, price, instructor, difficulty, duration, format, etc.
- Filter courses based on category, price, difficulty, duration, format, popularity, certification, and release date.
- CRUD operations on courses.

## Installation

Follow these steps to install and set up the project locally.

### Prerequisites

- PHP 7.4+
- Composer
- Laravel (or appropriate framework)
- PostgreSQL

### Steps

1. Clone the repository:
   ```bash
   git clone https://github.com/Hemantsf/oxford.git
   cd oxford
   ```
Install dependencies:

```bash
composer install
```
Create .env change databse according your database and credentials
```bash
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:WMMsWTbsc/JOxwK3IFfWCa7TGfxcEu1Nfmg/VviVxx8=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=oxfordcourses
DB_USERNAME=so_portal
DB_PASSWORD=so_portal

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_HOST=
PUSHER_PORT=443
PUSHER_SCHEME=https
PUSHER_APP_CLUSTER=mt1

VITE_APP_NAME="${APP_NAME}"
VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
VITE_PUSHER_HOST="${PUSHER_HOST}"
VITE_PUSHER_PORT="${PUSHER_PORT}"
VITE_PUSHER_SCHEME="${PUSHER_SCHEME}"
VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

```
Generate the application key:
```bash
php artisan key:generate
```

Run database migrations:
```bash
php artisan migrate
```

Seed the database:
```bash
php artisan db:seed --class=DatabaseSeeder
```

Install npm
```bash
npm install
```

Compile assets (optional for frontend):
```bash
npm run dev
```

Start the Laravel development server:
```bash
php artisan serve
```

Now, you can access the API at http://127.0.0.1:8000/.

Usage
To interact with the API, use the following endpoints and methods,json.

Import postman json for api testing
```bash
postman-packs/Oxford.postman_collection.json
```
API Endpoints

1.GET /api/courses

Fetches a list of courses.

Query Parameters:
```bash
category (optional): The category of the course.
price (optional): Price range (min-max).
difficulty (optional): Comma-separated list of difficulty levels (beginner, intermediate, advanced).
duration (optional): Duration of the course (e.g., 2–5 hours).
format (optional): Format of the course (e.g., Interactive/Live, Video, Text-based).
popularity (optional): Popularity (e.g., Trending, Most Enrolled).
certification (optional): Filters courses with certification availability (true, false).
release_date (optional): Filters courses by release date (30_days, 6_months, 1_year).
```

Example Request:

```bash
GET /api/courses?category=1&price=10-100&difficulty=intermediate,advanced&duration=2–5+hours&format=Interactive/Live&popularity=Trending&certification=true&release_date=30_days
```

Response Example:

```json
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
            "updated_at": "2025-01-03T13:59:34.000000Z"
        }
    ]
}
```

2.GET /api/categories

Fetches a list of available categories.

Response Example:

```json
{
    "status": "success",
    "message": "",
    "data": [
        { "id": 1, "name": "Programming" },
        { "id": 2, "name": "Design" },
        { "id": 3, "name": "Business" },
        { "id": 4, "name": "Marketing" }
    ]
}
```

POST /api/courses

Create a new course.

Request Body Example:

```json
{
    "title": "New Course",
    "description": "Course description here.",
    "price": 99.99,
    "category_id": 1,
    "instructor_id": 2,
    "difficulty": "Intermediate",
    "duration": "2–5 hours",
    "format": "Video",
    "certification_available": true,
    "popularity": "Most Enrolled",
    "rating": 5
}
```
Response Example:

```json
{
    "status": "success",
    "message": "",
    "data": {
        "id": 15,
        "title": "New Course",
        "description": "Course description here.",
        "price": 99.99,
        "category_id": 1,
        "instructor_id": 2,
        "difficulty": "Intermediate",
        "duration": "2–5 hours",
        "format": "Video",
        "certification_available": true,
        "popularity": "Most Enrolled",
        "rating": 5,
        "release_date": "2025-01-04T06:46:12.144145Z",
        "created_at": "2025-01-04T06:46:12.000000Z",
        "updated_at": "2025-01-04T06:46:12.000000Z"
    }
}
```
3.GET /api/courses/{id}

Fetch a single course by ID.

Response Example:

```json
{
    "status": "success",
    "message": "",
    "data": {
        "id": 1,
        "title": "Advanced Laravel",
        "description": "Learn Laravel at an advanced level.",
        "price": "99.99",
        "difficulty": "Advanced",
        "duration": "2–5 hours",
        "format": "Video",
        "popularity": "Most Enrolled",
        "certification_available": true,
        "release_date": "2025-01-03",
        "rating": 4
    }
}
```

4.PUT /api/courses/{id}

Update a course by ID.

Request Body Example:

```json
{
    "title": "Updated Course Title",
    "description": "Updated description.",
    "price": 149.99,
    "category_id": 1,
    "instructor_id": 2,
    "difficulty": "Intermediate",
    "duration": "2–5 hours",
    "format": "Video",
    "certification_available": true,
    "popularity": "Trending",
    "rating": 4
}
```
Response Example:

```json
{
    "status": "success",
    "message": "",
    "data": {
        "id": 1,
        "title": "Updated Course Title",
        "description": "Updated description.",
        "price": 149.99,
        "difficulty": "Intermediate",
        "duration": "2–5 hours",
        "format": "Video",
        "certification_available": true,
        "popularity": "Trending",
        "rating": 4
    }
}
```
5.DELETE /api/courses/{id}

Delete a course by ID.

Response Example:

```json
{
    "status": "success",
    "message": "Course deleted successfully."
}
```
Contributing
Feel free to fork this repository and submit pull requests to contribute to the project.

License
This project is licensed under the MIT License - see the LICENSE.md file for details.

This `README.md` covers all the important sections, including API endpoints, usage instructions, and example requests and responses.





