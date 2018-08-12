<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function courses(){
        return $this->belongsToMany(Course::class);
    }

    public static function students(){
        return static::selectRaw('*')->get();
    }
}
