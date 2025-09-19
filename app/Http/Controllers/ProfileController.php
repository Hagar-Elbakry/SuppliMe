<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\DeleteProfileRequest;
use App\Http\Requests\UpdateProfileRequest;

class ProfileController extends Controller
{
    public function show(User $user) {
        return view('profile.show' ,['user'=> $user]);
    }

    public function edit(User $user) {
        return view('profile.edit',['user'=> $user]);
    }

    public function update(UpdateProfileRequest $request,User $user) {
        $attributes = $request->validated();

        $attributes['password'] = Hash::make($attributes['password']);

        if ($request->hasFile('image')) {
            $this->deleteUserImage($user);
            $attributes['image'] = $request->file('image')->store('avatars');
        }
        $user->update($attributes);
        return redirect()->route('profile.show', $user)->with('success', 'Profile updated successfully!');
    }

    public function deleteImage(User $user) {
        $this->deleteUserImage($user);
        $user->update(['image' => null]);
        return redirect()->route('profile.show', $user)->with('success', 'Profile image deleted.');;
    }

    public function delete (User $user) {
        return view('profile.delete', compact('user'));
    }
    public function destroy(DeleteProfileRequest $request, User $user) {
        $request->validated();
        $this->deleteUserImage($user);
        $user->delete();
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home')->with('success', 'Account deleted successfully!');
    }


    private function deleteUserImage(User $user): void
    {
        if ($user->getRawOriginal('image')) {
            Storage::delete($user->getRawOriginal('image'));
        }
    }
}
