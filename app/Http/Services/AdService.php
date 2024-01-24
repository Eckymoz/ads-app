<?php

namespace App\Http\Services;

use App\Http\Repository\AdRepository;

class AdService
{
    private $adRepository;

    public function __construct(AdRepository $adRepository)
    {
        $this->adRepository = $adRepository;
    }

    public function createAnnouncement($user, array $data, array|null $categoryNames)
    {
        $data         = $this->handleImageUploadIfNull($data);
        $ad           = $this->adRepository->create($user, $data);

        $this->attachCategoriesIfNotEmpty($ad, $categoryNames);

        return $ad;
    }

    public function updateAnnouncement($id, array $data, array|null $categoryNames)
    {
        $data         = $this->handleImageUploadIfNull($data);
        $ad           = $this->adRepository->update($id, $data);
        $this->attachCategoriesIfNotEmpty($ad, $categoryNames);

        return $ad;
    }

    private function handleImageUploadIfNull(array $data): array
    {
        if (!empty($data['image'])) {
            if ($data['image']) {
                $imagePath = $data['image']->store('public/images');
                $data['image'] = 'images/' . basename($imagePath);
            }
        } else {
            $data['image'] = 'images/default-image.jpg';
        }

        return $data;
    }


    private function attachCategoriesIfNotEmpty($ad, $categoryNames)
    {
        if (!empty($categoryNames)) {
            $ad->attachCategories($categoryNames);
        }
    }
}
