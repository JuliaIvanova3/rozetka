<?php

namespace App\Repositories;

use App\Order;
use Auth;

class OrderRepository
{
    protected $order;

    /**
     * Order Repository construct
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Create new order
     * @param array $attributes
     */
    public function create(array $attributes)
    {
        $userId = Auth::id();
        $obj = new Order();
        $obj->user_id = $userId;
        $obj->product_id = $attributes['productId'];
        $obj->quant_product = $attributes['quantProduct'];
        $obj->save();

        return $obj;
    }

    /**
     * Get orders by User Auth
     */
    public function getByUser()
    {
        $userId = Auth::id();
        return $this->order->where('user_id', $userId)->get();
    }
}