<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomNotification extends Model
{
    use HasFactory;

    public function rememberHasBeenSent()
    {
         $this->attributes['custom_notification_sent_at'] = now();
         $this->save();
    }

    public function wasAlreadySent()
    {
        if ($this->attributes['custom_notification_sent_at'])
        {
            return true;
        }
        return false;
    }
}
