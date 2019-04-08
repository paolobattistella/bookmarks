<?php

namespace App\Repositories;

use App\Repositories\Contracts\CategoryRepositoryContract;
use App\Models\Category;

class CategoryRepository //implements CategoryRepositoryContract
{
    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function all()
    {
        return $this->category->get();
    }
}
