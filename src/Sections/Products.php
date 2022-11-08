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

    public function all(array $params, int $pager = 0)
    {
        try {
            $response = $this->rest->post(StoreConstants::GET_ALL_PRODUCTS, $params, $pager);
            return (new ProductResponseParser($response))->getResponse();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function find(array $params, int $pager = 0)
    {
        try {
            $response = $this->rest->post(StoreConstants::FIND_PRODUCTS, $params, $pager);
            return (new ProductResponseParser($response))->getResponse();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function one(array $params, int $pager = 0)
    {
        try {
            $response = $this->rest->post(StoreConstants::GET_SINGLE_PRODUCT, $params, $pager);
            return (new ProductResponseParser($response))->getResponse();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    

}
