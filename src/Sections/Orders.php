<?php

namespace Phynixmedia\Store\Sections;

use Phynixmedia\Store\Core\App;
use Phynixmedia\Store\Core\StoreConstants;
use Phynixmedia\Store\Responses\Parsers\OrderResponseParser;
use Phynixmedia\Store\Requests\OrderRequest;
use Phynixmedia\Store\Requests\Formatters\OrderRequestFormatter;


/**
 * Class Orders
 * @package Phynixmedia\Store
 */
class Orders extends App
{

    /**
     * Orders constructor.
     */
    public function __construct(string $authorizer)
    {
        parent::__construct( $authorizer);
    }

    /**
     * @param $params
     * @return |null
     *
     * Place order parmaters from cart checkout
     */
    public function create(array $params)
    {
        try {

            $response = $this->rest->post(StoreConstants::CREATE_ORDER, $params);
            return (new OrderResponseParser($response))->getResponse();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param $params
     * @return |null
     *
     * Place order parmaters from cart checkout
     */
    public function find(array $params)
    {
        try {

            $response = $this->rest->post(StoreConstants::GET_USER_ORDERS, $params);
            return (new OrderResponseParser($response))->getResponse();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    /**
     * @param string $userid
     * @param string $orderid
     * @return |null
     *
     * Get order for user with the User ID passed
     */
    public function update(array $params)
    {
        try {
            $response = $this->rest->post(StoreConstants::UPDATE_CUSTOMER_ORDER, $params);
            return (new OrderResponseParser($response))->getResponse();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

  
}
