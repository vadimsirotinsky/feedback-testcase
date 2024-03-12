<?php

namespace App\Infrastructure\Telegram;

use App\Application\Interfaces\IFeedbackProcessor;

class TelegramFeedbackProcessor implements IFeedbackProcessor
{
    public function process(string $message, string $phone, string $name) : void
    {
        //send to telegram
    }
}
