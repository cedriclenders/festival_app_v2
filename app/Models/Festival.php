<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class Festival extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'foreign_key');
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function stages()
    {
        return Stage::all();
    }

    public function days()
    {
        $startDate = Carbon::parse($this->attributes['start_datetime'])->format('Y-m-d');
        $endDate = Carbon::parse($this->attributes['end_datetime'])->format('Y-m-d');
        $dateRange = CarbonPeriod::create($startDate, $endDate);
        return $dateRange->toArray();
    }
}
