<?php

namespace Phynixmedia\Store\Sections;

use Phynixmedia\Store\Core\App;
use Phynixmedia\Store\Core\StoreConstants;
use Phynixmedia\Store\Responses\Parsers\ProductResponseParser;


/**
 * Class Orders
 * @package Phynixmedia\Store
 */
class Products extends App
{

    /**
     * Products constructor.
     */
    public function __construct(string $authorizer)
    {
        parent::__construct( $authorizer);
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
