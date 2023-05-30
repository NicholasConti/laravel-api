<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewMessage;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'author' => 'required|string|max:100',
            'email' => 'required|email',
            'message' => 'required|string',
            'project_id' => 'integer|exists:projects,id'
        ]);

        $message = new Message();
        $message->author = $data['author'];
        $message->email = $data['email'];
        $message->message = $data['message'];
        $message->project_id = $data['project_id'];
        $message->save();

        Mail::to('prova@boolpress.it')->send(new NewMessage($message));
        return $message;
    }
}
