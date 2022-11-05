<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryShowController extends Controller
{
    public function __invoke(Category $category)
    {
        $query = $category->products();
        $products = $query->paginate(12);

        return view('category.show', compact('category', 'products'));
    }
}
