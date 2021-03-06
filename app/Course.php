<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name', 'description', 'image'
    ];

    public function students(){
        return $this->belongsToMany(Student::class);
    }

    public static function courses(){
        return static::selectRaw('*')->get();
    }
}
