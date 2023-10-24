<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnnouncementRequest;
use App\Http\Services\AnnouncementService;

class AnnouncementsController extends Controller
{
    private $announcementService;

    public function __construct(AnnouncementService $announcementService)
    {
        $this->announcementService = $announcementService;
    }

    public function create()
    {
        return view('announcements.create');
    }

    public function store(AnnouncementRequest $request)
    {
        $data = $request->validated();
        $user = auth()->user();
        $user->announcements()->create($data);

        $request->session()->flash('success', 'Votre annonce a été créée avec succès.');

        return redirect()->route('home');
    }

    public function update(AnnouncementRequest $request, $id)
    {
        $data = $request->validated();
        $announcement = $this->announcementService->updateAnnouncement($id, $data);

        if ($announcement) {
            return response()->json($announcement);
        } else {
            return response()->json(['message' => 'Announcement not found'], 404);
        }
    }
}
