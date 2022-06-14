<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Performer extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'description',
        'genre_id',
        'youtube_link',
    ];
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function performances(){
        return $this->hasMany(Performance::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
    
}
