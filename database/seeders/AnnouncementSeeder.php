<?php

namespace Database\Seeders;

use App\Models\Announcement;
use App\Models\Category;
use Illuminate\Database\Seeder;

class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $announcements = Announcement::all();

        $announcements->each(function ($announcement) {
            $categories = Category::inRandomOrder()->limit(3)->get();
            $announcement->categories()->attach($categories);

        });
    }
}
