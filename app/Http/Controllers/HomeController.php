<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
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
        $announcements = Announcement::orderBy('created_at', 'desc')->with(['user', 'categories'])->paginate(5);

        if ($request->expectsJson()) {
            return response()->json($announcements);
        } else {
            return view('home', compact('announcements', 'adsCategories'));

        }

    }
}
