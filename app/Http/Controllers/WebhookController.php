<?php

namespace App\Http\Controllers;

use Telegram;
use Telegram\Bot\Exceptions\TelegramSDKException;

class WebhookController extends Controller
{
    public function __invoke()
    {
        try {
            Telegram::commandsHandler(true);
        } catch (TelegramSDKException $e) {
            return $e->getMessage() . ' in ' . $e->getFile() . ' on ' . $e->getLine();
        }

        Telegram::sendMessage([
            'chat_id' => '129956964',
            'text' => 'received your message thanks',
            'parse_mode' => 'HTML'
        ]);

        return 'OK';
    }
}