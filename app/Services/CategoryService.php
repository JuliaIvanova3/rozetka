<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use App\Repositories\SectionRepository;
use App\Category;

class CategoryService 
{
    protected $categoryRepository;
    protected $sectionRepository;

    /**
     * Category Section construct
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository, SectionRepository $sectionRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->sectionRepository = $sectionRepository;
    }

    /**
     * @return void
     */
    public function index()
    {
        $categories = $this->categoryRepository->all();
        foreach($categories as $category) {
            $category->section = $this->sectionRepository->find($category->section_id)->title;
        }

        return $categories; 
    }

    /**
     * Create new category
     * @param array $data
     */
    public function create(array $data)
    {
        return $this->categoryRepository->create($data);
    }

    /**
     * Update category record
     * @param integer $id
     * @param array $data
     */
    public function update(int $id, array $data) 
    {
        return $this->categoryRepository->update($id, $data);
    }

    /**
     * Delete category by id
     * @param integer $id
     */
    public function delete($id)
    {
        return $this->categoryRepository->delete($id);
    }

}