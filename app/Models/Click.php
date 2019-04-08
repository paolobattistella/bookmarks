<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Click extends Model
{
    public function bookmark()
    {
        return $this->belongsTo(Bookmark::class);
    }
}
