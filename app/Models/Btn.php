<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Btn extends Model
{
    use HasFactory;
    public function event()
    {
        return $this->belongsTo(Event::class) ;
    }
}
