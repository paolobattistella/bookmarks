<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

class Category extends Model
{
    /**
    * Get the value of the model's route key.
    * @return mixed
    */
    public function getRouteKey()
    {
        return Hasher::encode($this->getKey());
    }

    /**
    * Get the value of the model's route key.
    * @return mixed
    */
    public function resolveRouteBinding($value)
    {
        $id = Hasher::decode($value)[0];
        return Category::findOrFail($id);
    }

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }
}
