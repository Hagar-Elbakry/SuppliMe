<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthenticatedSessionController extends Controller
{
    public function create() {
        return view('auth.login');
    }
    public function store(Request $request) {}

    public function destroy() {}
}
