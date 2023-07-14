<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TelegramService;
use App\Http\Controllers\Group;
use App\Http\Controllers\PrivateChat;


class TelegramController extends Controller
{
    public function handle(Request $request)
    {
        $input = $request->all();
        if (isset($input['message']))
            $chat_type = $input['message']['chat']['type'] ?? null;
        elseif (isset($input['callback_query']))
            $chat_type = $input['callback_query']['message']['chat']['type'] ?? null;

        $bot = new TelegramService;
        if ($chat_type == 'group' or $chat_type == 'supergroup') {
            $run = new Group($input, $bot);
            return $run->handle();
        } elseif ($chat_type == 'private') {
            $run = new PrivateChat($input);
            return $run->handle($bot);
        }
    }
}
