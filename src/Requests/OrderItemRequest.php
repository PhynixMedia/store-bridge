<?php

namespace Phynixmedia\Store\Requests;

use Phynixmedia\Store\Requests\Request;

class OrderItemRequest extends Request
{

    /**
     * Coupon constructor.
     */
    public function __construct()
    {
        
    }

    /**
     * 
     */
    public function setOrderID(string $order_id)
    {
        $this->order_id = $order_id;
    }

    public function getOrderID() :string
    {
        return $this->order_id;
    }

    /**
     * 
     */
    public function setProductID(string $products_id)
    {
        $this->products_id = $products_id;
    }

    public function getProductID() :string
    {
        return $this->products_id;
    }
    
    /**
     * 
     */
    public function setSizeID(string $size_id)
    {
        $this->size_id = $size_id;
    }

    public function getSizeID() :string
    {
        return $this->size_id;
    }

    /**
     * 
     */
    public function setQuantity(string $quantity)
    {
        $this->quantity = $quantity;
    }

    public function getQuantity() :string
    {
        return $this->quantity;
    }

    /**
     * 
     */
    public function setUnit(string $unit)
    {
        $this->unit = $unit;
    }

    public function getUnit() :string
    {
        return $this->unit;
    }

    /**
     * 
     */
    public function setPrice(string $price)
    {
        $this->price = $price;
    }

    public function getPrice() :string
    {
        return $this->price;
    }

    public function setIsDeal(string $is_deal)
    {
        $this->is_deal = $is_deal;
    }

    public function getIsDeal()
    {
        return $this->is_deal;
    }

}