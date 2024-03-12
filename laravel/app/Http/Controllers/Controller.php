<?php

namespace App\Http\Controllers;

use App\Application\Handlers\Commands\ProcessFeedbackCommandHandler;
use App\Application\Interfaces\IFeedbackProcessorFactory;
use App\Application\Interfaces\IFeedbackService;
use App\Exceptions\IncorrectFeedbackChannel;
use App\Http\Requests\FeedbackRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    private IFeedbackService $service;
    private IFeedbackProcessorFactory $processorFactory;

    public function __construct(IFeedbackService $service, IFeedbackProcessorFactory $processorFactory)
    {
        $this->service = $service;
        $this->processorFactory = $processorFactory;
    }

    function processFeedback(FeedbackRequest $request) {
        try {
            $cmd = new ProcessFeedbackCommandHandler();
            $cmd($request, $this->service, $this->processorFactory);
        } catch (IncorrectFeedbackChannel $e) {
            return response()->json($e->getMessage(), 403);
        }
    }
}
