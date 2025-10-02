<?php

namespace App\Repositories;

use App\Models\User;

class AuthRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function register($request)
    {
        return User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => $request['password'],
        ]);
    }
}
