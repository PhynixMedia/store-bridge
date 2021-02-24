<?php

namespace Phynixmedia\Store;

use Phynixmedia\Store\Core\Store;
use Phynixmedia\Store\Core\StoreConstants;
use Phynixmedia\Store\Responses\Parsers\CategoryResponseParser;

/**
 * Class Category
 * @package Phynixmedia\Store
 */
class Category extends Store
{

    /**
     * Category constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function all(array $params)
    {

        try {
            $response = $this->rest->post(StoreConstants::GET_ALL_CATEGORY, $params);
            // var_dump($response);
            return (new CategoryResponseParser($response))->getResponse();
        } catch (\Exception $e) {

            var_dump($e->getMessage());
            return $e->getMessage();
        }
    }

    public function getProducts(array $params)
    {
        try {

            $response = $this->rest->post(StoreConstants::GET_PRODUCTS_BY_CATEGORY, $params);
            return (new CategoryResponseParser($response))->getResponse();
        } catch (\Exception $e) {

            var_dump($e->getMessage());
            return $e->getMessage();
        }
    }

}