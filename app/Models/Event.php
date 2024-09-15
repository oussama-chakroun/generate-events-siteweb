<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public function days()
    {
        return $this->hasMany(Day::class)->orderBy('date') ;
    }
    public function eposters()
    {
        return $this->hasMany(Eposter::class) ;
    }

    public function programmes()
    {
        return $this->hasMany(Programme::class) ;
    }

    public function btns()
    {
        return $this->hasMany(Btn::class) ;
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }

}
