<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Timeslot extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'start_datetime',
        'end_datetime',
    ];

    public function performances(){
        return $this->hasMany(Performance::class);
    }

    public function dateTimeFormatStart()
    {
        return Carbon::parse($this->attributes['start_datetime'])->format('Y-m-d\TH:i');
    }

    public function dateTimeFormatEnd()
    {
        return Carbon::parse($this->attributes['end_datetime'])->format('Y-m-d\TH:i');
    }
    
    public function startTime()
    {
        return Carbon::parse($this->attributes['start_datetime'])->format('H:i');
    }

    public function endTime()
    {
        return Carbon::parse($this->attributes['end_datetime'])->format('H:i');
    }

    public function startDate()
    {
        return Carbon::parse($this->attributes['start_datetime'])->format('F j');
    }

}
