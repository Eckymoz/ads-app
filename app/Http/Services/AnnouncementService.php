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

    public function createAnnouncement($user, array $data, array|null $categoryNames)
    {
        $data         = $this->handleImageUploadIfNull($data, 'image', 'images/default-image.jpg');
        $announcement = $this->announcementRepository->create($user, $data);

        $this->attachCategoriesIfNotEmpty($announcement, $categoryNames);

        return $announcement;
    }

    public function updateAnnouncement($id, array $data, array|null $categoryNames)
    {
        $data         = $this->handleImageUploadIfNull($data, 'image', 'images/default-image.jpg');
        $announcement = $this->announcementRepository->update($id, $data);
        $this->attachCategoriesIfNotEmpty($announcement, $categoryNames);

        return $announcement;
    }

    private function handleImageUploadIfNull(array $data, $key, $defaultValue)
    {
        if (!empty($data[$key])) {
            if ($data['image']) {
                $imagePath = $data['image']->store('images/');
                $data[$key] = $imagePath;
            }
        } else {
            $data[$key] = $defaultValue;
        }

        return $data;
    }


    private function attachCategoriesIfNotEmpty($announcement, $categoryNames)
    {
        if (!empty($categoryNames)) {
            $announcement->attachCategories($categoryNames);
        }
    }
}
