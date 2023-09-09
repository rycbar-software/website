<?php

namespace App\Domain\Feedback;

class FeedbackCreateDTO
{
    public function __construct(
        readonly public string $name,
        readonly public string $email,
        readonly public string $message,
    )
    {

    }
}
