<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): Renderable
    {
        $announcements = Announcement::orderBy('created_at', 'desc')->paginate(5);

        return view('home', compact('announcements'));
    }
}
