<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends BaseController
{
    public function index()
    {
        try {
            // Fetch all categories
            $categories = Category::all();
    
            // Check if categories are found, if empty return error response
            if ($categories->isEmpty()) {
                return $this->apiError('No categories found', 'no_categories_found');
            }
    
            // Return success response with categories data
            return $this->apiSuccess($categories);
        } catch (\Exception $e) {
            // Handle any unexpected errors
            return $this->apiError('Unable to fetch categories', 'fetch_error', ['error' => $e->getMessage()]);
        }
    }
    
}
