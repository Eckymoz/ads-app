<?php

namespace App\Http\Services;

use App\Http\Repository\AnnouncementRepository;

class AnnouncementService
{
    private $announcementRepository;

    public function __construct(AnnouncementRepository $announcementRepository)
    {
        $this->announcementRepository = $announcementRepository;
    }

    public function createAnnouncement($user, array $data, array $categoryNames)
    {
        $announcement = $this->announcementRepository->create($user, $data);
        $announcement->attachCategories($categoryNames);

        return $announcement;
    }

    public function updateAnnouncement($id, array $data, array $categoryNames)
    {
        $announcement = $this->announcementRepository->update($id, $data);
        $announcement->attachCategories($categoryNames);

        return $announcement;
    }

}
