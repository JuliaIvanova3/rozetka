<?php

namespace App\Repositories;

use App\Category;

class CategoryRepository
{
    protected $category;

    /**
     * Category Repository construct
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * @return void
     */
    public function all()
    {
        return $this->category->all();
    }

    /**
     * Find category by id 
     * @param $id
     */
    public function find($id)
    {
        return $this->category->find($id);
    }


}