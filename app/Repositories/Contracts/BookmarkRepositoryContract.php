<?php

namespace App\Repositories\Contacts;

interface BookmarkRepositoryContract
{
    public function all();
    public function index();
    public function latest($limit);
}
