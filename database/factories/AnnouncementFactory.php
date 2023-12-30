<?php

namespace Database\Factories;

use App\Models\Announcement;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Announcement>
 */
class AnnouncementFactory extends Factory
{
    protected $model = Announcement::class;

    public function definition(): array
    {
        return [
            'user_id'       => 1,
            'title'         => $this->faker->sentence,
            'budget'        => $this->faker->numberBetween(1, 1000),
            'description'   => $this->faker->paragraph,
            'image'         => 'images/default-image.jpg',
        ];
    }
}
