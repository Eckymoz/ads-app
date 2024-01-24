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

    $this->put(route('users.update', ['user' => $user->id]), $updateData);

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

    $this->put(route('users.update', ['user' => $user->id]), $updateData);

    $this->assertDatabaseMissing('users', [
        'id'   => $user->id,
        'name' => $existingUser->name,
    ]);

});
