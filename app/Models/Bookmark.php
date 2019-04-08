<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

class Bookmark extends Model
{
    /**
    * Get the value of the model's route key.
    * @return mixed
    */
    public function getRouteKey()
    {
        return Hashids::encode($this->getKey());
    }

    /**
    * Get the value of the model's route key.
    * @return mixed
    */
        public function resolveRouteBinding($value)
    {
        $id = Hashids::decode($value)[0];
        return Bookmark::findOrFail($id);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function clicks()
    {
        return $this->hasMany(Click::class);
    }
}
