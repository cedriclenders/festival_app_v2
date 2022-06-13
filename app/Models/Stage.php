<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'description',
        'long',
        'lat'
    ];

    public function performances(){
        return $this->hasMany(Performance::class);
    }
}
