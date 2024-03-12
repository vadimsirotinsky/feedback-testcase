<?php

namespace App\Infrastructure\LocalStorage;

use App\Application\Interfaces\IFeedbackProcessor;
use Illuminate\Support\Facades\Storage;

class FileFeedbackProcessor implements IFeedbackProcessor
{
    public function process(string $message, string $phone, string $name) : void
    {
        Storage::disk()->append('feedbacks.txt', "$name $phone\n$message\n\n");
    }
}
