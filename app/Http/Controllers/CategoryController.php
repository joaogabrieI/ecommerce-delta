<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        $categories = Category::all();
        return view('home.categoryProducts')->with(['products' => $products, 'categories' => $categories]);
    }
}
