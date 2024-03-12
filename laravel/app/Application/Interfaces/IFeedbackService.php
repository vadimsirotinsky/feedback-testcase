<?php

namespace App\Application\Interfaces;

use App\Domain\Repositories\IFeedbackRepository;

interface IFeedbackService
{
    function create(string $message, string $phone, string $name);
}
