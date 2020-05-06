<?php

namespace App\Services;

use App\Repositories\OrderRepository;
use App\Repositories\ProductRepository;
use App\Order;

class OrderService
{
    protected $orderRepository;
    protected $productRepository;

    /**
     * Order Service construct
     */
    public function __construct(OrderRepository $orderRepository, ProductRepository $productRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->productRepository = $productRepository;
    }
    
    /**
     * Create new order
     * @param array $data
     */
    public function create(array $data)
    {
        return $this->orderRepository->create($data);
    }

    /**
     * Get orders by User Auth
     */
    public function getByUser()
    {
        $orders = $this->orderRepository->getByUser();
        $answers = array();
        $product = null;
        foreach($orders as $order) {
            $product = $this->productRepository->find($order->product_id);
            $product->quantity = $order->quant_product;
            $answers[] = $product;
        }

        return $answers;
    }

}