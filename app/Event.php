<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Users;

class Event extends Model
{
    //
    protected $guarded = [];
    protected $dates = ['created_at', 'updated_at','start_date', 'end_date'];

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    
    public function tickets()
    {
        return $this->hasMany('\App\Ticket', 'ticket_id', 'id')->orderBy('price', 'DESC');
    }

    public function category()
    {
        return $this->hasOne('\App\Categories', 'id', 'category_id');
    }

}
