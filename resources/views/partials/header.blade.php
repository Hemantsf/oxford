<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Discovery</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<header class="bg-gray-600 text-white py-4">
    <div class="max-w-screen-xl mx-auto flex justify-between items-center">
        <a href="/" class="flex items-center">
            <img src="{{ asset('assets/logo-v3.png') }}" alt="OIEG Logo" class="h-10 w-auto mr-2">
        </a>
        <!-- <nav> -->
            <ul class="flex space-x-6 mr-2">
                <li><a href="/" class="text-lg items-center text-white-600 hover:text-white-600">Courses</a></li>
                <li>

                <button 
                    class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300"
                    onclick="applyNow('${course.id}')">
                    Log In
                </button>
                </li>
                <li>
                <button 
                    class=" bg-blue-600 text-white font-semibold py-2 px-2 rounded-lg hover:bg-blue-700 transition duration-300"
                    onclick="applyNow('${course.id}')">
                    Sign Up
                </button>
            </div>
            </ul>
        <!-- </nav> -->
    </div>
</header>