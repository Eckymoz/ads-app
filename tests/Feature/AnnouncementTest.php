<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AnnouncementTest extends TestCase
{
    use RefreshDatabase;
    public function test_announcement_creation_with_validation()
    {
        Storage::fake('public');
        $user = User::factory()->create();
        $this->actingAs($user);

        $data = [
            'title' => 'Example Title',
            'description' => 'Example Description',
            'budget' => 100,
            'image' => UploadedFile::fake()->image('example.jpg'),
        ];

        $response = $this->post(route('announcements.store'), $data);

        $response->assertStatus(302);

        $this->assertDatabaseHas('announcements', [
            'user_id' => $user->id,
            'title' => 'Example Title',
            'description' => 'Example Description',
            'budget' => 100,
        ]);
    }
}
