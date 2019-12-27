<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lessons extends Model
{
    //
    
    public function course()
    {
        return $this->belongsTo('App\Course');
    }
    
    public function quiz()
    {
        return $this->hasOne(\App\Quiz::class, 'course_id');
    }
    
}
