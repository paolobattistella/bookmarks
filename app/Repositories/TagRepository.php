<?php

namespace App\Repositories;

use App\Repositories\Contracts\TagRepositoryContract;
use App\Models\Tag;

class TagRepository //implements TagRepositoryContract
{
    protected $tag;

    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }

    public function all()
    {
        return $this->tag->get();
    }

}
