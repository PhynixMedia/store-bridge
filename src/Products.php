<?php

namespace Phynixmedia\Store;

use Phynixmedia\Store\Parser\OrderResponseParser;
use Phynixmedia\Store\Core\Store;
use Phynixmedia\Store\Core\StoreConstants;
use Phynixmedia\Store\Responses\Parsers\ProductResponseParser;


/**
 * Class Orders
 * @package Phynixmedia\Store
 */
class Products extends Store
{

    /**
     * Products constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function all(array $params)
    {
        try {
            $response = $this->rest->post(StoreConstants::GET_ALL_PRODUCTS, $params);
            return (new ProductResponseParser($response))->getResponse();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function get(array $params)
    {
        try {
            $response = $this->rest->post(StoreConstants::GET_SINGLE_PRODUCT, $params);
            return (new ProductResponseParser($response))->getResponse();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function search(array $params)
    {
        try {
            $response = $this->rest->post(StoreConstants::SEARCH_PRODUCTS, $params);
            return (new ProductResponseParser($response))->getResponse();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    
}