<?php

namespace Phynixmedia\Store;

use Phynixmedia\Store\Core\Store;
use Phynixmedia\Store\Core\StoreConstants;
use Phynixmedia\Store\Responses\Parsers\CouponsResponseParser;

/**
 * Class Category
 * @package Phynixmedia\Store
 */
class Coupon extends Store
{

    /**
     * Coupon constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function all(){
        try {
            $response = $this->rest->get(StoreConstants::GET_COUPONS);
            return (new CouponsResponseParser($response))->getResponse();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}