<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Telegram;
use Telegram\Bot\Exceptions\TelegramSDKException;

class WebhookController extends Controller
{
    public function __invoke()
    {
        //pass true in case of webhook
        $update = Telegram::bot()->commandsHandler(true);

        Telegram::bot()->sendMessage([
            'chat_id' => '129956964',
            'text' => 'Sizga qanday yordam bera olaman?',
            'parse_mode' => 'HTML'
        ]);


        if (!isset($update)) {
            return false;
        }

        $message = $update->message;
        $chat = $message->chat;

        try {
            Telegram::bot()->sendMessage([
                'chat_id' => $chat->id,
                'text' => 'Sizga qanday yordam bera olaman?',
                'parse_mode' => 'HTML'
            ]);
        } catch (TelegramSDKException $e) {
            Log::error('Cannot send telegram starting message', [
                '\n exception' => 'Message: ' . $e->getMessage() . ' in ' . $e->getFile() . ' on ' . $e->getLine()
            ]);
            $isOk = false;
        }

        return json_encode(['ok' => $isOk ?? true]);
    }
}