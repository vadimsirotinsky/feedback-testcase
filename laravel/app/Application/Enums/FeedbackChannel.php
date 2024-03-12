<?php

namespace App\Application\Enums;

enum FeedbackChannel: string
{
    case Telegram = 'tg';
    case Email = 'email';
    case File = 'file';
}
