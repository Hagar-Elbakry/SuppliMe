<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Storage;

class ProfileRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function deleteUserImage($user)
    {
        Storage::delete($user->getRawOriginal('image'));
        $user->update(['image' => null]);
    }

    public function updateUserProfile($user, $attributes)
    {
        $user->update($attributes);
    }

    public function deleteUser($user)
    {
        $user->delete();
    }
}
