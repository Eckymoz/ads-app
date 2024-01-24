<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

it('should create an ad with validation', function () {
        Storage::fake('public');
        $user = User::factory()->create();
        $this->actingAs($user);

        $data = [
            'title'       => 'Example Title',
            'description' => 'Example Description',
            'budget'      => 100,
            'image'       => UploadedFile::fake()->image('example.jpg'),
            'categories'  => ['Category1', 'Category2'],
        ];

        $response = $this->post(route('ads.store'), $data);

        $response->assertStatus(302);

        $this->assertDatabaseHas('ads', [
            'user_id'     => $user->id,
            'title'       => 'Example Title',
            'description' => 'Example Description',
            'budget'      => 100,
        ]);
});

it('should fail if title is not a string', function () {
    Storage::fake('public');
    $user = User::factory()->create();
    $this->actingAs($user);

    $data = [
        'title' => 123,
        'description' => 'Example Description',
        'budget' => 100,
        'image' => UploadedFile::fake()->image('example.jpg'),
        'categories' => ['Category1', 'Category2'],
    ];

    $response = $this->post(route('ads.store'), $data);

    $response->assertSessionHasErrors('title');
});

it('should fail if title is missing', function () {
    Storage::fake('public');
    $user = User::factory()->create();
    $this->actingAs($user);

    $data = [
        // 'title' => 'Example Title',
        'description' => 'Example Description',
        'budget' => 100,
        'image' => UploadedFile::fake()->image('example.jpg'),
        'categories' => ['Category1', 'Category2'],
    ];

    $response = $this->post(route('ads.store'), $data);

    $response->assertSessionHasErrors('title');
});

it('should fail if title exceeds 255 characters', function () {
    Storage::fake('public');
    $user = User::factory()->create();
    $this->actingAs($user);

    $data = [
        'title' => str_repeat('A', 256),
        'description' => 'Example Description',
        'budget' => 100,
        'image' => UploadedFile::fake()->image('example.jpg'),
        'categories' => ['Category1', 'Category2'],
    ];

    $response = $this->post(route('ads.store'), $data);

    $response->assertSessionHasErrors('title');
});

it('should fail if image is not an image', function () {
    Storage::fake('public');
    $user = User::factory()->create();
    $this->actingAs($user);

    $data = [
        'title' => 'Example Title',
        'description' => 'Example Description',
        'budget' => 100,
        'image' => UploadedFile::fake()->create('example.txt'), // Un fichier texte au lieu d'une image
        'categories' => ['Category1', 'Category2'],
    ];

    $response = $this->post(route('ads.store'), $data);

    $response->assertSessionHasErrors('image');
});

it('should fail if image exceeds 2048 KB', function () {
    Storage::fake('public');
    $user = User::factory()->create();
    $this->actingAs($user);

    $largeImage = 'public/images/image-test.jpg';

    $data = [
        'title' => 'Example Title',
        'description' => 'Example Description',
        'budget' => 100,
        'image' => $largeImage,
        'categories' => ['Category1', 'Category2'],
    ];

    $response = $this->post(route('ads.store'), $data);

    $response->assertSessionHasErrors('image');
});






