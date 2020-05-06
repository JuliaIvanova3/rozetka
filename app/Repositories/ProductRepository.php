<?php

namespace App\Repositories;

use App\Product;

class ProductRepository
{
    protected  $product;

    /**
     * Product Repository construct
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Create new product
     * @param array $attributes
     */
    public function create($attributes)
    {
        $obj = new Product();
        $obj->title = $attributes['title'];
        $obj->description = $attributes['description'];
        $obj->price = $attributes['price'];
        $obj->image = '';
        $obj->category_id = $attributes['category_id'];
        $obj->save();

        $fileName = $obj->id.'.'.$attributes['image']->getClientOriginalExtension();
        $obj->image = $fileName;
        $obj->save();
        $file = $attributes['image']->storeAs('/uploads', $fileName, [
            "disk" => 'public'
        ]);

        return $obj;
    }

    /**
     * Get all products
     */
    public function all()
    {
        return $this->product->all();
    }

    /**
     * Get product skip smth count
     * @param $offset
     */
    public function getByOffset($offset)
    {
        return $this->product->skip($offset)->take(6)->get();
    }

    /**
     * Find product by id
     * @param $id
     */
    public function find($id)
    {
        return $this->product->find($id);
    }

    /**
     * Update product record
     * @param array $attributes
     * @param integer $id
     */
    public function update(array $attributes, $id)
    {
        return $this->product->find($id)->update($attributes);
    }

    /**
     * Delete product 
     * @param $id
     */
    public function delete($id)
    {
        return $this->product->find($id)->delete();
    }
}