<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\SectionRepository;

class ProductService
{
    protected $productRepository;
    protected $categoryRepository;
    protected $sectionRepository;

    /**
     * Product Repository construct
     */
    public function __construct(ProductRepository $productRepository,
    CategoryRepository $categoryRepository, SectionRepository $sectionRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->sectionRepository = $sectionRepository;
    }

    /**
     * Get product skip smth count
     * @param $offset
     */
    public function getByOffset($offset)
    {
        return $this->productRepository->getByOffset($offset);
    }

    /**
     * Get all product with additional property
     */
    public function get()
    {
        $products = $this->productRepository->all();
        foreach($products as $product) {

            $product->category = $this->categoryRepository->find($product->category_id)->title;
            $product->section_id = $this->categoryRepository->find($product->category_id)->section_id;
            $product->section = $this->sectionRepository->find($product->section_id)->title;
        }
        return $products;

    }

    /**
     * Create new product
     * @param array $data
     */
    public function create($data)
    {
        return $this->productRepository->create($data);
    }

    /**
     * Update product record
     * @param array $data
     * @param integer $id
     */
    public function update(array $data, int $id)
    {
        return $this->productRepository->update($data, $id);
    }

    /**
     * Delete product
     * @param $id
     */
    public function delete($id)
    {
        return $this->productRepository->delete($id);
    }
}