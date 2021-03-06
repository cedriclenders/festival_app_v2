<?php

namespace App\Notifications;

use App\Models\Performance;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\WebPush\WebPushMessage;
use NotificationChannels\WebPush\WebPushChannel;


class PushStartingSoon extends Notification
{
    use Queueable;

    /** @var \App\Performance */
    public $performance;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Performance $performance)
    {
        //
        $this->performance = $performance;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */

    public function via($notifiable)
    {
        return [WebPushChannel::class];
    }
    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }

    public function toWebPush($notifiable, $notification)
    {
        return (new WebPushMessage)
            ->title($this->performance->performer->name.' starting soon')
            ->body($this->performance->performer->name.' is starting in 10 minutes at '. $this->performance->stage->name)
            ->action('View App', 'notification_action');
    }
}
