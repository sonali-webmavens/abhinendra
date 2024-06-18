<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Companie;

class NewCompanyNotification extends Notification
{
    use Queueable;

     protected $companie;

    /**
     * Create a new notification instance.
     */
    public function __construct(Companie $companie)
    {
      $this->companie=$companie;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Company Added')
            ->line('A new company has been added:')
            ->line('Name: ' . $this->companie->name)
            ->action('View Company', url('/company/' . $this->companie->id));
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
}
