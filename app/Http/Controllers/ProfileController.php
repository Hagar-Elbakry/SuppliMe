<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function update() {}
    public function destroy(User $user) {}
}
