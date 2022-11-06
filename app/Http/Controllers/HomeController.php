<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\HomeSlide;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $slides = HomeSlide::query()->where('is_active', '=', true)->get();
        $categories = Category::query()->whereHas('products')->get();

        return view('welcome', compact('categories', 'slides'));
    }

    public function about()
    {
        return view('about');
    }
    public function contact()
    {
        $settings=Setting::first()->get();
        return view('contact',compact('settings'));
    }

    public function storeContact(Request $request)
    {

    }
}
