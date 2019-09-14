<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $guarded = [];

    public function questions()
    {
        return $this->hasMany(Questions::class);
    }
}
