<?php

namespace App\Notifications\Auth;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use function Laravel\Prompts\confirm;

class SendPassword extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(
        public string $password
    )
    {
        $this->onConnection('redis');
        $this->onQueue('auth');
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
            ->success()
            ->subject('Welcome to ' . config('app.name') . '! Your Account is Ready')
            ->greeting('Dear ' . $notifiable->username . ',')
            ->line('We’re thrilled to welcome you to '. config('app.name') .', your personal space for discovering, sharing, and documenting culinary delights. Your account has been successfully created, and you’re just one step away from exploring our vibrant community of food lovers.')
            ->action('Explore more!', url('/'))
            ->line('Below are your account credentials:')
            ->line('- Email: ' . $notifiable->email)
            ->line('- Password: ' . $this->password)
            ->line('⭕ Please note: For your security, we recommend changing your password after logging in for the first time.')
            ->salutation("Bon appétit, <br> The " .  config('app.name') . " Team");
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
