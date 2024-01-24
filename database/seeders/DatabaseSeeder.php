<?php

namespace Database\Seeders;

use App\Models\Ads;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(4)->create();
        Category::factory(3)->create();
        Ads::factory(500)->create();

        $this->call([
            AdsSeeder::class,
        ]);
    }
}
