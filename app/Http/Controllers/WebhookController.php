<?php

namespace App\Http\Controllers;

use Telegram\Bot\Api;

class WebhookController extends Controller
{
    public function __invoke()
    {
        $telegram = new Api(env('TELEGRAM_BOT_TOKEN', 'provide-bot-token'));

        $update = $telegram->commandsHandler(true);

//        $telegram->sendMessage([
//            'chat_id' => '129956964',
//            'text' => 'received your message thanks',
//            'parse_mode' => 'HTML'
//        ]);
    }
}