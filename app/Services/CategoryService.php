<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use App\Category;

class CategoryService 
{
    protected $categoryRepository;

    /**
     * Category Section construct
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @return void
     */
    public function index()
    {
        return $this->categoryRepository->all();
    }

}