<?php

namespace App\Application\Interfaces;

use App\Application\Enums\FeedbackChannelType;

interface IFeedbackProcessorFactory
{
    public function create(?FeedbackChannelType $channel) : IFeedbackProcessor;
}
