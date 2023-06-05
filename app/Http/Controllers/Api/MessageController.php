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

        $msg = new Message();
        $msg->author = $data['author'];
        $msg->email = $data['email'];
        $msg->message = $data['message'];
        $msg->project_id = $data['project_id'];
        $msg->save();

        Mail::to('info@boolpress.it')->send(new NewMessage($msg));
        return $msg;
    }
}
