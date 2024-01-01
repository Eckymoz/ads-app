<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnnouncementRequest;
use App\Http\Services\AnnouncementService;
use App\Models\Announcement;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Benchmark;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AnnouncementsController extends Controller
{
    private $announcementService;

    public function __construct(AnnouncementService $announcementService)
    {
        $this->announcementService = $announcementService;
    }

    public function create() {

        $categories = Category::all();

        return view('announcements.create', compact('categories'));
    }

    public function show(Announcement $announcement) {

        return view('announcements.show', compact('announcement'));
    }

    public function store(AnnouncementRequest $request) {

        $data          = $request->validated();
        $user          = auth()->user();
        $categoryNames = $request->categories;

        $this->announcementService->createAnnouncement($user, $data, $categoryNames);

        $request->session()->flash('success', 'Votre annonce a été créée avec succès.');

        return redirect()->route('home');
    }

    public function edit(Announcement $announcement) {

        $categories             = Category::all();
        $announcementCategories = $announcement->categories;

        return view('announcements.edit', compact('announcement','categories', 'announcementCategories'));
    }
    public function update(AnnouncementRequest $request, $announcement) {

        $data          = $request->validated();
        $categoryNames = $request->categories;
        $this->announcementService->updateAnnouncement($announcement, $data, $categoryNames);

        $request->session()->flash('success', 'Votre annonce a été mise à jour avec succès.');

        return redirect()->route('home');
    }

    public function userAnnouncements($id) {

        $user = User::findOrFail($id);

        $announcements = Announcement::where('user_id', $user->id)->get();

        return view('announcements.user', ['announcements' => $announcements]);
    }

    public function announcementsFilter(Request $request)
    {
        try {

            $categories = $request->input('categories');
            $minBudget  = $request->input('minBudget');
            $maxBudget  = $request->input('maxBudget');
            $adsOrder   = $request->input('adsOrder');

            $page  = $request->input('page', 1);
            $query = Announcement::with(['categories', 'user']);

            if (!empty($categories)) {
                $query->whereHas('categories', function ($query) use ($categories) {
                    $query->whereIn('name', $categories);
                });
            }

            if ($minBudget !== null && $maxBudget !== null) {
                $query->whereBetween('budget', [$minBudget, $maxBudget]);
            }

            if ($adsOrder !== null) {
                $query->orderBy('created_at', $adsOrder);
            }

            $announcements = $query->paginate(5, ['*'], 'page', $page);

            return response()->json($announcements);

        } catch (\Exception $e) {

            Log::error($e->getMessage());
            return response()->json(['error' => 'Erreur interne du serveur'], 500);
        }

    }

}
