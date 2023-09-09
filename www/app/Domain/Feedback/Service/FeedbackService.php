<?php

namespace App\Domain\Feedback\Service;

use App\Domain\Feedback\FeedbackCreateDTO;
use App\Models\Feedback;
use App\Notifications\FeedbackCreated;

class FeedbackService
{
    public function store(FeedbackCreateDTO $feedbackCreateDTO): Feedback
    {
        $feedback = new Feedback();

        $feedback->name = $feedbackCreateDTO->name;
        $feedback->email = $feedbackCreateDTO->email;
        $feedback->message = $feedbackCreateDTO->message;

        $feedback->save();

        if ($feedback->id) {
            $feedback->notify(new FeedbackCreated($feedback));
        }

        return $feedback;
    }
}
