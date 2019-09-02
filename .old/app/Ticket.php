<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    //
    protected $guarded = [];
    protected $table = 'ticket';
    
    public function events()
    {
        return $this->belongsTo('\App\Event', 'event_id', 'id');
    }
}
