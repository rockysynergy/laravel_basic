<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessageController extends Controller
{
    public function submit(Request $request) {
      $this->validate($request, [
        'name' => 'required',
        'email' => 'required'
      ]);

      // Create New MessageFormatter
      $message = new Message;
      $message->name = $request->input('name');
      $message->email = $request->input('email');
      $message->message = $request->input('message');

      // Save messages
      $message->save();

      //$request->session()->flash('success', 'Message sent!');
      return redirect('/')->with('success', 'Thank you! Message sent!');
    }

    public function getMessages() {
      $messages = Message::all();

      return view('messages')->with('messages', $messages);
    }
}
