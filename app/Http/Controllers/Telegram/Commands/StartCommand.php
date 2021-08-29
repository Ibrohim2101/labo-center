<?php

namespace App\Http\Controllers\Telegram\Commands;

use App\Models\User;
use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;


/**
 * Class HelpCommand.
 */
class StartCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = 'start';

    /**
     * @var array Command Aliases
     */
    protected $aliases = ['startbot'];

    /**
     * @var string Command Description
     */
    protected $description = 'Start command, Activates the bot';

    /**
     * {@inheritdoc}
     */
    public function handle()
    {
        $message = $this->update->message;
        $telegramUser = $message->from;

        $this->replyWithChatAction(['action' => Actions::TYPING]);
        $text = 'Labo Centerga xush kelibsiz <b>' . $telegramUser->firstName . '</b>!';
        $this->replyWithMessage(['text' => $text, 'parse_mode' => 'HTML']);

        $isAdmin = $telegramUser->id === env('BOT_ADMIN_ID');
        if (!$isAdmin) {
            return false;
        }

        $user = User::find(1);
        $isAdminRegistered = isset($user);
        if (!$isAdminRegistered) {
            $this->replyWithMessage(['text' => 'Iltimos, asosiy <a href="' . env('APP_URL', 'labo-center.uz') . '">saytda ro\'yhatdan o\'ting', 'parse_mode' => 'HTML']);
            return false;
        }

        // Update chat_id in DB if it is changed
        $chat = $message->chat;
        if ($user->chat_id !== $chat->id) {
            $user->update(['chat_id' => $chat->id]);
        }
    }
}
