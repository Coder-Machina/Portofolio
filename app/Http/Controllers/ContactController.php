<?php

namespace App\Http\Controllers;
use App\Models\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show(){
        return view('contact');
    }

    public function send(Request $request){
         $request->validate([
        'name'    => 'required|min:2|max:100',
        'email'   => 'required|email',
        'subject' => 'required|min:3|max:150',
        'body'    => 'required|min:10',
    ]);

    Message::create($request->only(['name', 'email', 'subject', 'body']));

    return redirect()->route('contact')->with('success', 'Message envoyé avec succès !');
    }
}
