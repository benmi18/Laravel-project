<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'image', 'courses'
    ];
    
    public function courses(){
        return $this->belongsToMany(Course::class);
    }

    public static function students(){
        return static::selectRaw('*')->get();
    }
}
