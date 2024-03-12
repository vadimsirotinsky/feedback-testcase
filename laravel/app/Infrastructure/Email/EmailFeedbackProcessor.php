<?php

namespace App\Infrastructure\Email;

use App\Application\Interfaces\IFeedbackProcessor;

class EmailFeedbackProcessor implements IFeedbackProcessor
{
    public function process(string $message, string $phone, string $name) : void
    {
        //send to telegram
    }
}
