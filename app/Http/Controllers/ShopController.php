<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ShopController extends Controller
{
    public function __invoke()
    {
        $products = Product::with(['category', 'media'])->where('status', '=', 'Available')->paginate(15);

        return view('shop.index', compact('products'));
    }
}
