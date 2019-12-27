<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answers extends Model
{
    protected $guarded = [];
    protected $table = "Answers";
    public function questions()
    {
        return $this->belongsTo(Questions::class, 'questions_id');
    }
}
