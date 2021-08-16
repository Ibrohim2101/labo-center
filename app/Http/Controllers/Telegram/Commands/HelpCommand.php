<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Commands\Command;

/**
 * Class HelpCommand.
 */
class HelpCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = 'help';

    /**
     * @var array Command Aliases
     */
    protected $aliases = ['listcommands'];

    /**
     * @var string Command Description
     */
    protected $description = 'Help command, Get a list of commands';

    /**
     * {@inheritdoc}
     */
    public function handle()
    {
        $response = $this->getUpdate();

        $text = 'Hey stranger, thanks for visiting me.' . chr(10) . chr(10);
        $text .= 'I am a bot and working for' . chr(10);
        $text .= env('APP_URL') . chr(10) . chr(10);
        $text .= 'Please come and visit me there.' . chr(10);

        $this->replyWithMessage(compact('text'));
    }

    /**
     * {@inheritdoc}
     */
//    public function handle()
//    {
//        $commands = $this->telegram->getCommands();
//
//        $text = '';
//        foreach ($commands as $name => $handler) {
//            /* @var Command $handler */
//            $text .= sprintf('/%s - %s' . PHP_EOL, $name, $handler->getDescription());
//        }
//
//        $this->replyWithMessage(compact('text'));
//    }
}
