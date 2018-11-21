<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    //
    protected $guarded = [];
    
    public function events()
    {
        return $this->belongsTo('\App\Event', 'event_id', 'id');
    }
}
