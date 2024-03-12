<?php

namespace App\Application\Factories;

use App\Application\Interfaces\IFeedbackProcessor;
use App\Application\Interfaces\IFeedbackProcessorFactory;
use App\Application\Enums\FeedbackChannel;
use App\Exceptions\IncorrectFeedbackChannel;
use App\Infrastructure\Email\EmailFeedbackProcessor;
use App\Infrastructure\LocalStorage\FileFeedbackProcessor;
use App\Infrastructure\Telegram\TelegramFeedbackProcessor;

class FeedbackProcessorFactory implements IFeedbackProcessorFactory
{
    public function create(?FeedbackChannel $channel) : IFeedbackProcessor
    {
        switch ($channel) {
            case FeedbackChannel::Telegram:
                return new TelegramFeedbackProcessor();
            case FeedbackChannel::File:
                return new FileFeedbackProcessor();
            case FeedbackChannel::Email:
                return new EmailFeedbackProcessor();
            default:
                throw new IncorrectFeedbackChannel('Unknown processor type');
        }
    }
}
