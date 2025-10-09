<?php

namespace App\Services;

use App\Repositories\ProfileRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileService
{
    public $profileRepository;

    /**
     * Create a new class instance.
     */
    public function __construct(ProfileRepository $profileRepository)
    {
        $this->profileRepository = $profileRepository;
    }

    public function updateUserProfile($request, $user)
    {
        $attributes = $request->validated();
        $attributes['password'] = Hash::make($attributes['password']);

        if ($request->hasFile('image')) {
            $this->deleteUserImage($user);
            $attributes['image'] = $request->file('image')->store('avatars');
        }
        $this->profileRepository->updateUserProfile($user, $attributes);
    }

    public function deleteUserImage($user): void
    {
        if ($user->getRawOriginal('image')) {
            $this->profileRepository->deleteUserImage($user);
        }
    }

    public function deleteUser($request, $user)
    {
        $this->deleteUserImage($user);
        $this->profileRepository->deleteUser($user);
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }
}
