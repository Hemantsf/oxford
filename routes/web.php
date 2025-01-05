<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('courses');
    
})->name('index');
Route::get('/create_course', function () {
    return view('create_course');
    
});
Route::get('/edit_course/{id}', function () {
    return view('edit_course');
    
});
//Route::get('/create_course', [CourseController::class, 'create_course']);
