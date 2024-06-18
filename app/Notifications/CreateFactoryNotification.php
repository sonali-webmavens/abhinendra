<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CreateFactoryNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    protected $factory;
   
    public function __construct($factory)
    {
        $this->factory=$factory;
     
        
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
                    ->subject('New Factory Created')
                    ->line('A new factory has been created!.')
                    ->line('Factory Name: ' . $this->factory->name) 
                    ->action('New Factory', url('Factory/'. $this->factory->id));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'factory_id' => $this->factory->id,
            'factory_name' => $this->factory->name,
        ];
    }
}
