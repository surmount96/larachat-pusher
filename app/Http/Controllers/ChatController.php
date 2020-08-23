<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function store(Request $request)
    {
//        store and broadcast the message
        $input = $request->all();
        $input['sender_id'] = Auth::user()->id;
        $message = Message::create($input);
        event(new MessageSent($message));
        return [
            'status' => 200,
            'message' =>'successfully created'
        ];
    }

    public function chat()
    {
        //get messages associated with both the sender and the receiver
        $message = Message::whereIn('sender_id',[Auth::user()->id,\request('receiver_id')])
            ->whereIn('receiver_id',[Auth::user()->id,\request('receiver_id')])->with('receiver')->with('sender')->get();
        return $message;
    }

    public function userName()
    {
//        Get the receiver name
        return User::where('id',\request('receiver_id'))->first();
    }

}
