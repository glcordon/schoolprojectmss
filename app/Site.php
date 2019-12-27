<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Courses;

class Site extends Model
{
    //
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
