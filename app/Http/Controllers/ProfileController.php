<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use App\Services\ProfileService;

class ProfileController extends Controller
{
    public $profileService;

    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }

    public function show(User $user)
    {
        return view('profile.show', ['user' => $user]);
    }

    public function edit(User $user)
    {
        return view('profile.edit', ['user' => $user]);
    }

    public function deleteImage(User $user)
    {
        $this->profileService->deleteUserImage($user);
        return redirect()->route('profile.show', $user)->with('success', 'Profile image deleted.');
    }


    public function delete(User $user)
    {
        return view('profile.delete', compact('user'));
    }

    public function update(UpdateProfileRequest $request, User $user)
    {
        $this->profileService->updateUserProfile($request, $user);
        return redirect()->route('profile.show', $user)->with('success', 'Profile updated successfully!');
    }

    public function destroy(DeleteProfileRequest $request, User $user)
    {
        $this->profileService->deleteUser($request, $user);
        return redirect()->route('home')->with('success', 'Account deleted successfully!');
    }
}
