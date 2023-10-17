<?php

namespace Database\Seeders;

use App\Models\Ads;
use Illuminate\Database\Seeder;

class AdsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ads::factory(10)->create();
    }
}
