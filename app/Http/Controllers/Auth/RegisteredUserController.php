<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Services\AuthService;


class RegisteredUserController extends Controller
{

    public $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(StoreUserRequest $request)
    {
        $this->authService->register($request);
        return redirect(route('home'));
    }

    public function create()
    {
        return view('auth.register');
    }
}
