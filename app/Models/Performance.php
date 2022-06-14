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
}
