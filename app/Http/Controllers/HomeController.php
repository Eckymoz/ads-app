<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $adsCategories = Category::all();
        $ads = Ads::orderBy('created_at', 'desc')->with(['user', 'categories'])->paginate(5);

        if ($request->expectsJson()) {
            return response()->json($ads);
        } else {
            return view('home', compact('ads', 'adsCategories'));

        }

    }
}
