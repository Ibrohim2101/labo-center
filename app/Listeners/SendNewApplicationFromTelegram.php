<?php

namespace App\Listeners;

use App\Events\NewApplicationCreated;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Telegram\Bot\Api;
use Telegram\Bot\Exceptions\TelegramSDKException;

class SendNewApplicationFromTelegram
{
    private $chat_id;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        $this->chat_id = User::find(1)->chat_id;
    }

    /**
     * Sends newly created application from telegram
     *
     * @return void
     */
    public function handle(NewApplicationCreated $event)
    {
        $message = "<b>Ism, familya: </b>" . htmlspecialchars($event->application->name) .
            "\n<b>Telefon raqam: </b>" . htmlspecialchars($event->application->phone);
        if (isset($event->application->message))
            $message .= "\n<b>Xabar: </b>" . htmlspecialchars($event->application->message);

        try {
            $telegram = new Api(env('TELEGRAM_BOT_TOKEN', 'provide-bot-token'));

            $telegram->sendMessage([
                'chat_id' => $this->chat_id,
                'text' => $message,
                'parse_mode' => 'HTML'
            ]);
        } catch (TelegramSDKException $e) {
            Log::alert('Cannot send telegram notification', [
                ' telegram' => ['chat_id' => $this->chat_id, 'message' => $message],
                '\n application' => $event->application,
                '\n exception' => 'Message: ' . $e->getMessage() . ' in ' . $e->getFile() . ' on ' . $e->getLine()
            ]);
        }
    }
}
