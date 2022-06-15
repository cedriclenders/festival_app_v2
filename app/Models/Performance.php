<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Performance extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'performer_id',
        'timeslot_id',
        'stage_id'
    ];

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function likers()
    {
        return $this->belongsToMany(User::class, 'likes', 'performance_id');
    }

    public function isAuthUserLikedPost(){
        return $this->likes()->where('user_id',  auth()->id())->exists();
     }
     
    public function performer()
    {
        return $this->belongsTo(Performer::class);
    }

    public function stage()
    {
        return $this->belongsTo(Stage::class);
    }
    
    public function timeslot()
    {
        return $this->belongsTo(Timeslot::class);
    }
    
    public function isAlmostStarting()
    {
        return now()->addDays(14)->greaterThan($this->timeslot->start_datetime);
    }

    public function wasAlreadySentPerformanceStartinSoon()
    {
        if ($this->attributes['performance_starting_notification_sent_at'])
        {
            return true;
        }
        return false;
    }

    public function rememberHasBeenSentPerformanceStartingSoon()
    {
         $this->attributes['performance_starting_notification_sent_at'] = now();
         $this->save();
    }

}
