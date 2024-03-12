<?php

namespace App\Application\Handlers\Commands;

use App\Application\Interfaces\IFeedbackProcessorFactory;
use App\Application\Interfaces\IFeedbackService;
use App\Application\Enums\FeedbackChannelType;
use App\Http\Requests\FeedbackRequest;

class ProcessFeedbackCommandHandler {
    function __invoke(FeedbackRequest $data, IFeedbackService $service, IFeedbackProcessorFactory $processorFactory) {
        $service->create($data->json('message'), $data->json('phone'), $data->json('name'));
        $processor = $processorFactory->create(FeedbackChannelType::tryFrom($data->json('channel')));
        $processor->process($data->json('message'), $data->json('phone'), $data->json('name'));
    }
}
