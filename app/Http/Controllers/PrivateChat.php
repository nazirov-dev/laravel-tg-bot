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
        if (isset($this->private_chat['message'])) {
            $text = $this->private_chat['message']['text'];
            $chat = $this->private_chat['message']['chat'];
            $from = $this->private_chat['message']['from'];
        }
        $bot->sendMessage([
            'chat_id' => $chat['id'],
            'text' => $text
        ]);
        return true;
    }
}
