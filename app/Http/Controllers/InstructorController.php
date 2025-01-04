<?php

namespace App\Http\Controllers;

use App\Models\Instructor;

class InstructorController extends Controller
{
    public function index()
    {
        return response()->json(Instructor::all());
    }
}
