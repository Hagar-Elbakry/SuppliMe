<?php

namespace App\Http\Controllers;

use App\Models\SupportMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupportMessageController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view('contact.contact',compact('user'));
    }
    public function store(Request $request){
        $request->validate([
            'name' => ['required','string'],
            'email' => ['required','email', 'exists:users,email'],
            'phone' => ['required'],
            'message' => ['required','string']
        ]);
        SupportMessage::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'user_id' => Auth::id(),
            'message' => $request->message
        ]);
        return redirect()->back()->with('success','Your message has been sent successfully');
    }
}
