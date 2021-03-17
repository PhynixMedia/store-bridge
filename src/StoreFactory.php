<?php

namespace Phynixmedia\Store;

use Phynixmedia\Store\Core\Authorizer;
use Phynixmedia\Store\Core\StoreConstants;

use Phynixmedia\Store\Sections\Category;
use Phynixmedia\Store\Sections\Coupon;
use Phynixmedia\Store\Sections\Customer;
use Phynixmedia\Store\Sections\Deals;
use Phynixmedia\Store\Sections\Orders;
use Phynixmedia\Store\Sections\Products;
use Phynixmedia\Store\Sections\Vouchers;

use Phynixmedia\Store\Exceptions\StoreException;
use Phynixmedia\Store\Traits\ResponseTrait;

/**
 * Class Store
 * @package Phynixmedia\Store
 */
class StoreFactory
{

    use ResponseTrait;
        
    protected $callbacks = [];

    private $authorizer;

    public function __construct(string $token, array $callbacks = [])
    {

        $this->authorizer = $token;

        $this->callbacks = array_merge([
            StoreConstants::PRODUCTS_BRIDGE     => [$this, 'createProducts'],
            StoreConstants::CATEGORY_BRIDGE     => [$this, 'createCategory'],
            StoreConstants::CUSTOMERS_BRIDGE    => [$this, 'createCustomers'],
            StoreConstants::DEALS_BRIDGE        => [$this, 'createDeals'],
            StoreConstants::ORDERS_BRIDGE       => [$this, 'createOrders'],
            StoreConstants::COUPONS_BRIDGE      => [$this, 'createCoupons'],
            StoreConstants::VOUCHER_BRIDGE      => [$this, 'createVoucher'],
        ], $callbacks);
    }

    public function create(string $key){

        $this->is_exists($key);
        
        if(!empty($this->callbacks[$key]))
        {
            return call_user_func($this->callbacks[$key], $this->authorizer);
        }
        return $this->callbacks[$key];
    }

    private function is_exists($key){
        
        if(! array_key_exists($key, $this->callbacks)){
            //throw new exception here 
            throw new StoreException($this->responseError(1001, 'tesging error', 'testing message'));
        }
    }
    

    public function createProducts(string $authorizer){

        return new Products($authorizer);
    }

    public function createCategory(string $authorizer){

        return new Category($authorizer);
    }

    public function createCustomers(string $authorizer){

        return new Customer($authorizer);
    }

    public function createDeals(string $authorizer){

        return new Deals($authorizer);
    }

    public function createOrders(string $authorizer){

        return new Orders($authorizer);
    }

    public function createCoupons(string $authorizer){

        return new Coupon($authorizer);
    }

    public function createVoucher(string $authorizer){

        return new Vouchers($authorizer);
    }


}
