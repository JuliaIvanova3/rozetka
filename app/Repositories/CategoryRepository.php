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

    /**
     * Create new record of category
     * @param array $attributes
     */
    public function create(array $attributes)
    {
        return $this->category->create($attributes);
    }

    /**
     * Update category
     * @param array $attributes
     * @param integer $id
     */
    public function update(int $id, array $attributes)
    {
        return $this->category->find($id)->update($attributes);
    }

    /**
     * Delete category by id
     * @param integer $id
     */
    public function delete ($id) 
    {
        return $this->category->find($id)->delete();
    }


}