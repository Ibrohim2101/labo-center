<?php

namespace App\Http\Controllers\Telegram\Commands;

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
    protected $aliases = ['start'];

    /**
     * @var string Command Description
     */
    protected $description = 'Start command, Activates the bot';

    /**
     * {@inheritdoc}
     */
    public function handle()
    {
        $commands = $this->telegram->getCommands();

        $text = '';
        foreach ($commands as $name => $handler) {
            /* @var Command $handler */
            $text .= sprintf('/%s - %s' . PHP_EOL, $name, $handler->getDescription());
        }

        $this->replyWithMessage(compact('text'));
    }
}
