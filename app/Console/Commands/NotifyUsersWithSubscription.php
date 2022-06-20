<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Exception;
use App\Models\Performance;
use Auth;
use Notification;
use App\Notifications\PushStartingSoon;
use App\Models\User;

class NotifyUsersWithSubscription extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'festivalue:notify-users-with-subscription';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Push notification to all users that liked a performance when it starts soon';

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
        Performance::all()
            ->filter->isAlmostStarting()
            ->each( function (Performance $performance){
                $this->sendPerformanceStartingNotification($performance);
            });
        $this->info("{$this->notificationSent} performances starting notifications sent!");

        if ($this->notificationFailures > 0) {
            $this->error("Failed to send {$this->notificationFailures} notifications!");
         }
    }

    protected function sendPerformanceStartingNotification(Performance $performance)
    {
        try {
            if ($performance->wasAlreadySentPerformanceStartinSoon()) {
                return;
            }
			$this->comment("Sending {$performance->performer->name} notifications");
            Notification::send($performance->likers,new PushStartingSoon($performance));
            $this->notificationSent++;
            $performance->rememberHasBeenSentPerformanceStartingSoon();

        } catch (Exception $exception) {
            $this->error("exception when sending notification with {$performance->name}", $exception);
            report($exception);
            $this->notificationFailures++;
        }
    }

}
