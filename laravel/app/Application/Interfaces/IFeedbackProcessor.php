<?php

namespace App\Application\Interfaces;

interface IFeedbackProcessor
{
    public function process(string $message, string $phone, string $name);
}
