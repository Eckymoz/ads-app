<?php

namespace Database\Seeders;

use App\Models\Ads;
use App\Models\Category;
use Illuminate\Database\Seeder;

class AdsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ads = Ads::all();

        $ads->each(function ($ad) {
            $categories = Category::inRandomOrder()->limit(3)->get();

            $ad->categories()->sync($categories->pluck('id'));
        });
    }
}
