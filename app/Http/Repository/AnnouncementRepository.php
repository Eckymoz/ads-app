<?php

namespace App\Http\Repository;

use App\Models\Announcement;

class AnnouncementRepository
{
    public function create(array $data)
    {
        return Announcement::create($data);
    }

    public function update($id, array $data)
    {
        $announcement = Announcement::find($id);

        if ($announcement) {
            $announcement->update($data);
            return $announcement;
        }

        return null;
    }
}
