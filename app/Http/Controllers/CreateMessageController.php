<?php

namespace App\Http\Controllers;

use App\Events\MessagePostedEvent;
use App\Models\Message;
use Illuminate\Http\Request;

class CreateMessageController extends Controller
{
    public function __invoke(Request $request)
    {
        $message = Message::query()->create([
            'text' => $request->input('message')
        ]);

        MessagePostedEvent::dispatch($message);
    }
}
