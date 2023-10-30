<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnnouncementRequest;
use App\Http\Services\AnnouncementService;
use App\Models\Announcement;
use App\Models\Category;

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

        $categories = Category::all();

        $announcementCategories = $announcement->categories;

        return view('announcements.edit', compact('announcement','categories', 'announcementCategories'));
    }
    public function update(AnnouncementRequest $request, $announcement)
    {
        $data = $request->validated();
        $categoryNames = $request->categories;
        $this->announcementService->updateAnnouncement($announcement, $data, $categoryNames);

        $request->session()->flash('success', 'Votre annonce a été mise à jour avec succès.');

        return redirect()->route('home');
    }
}
