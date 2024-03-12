<?php

namespace App\Application\Interfaces;

use App\Application\Enums\FeedbackChannel;

interface IFeedbackProcessorFactory
{
    public function create(?FeedbackChannel $channel) : IFeedbackProcessor;
}
