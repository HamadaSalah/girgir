<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Request $request,Category $category)
    {
        $category->load('services');
        
        return view('category.show', compact('category'));
    }
}
