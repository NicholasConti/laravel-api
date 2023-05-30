<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function destroy(Message $message)
    {
        $project = $message->project;
        $message->delete();
        return redirect()->route('admin.projects.show', $project);
    }
}
