<?php

namespace Phynixmedia\Store\Sections;

use Phynixmedia\Store\Core\App;
use Phynixmedia\Store\Core\StoreConstants;
use Phynixmedia\Store\Responses\Parsers\CouponsResponseParser;

/**
 * Class Category
 * @package Phynixmedia\Store
 */
class Coupon extends App
{

    /**
     * Coupon constructor.
     */
    public function __construct(string $authorizer)
    {
        parent::__construct( $authorizer);
    }

    public function all(array $params){
        try {
            $response = $this->rest->post(StoreConstants::FIND_COUPONS, $params);
            return (new CouponsResponseParser($response))->getResponse();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}
