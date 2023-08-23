<?php

namespace App\Notifications;

use App\Models\Feedback;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramMessage;

class FeedbackCreated extends Notification implements ShouldQueue
{
    use Queueable;

    private Feedback $feedback;

    /**
     * Create a new notification instance.
     */
    public function __construct(Feedback $feedback)
    {
        $this->feedback = $feedback;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'telegram'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->greeting('RYCBAR notice')
            ->line('Feedback was requested')
            ->line($this->feedback->name ?: '')
            ->line($this->feedback->email ?: '')
            ->line($this->feedback->message);
    }

    public function toTelegram($notifiable)
    {
        return TelegramMessage::create()
            ->to(config('services.telegram-bot-api.group'))
            ->line('RYCBAR notice')
            ->line('Feedback was requested')
            ->line($this->feedback->name ?: '')
            ->line($this->feedback->email ?: '')
            ->line($this->feedback->message);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }

    public function viaConnections(): array
    {
        return [
            'telegram' => 'redis',
            'mail' => 'redis',
        ];
    }
}
