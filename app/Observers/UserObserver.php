<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserObserver
{
    public function saved(User $user): void
    {
            if($user->isDirty('image') && !is_null($user->getOriginal('image'))) {
                Storage::disk('public')->delete($user->getOriginal('image'));
            }
    }

    public function deleted(User $user): void
    {
        if(!is_null($user->getOriginal('image'))) {
            Storage::disk('public')->delete($user->image);
        }
    }
}
