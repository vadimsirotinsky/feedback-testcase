<?php

namespace App\Domain\Services;

use App\Application\Interfaces\IFeedbackService;

class FeedbackService implements IFeedbackService {

    function create(string $message, string $phone, string $name)
    {
        /*eloquent
        $feedback = new Feedback();
        $feedback->message = $message;
        $feedback->phone = $phone;
        $feedback->name = $name;
        $feedback->save();*/
    }
}
