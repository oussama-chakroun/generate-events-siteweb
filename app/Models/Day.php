<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;
    public function event()
    {
        return $this->belongsTo(Event::class) ;
    }
    public function themes()
    {
        return $this->hasMany(Theme::class) ;
    }
}
