<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Services\AdService;
use App\Http\Services\UserService;
use App\Mail\WelcomeMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function edit(User $user) {

        $user = Auth::user();

        return view('users.edit', compact('user'));
    }

    public function update(UserRequest $request) {
        $user = auth()->user();
        $data = $request->validated();

        $this->userService->updateProfile($user, $data);

        $request->session()->flash('success', 'Votre profil a été mise à jour avec succès.');

        return redirect()->route('users.edit', $user);

    }
}
