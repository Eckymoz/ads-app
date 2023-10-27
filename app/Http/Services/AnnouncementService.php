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

    public function createAnnouncement($user, array $data)
    {
        return $this->announcementRepository->create($user, $data);
    }

    public function updateAnnouncement($id, array $data)
    {
        return $this->announcementRepository->update($id, $data);
    }

}
