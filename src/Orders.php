<?php

namespace Phynixmedia\Store;

use Phynixmedia\Store\Core\Store;
use Phynixmedia\Store\Core\StoreConstants;
use Phynixmedia\Store\Responses\Parsers\OrderResponseParser;
use Phynixmedia\Store\Requests\OrderRequest;
use Phynixmedia\Store\Requests\Formatters\OrderRequestFormatter;


/**
 * Class Orders
 * @package Phynixmedia\Store
 */
class Orders extends Store
{

    /**
     * Orders constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param $params
     * @return |null
     *
     * Place order parmaters from cart checkout
     */
    public function place(array $params)
    {
        try {

            $response = $this->rest->post(StoreConstants::PLACE_ORDER, $params);
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
    public function search(array $params)
    {
        try {
            $response = $this->rest->post(StoreConstants::SEARCH_ORDERS, $params);
            return (new OrderResponseParser($response))->getResponse();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param string $search
     * @return |null
     *
     * Search for Order with Order ID
     */
    public function getMany(array $params)
    {
        try {
            $response = $this->rest->post(StoreConstants::GET_USER_ORDERS, $params);
            return (new OrderResponseParser($response))->getResponse();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param string $search
     * @return |null
     *
     * Search for Order with Order ID
     */
    public function getOne(array $params)
    {
        try {
            $response = $this->rest->post(StoreConstants::GET_USER_ORDER, $params);
            return (new OrderResponseParser($response))->getResponse();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}