<?php

namespace App\Repositories;

use App\Repositories\Contracts\BookmarkRepositoryContract;
use App\Models\Bookmark;

class BookmarkRepository //implements BookmarkRepositoryContract
{
    protected $bookmark;

    public function __construct(Bookmark $bookmark)
    {
        $this->bookmark = $bookmark;
    }

    public function all()
    {
        return $this->bookmark->get();
    }

    public function find($id)
    {
        return $this->bookmark->find($id);
    }

    public function index()
    {
        return $this->bookmark->with(['category:id,title'])->get();
    }

    public function latest($limit = 10)
    {
        return $this->bookmark->with(['tags', 'category:id,title'])->orderBy('created_at', 'desc')->take($limit)->get();
    }

    public function edit($id)
    {
        return $this->bookmark->with(['tags'])->find($id);
    }
}
