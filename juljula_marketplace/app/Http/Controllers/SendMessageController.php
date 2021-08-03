<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class SendMessageController extends Controller
{
    public function store(Request $request)
    {
        Message::create([
            'user_id'=>$request->userId,
            'receiver_id'=>$request->receiverId,
            'ad_id'=>$request->adId,
            'body'=>$request->body
        ]);
    }

    public function index()
    {
        return view('message.index');
    }

    public function chatWithThisUser()
    {
        $conversations=Message::where('user_id', auth()->id())
            ->orWhere('receiver_id', auth()->id())->get();
        $users=$conversations->map(function ($conversations){
            if ($conversations->user_id===auth()->id()){
                return $conversations->receiver;
            }
            return $conversations->sender;
        })->unique();
        return $users;
    }

    public function showMessages(Request $request, $id)
    {
        $messages=Message::where('receiver_id', auth()->user()->id)
            ->where('user_id', $id)
            ->orWhere('user_id', auth()->user()->id)
            ->where('receiver_id', $id)->get();
        return $messages;
    }
}
