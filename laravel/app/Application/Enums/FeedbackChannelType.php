<?php

namespace App\Application\Enums;

enum FeedbackChannelType: string
{
    case Telegram = 'tg';
    case Email = 'email';
    case File = 'file';
}
