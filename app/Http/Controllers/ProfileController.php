<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function show(User $user) {

        if (Auth::user()->id!== $user->id) {
            abort(403,'not authorized');
        }
        return view('profile.show' ,[
            'user'=>$user
        ]);
    }

    public function edit(User $user) {
        if (Auth::user()->id!== $user->id) {
            abort(403,'not authorized');
        }
        return view('profile.edit',[
            'user'=>$user
        ]);
    }

    public function update(User $user) {
        $attributes = request()->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique('users')->ignore($user)],
            'phone' => ['required', 'numeric'],
            'address' => ['required', 'string'],
            'image' => ['nullable', 'file', 'mimes:jpg,jpeg,png'],
            'password'=> ['required','confirmed']
        ]);

        Hash::make($attributes['password']);
        if(request('image')){
            $attributes['image'] = request('image')->store('avatars','public');
        }
        $user->update($attributes);
        return redirect(route('profile.show',$user));
    }

    public function delete (User $user) {
        if(Auth::user()->id != $user->id) {
            abort(403,'not authorized');
        }
        return view('profile.delete', compact('user'));
    }
    public function destroy(User $user) {
       $attributes =  request()->validate([
            'password' => ['required','confirmed', 'current_password']
        ]);

//       if(!Hash::check($attributes['password'], $user->password)) {
//           abort(403,'not authorized');
//       }

        $user->delete();
        Auth::logout();
        return redirect('/');
    }
}
