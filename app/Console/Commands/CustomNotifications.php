<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Exception;
use App\Models\CustomNotification;
use Auth;
use Notification;
use App\Notifications\PushStartingSoon;
use App\Models\User;
use App\Notifications\PushCustom;

class CustomNotifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'festivalue:send-notifications';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send custom push notification to all users, written by admin';

    protected $notificationSent = 0;

    protected $notificationFailures = 0;
    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Sending notification to users...');
        CustomNotification::all()
            ->each( function (CustomNotification $customNotification){
                $this->sendCustomNotifitation($customNotification);
            });
        $this->info("{$this->notificationSent} starting notifications sent!");

        if ($this->notificationFailures > 0) {
            $this->error("Failed to send {$this->notificationFailures} trial expiring mails!");
         }
    }

    protected function sendCustomNotifitation(CustomNotification $customNotification)
    {
        
        try {
            if ($customNotification->wasAlreadySent()) {
                return;
            }
			$this->comment("Sending {$customNotification->title} notifications");
            Notification::send(User::all(),new PushCustom($customNotification));
            $this->notificationSent++;
            $customNotification->rememberHasBeenSent();

        } catch (Exception $exception) {
            $this->error("exception when sending notification with {$customNotification->title}", $exception);
            report($exception);
            $this->notificationFailures++;
        }
    }

}
