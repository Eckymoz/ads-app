<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnnouncementRequest;
use App\Http\Services\AnnouncementService;
use Illuminate\Http\Request;

class AnnouncementsController extends Controller
{
    private $announcementService;

    public function __construct(AnnouncementService $announcementService)
    {
        $this->announcementService = $announcementService;
    }

    public function store(AnnouncementRequest $request)
    {
        $data = $request->validated();
        $announcement = $this->announcementService->createAnnouncement($data);
        return response()->json($announcement, 201);
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
