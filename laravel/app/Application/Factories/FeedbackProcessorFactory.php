<?php

namespace App\Application\Factories;

use App\Application\Interfaces\IFeedbackProcessor;
use App\Application\Interfaces\IFeedbackProcessorFactory;
use App\Application\Enums\FeedbackChannelType;
use App\Exceptions\IncorrectFeedbackChannel;
use App\Infrastructure\Email\EmailFeedbackProcessor;
use App\Infrastructure\LocalStorage\FileFeedbackProcessor;
use App\Infrastructure\Telegram\TelegramFeedbackProcessor;

class FeedbackProcessorFactory implements IFeedbackProcessorFactory
{
    public function create(?FeedbackChannelType $channel) : IFeedbackProcessor
    {
        switch ($channel) {
            case FeedbackChannelType::Telegram:
                return new TelegramFeedbackProcessor();
            case FeedbackChannelType::File:
                return new FileFeedbackProcessor();
            case FeedbackChannelType::Email:
                return new EmailFeedbackProcessor();
            default:
                throw new IncorrectFeedbackChannel('Unknown processor type');
        }
    }
}
