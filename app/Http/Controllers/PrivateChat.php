<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrivateChat extends Controller
{
    public $private_chat = null;

    public function __construct($private_chat)
    {
        $this->private_chat = $private_chat;
    }
    public function handle($bot)
    {
        $bot->sendMessage([
            'chat_id' => $this->private_chat['message']['chat']['id'],
            'text' => 'ishlayapman'
        ]);
        return true;
    }
}
