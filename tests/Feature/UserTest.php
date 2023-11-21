<?php

namespace Tests\Feature;

use App\Models\User;

it('should update user profile with validation', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $updateData = [
        'name'     => 'New Name',
        'email'    => 'new.email@example.com',
    ];

    $response = $this->put(route('users.update', ['user' => $user->id]), $updateData);

    $response->assertStatus(200);

    $this->assertDatabaseHas('users', [
        'id'    => $user->id,
        'name'  => $updateData['name'],
        'email' => $updateData['email'],
    ]);
});

it('should not update user profile if new name is already taken', function () {
    $existingUser = User::factory()->create();
    $user         = User::factory()->create();
    $this->actingAs($user);

    $updateData = [
        'name' => $existingUser->name,
    ];

    $response = $this->put(route('users.update', ['user' => $user->id]), $updateData);

    $this->assertDatabaseMissing('users', [
        'id'   => $user->id,
        'name' => $existingUser->name,
    ]);

    $response->assertStatus(302);
});
