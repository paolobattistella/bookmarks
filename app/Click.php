<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Click extends Model
{
    public function bookmark()
    {
        return $this->belongsTo('App\Bookmark');
    }
}
