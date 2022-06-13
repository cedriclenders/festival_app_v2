<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    
    use HasFactory;
    
    protected $fillable = [
        'id',
        'path',
        'name',
        'performer_id',
        'festival_id'
    ];

    public function festival()
    {
        return $this->belongsTo(Festival::class);
    }

    public function performer()
    {
        return $this->belongsTo(Performer::class);
    }
}
