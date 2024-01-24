<?php

namespace App\Http\Repository;

use App\Models\Ads;
use Illuminate\Support\Facades\Auth;

class AdRepository
{
    public function create($user, array $data)
    {
        return $user->ads()->create([
            'title'       => $data['title'],
            'description' => strip_tags($data['description']),
            'budget'      => $data['budget'],
            'image'       => $data['image'],
        ]);
    }

    public function update($id, array $data)
    {
        $ad = Ads::find($id);

        if ($ad) {
            $ad->update([
                'title'       => $data['title'],
                'description' => strip_tags($data['description']),
                'budget'      => $data['budget'],
                'image'       => $data['image'],
            ]);

            return $ad;
        }

        return null;
    }
}
