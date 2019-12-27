<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    protected $guarded = [];
    protected $table = 'Questions';

    public function quiz()
    {
        return $this->belongsTo(\App\Quiz::class);
    }

    public function answers()
    {
        return $this->hasMany(\App\Answers::class, 'questions_id');
    }
}
