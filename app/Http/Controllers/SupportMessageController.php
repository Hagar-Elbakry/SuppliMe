<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSupportMessageRequest;
use App\Services\SupportMessageService;
use Illuminate\Support\Facades\Auth;

class SupportMessageController extends Controller
{
    public $supportMessageService;

    public function __construct(SupportMessageService $supportMessageService)
    {
        $this->supportMessageService = $supportMessageService;
    }

    public function index()
    {
        $user = Auth::user();
        return view('contact.contact', compact('user'));
    }

    public function store(StoreSupportMessageRequest $request)
    {
        $this->supportMessageService->storeMessage($request);
        return redirect()->back()->with('success', 'Your message has been sent successfully');
    }
}
