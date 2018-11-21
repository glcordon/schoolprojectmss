<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'categories';

    public function events()
    {
        return $this->belongsTo('\App\Event', 'category_id', 'id');
    }
}
