<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SupportMessage;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreSupportMessageRequest;

class SupportMessageController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view('contact.contact',compact('user'));
    }
    public function store(StoreSupportMessageRequest $request){
        $data = $request->validated();
        $data['user_id'] = Auth::id();
        SupportMessage::create($data);
        return redirect()->back()->with('success','Your message has been sent successfully');
    }
}
