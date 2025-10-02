<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Services\AuthService;


class AuthenticatedSessionController extends Controller
{

    public $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function create()
    {
        return view('auth.login');
    }

    public function login(LoginUserRequest $request)
    {
        $this->authService->login($request);
        return redirect()->intended();
    }

    public function logout()
    {
        $this->authService->logout();
        return redirect(route('login'));
    }
}
