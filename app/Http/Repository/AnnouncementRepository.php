<?php

namespace App\Http\Repository;

use App\Models\Announcement;
use Illuminate\Support\Facades\Auth;

class AnnouncementRepository
{
    public function create($user, array $data)
    {
        return $user->announcements()->create([
            'title'       => $data['title'],
            'description' => strip_tags($data['description']),
            'budget'      => $data['budget'],
            'image'       => $data['image'],
        ]);
    }

    public function update($id, array $data)
    {
        $announcement = Announcement::find($id);

        if ($announcement) {
            $announcement->update([
                'title'       => $data['title'],
                'description' => strip_tags($data['description']),
                'budget'      => $data['budget'],
                'image'       => $data['image'],
            ]);

            return $announcement;
        }

        return null;
    }
}
