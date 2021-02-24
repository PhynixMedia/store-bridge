<?php

namespace Phynixmedia\Store\Requests;

use Phynixmedia\Store\Requests\Request;

class OrderRequest extends Request
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
    public function setUserID(string $user_id)
    {
        $this->user_id = $user_id;
    }

    public function getUserID() :string
    {
        return $this->user_id;
    }

        /**
     * 
     */
    public function setCustomerID(string $customer_id)
    {
        $this->customer_id = $customer_id;
    }

    public function getCustomerID() :string
    {
        return $this->customer_id;
    }

    /**
     * 
     */
    public function setOrderCode(string $order_code)
    {
        $this->order_code = $order_code;
    }

    public function getOrderCode() :string
    {
        return $this->order_code;
    }

    /**
     * 
     */
    public function setOutletID(string $outlet_id)
    {
        $this->outlet_id = $outlet_id;
    }

    public function getOutletID() :string
    {
        return $this->outlet_id;
    }

    /**
     * 
     */
    public function setBarcode(string $barcode)
    {
        $this->barcode = $barcode;
    }

    public function getBarcode() :string
    {
        return $this->barcode;
    }

    /**
     * 
     */
    public function setPaymentOptionID(string $payment_option_id)
    {
        $this->payment_option_id = $payment_option_id;
    }

    public function getPaymentOptionID() :string
    {
        return $this->payment_option_id;
    }

    /**
     * 
     */
    public function setDiscount(string $discount)
    {
        $this->discount = $discount;
    }

    public function getDiscount() :string
    {
        return $this->discount;
    }

    /**
     * 
     */
    public function setComment(string $comment)
    {
        $this->comment = $comment;
    }

    public function getComment() :string
    {
        return $this->comment;
    }

    /**
     * 
     */
    public function setOrderSource(string $order_source)
    {
        $this->order_source = $order_source;
    }

    public function getOrderSource() :string
    {
        return $this->order_source;
    }



    /**
     * 
     */
    public function setOrderItems(array $items)
    {
        $this->items = $items;
    }

    public function getOrderItems() :array
    {
        return $this->items;
    }

    /**
     * 
     */
    public function setCustomer(array $customer)
    {
        $this->customer = $customer;
    }

    public function getCustomer() :array
    {
        return $this->customer;
    }

    /**
     * 
     */
    public function setCustomerContact(array $customer_contact)
    {
        $this->customer_contact = $customer_contact;
    }

    public function getCustomerContact() :array
    {
        return $this->customer_contact;
    }
    

}